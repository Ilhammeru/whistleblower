<?php

namespace App\Http\Controllers;

use App\Http\Services\ReportingService;
use App\Models\Reporting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Whistleblower';
        return view('pages.general.index', compact('title'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        $title = __('view.reporting');

        return view('pages.admin.reporting', compact('title'));
    }

    /**
     * Prepare data for datatables
     * 
     * @return Datatables
     */
    public function ajaxReportAdmin()
    {
        $data = [
            [
                'id' => 1,
                'created_at' => '20 Nov 2022',
                'name' => 'detektifconan - Pajak',
                'ticket' => 'WRK6JB/2022',
                'channel' => 'Form',
                'status' => 1,
            ],
            [
                'id' => 2,
                'created_at' => '21 Nov 2022',
                'name' => 'Baderun T - PT Rosma',
                'ticket' => 'ZXCVBN/2022',
                'channel' => 'E-mail',
                'status' => 2,
            ],
        ];
        return DataTables::of($data)
            ->editColumn('status', function($d) {
                $elem = '';
                if ($d['status'] == 1) {
                    $elem = '<span class="badge-status success">Diterima</span>';
                } else if ($d['status'] == 2) {
                    $elem = '<span class="badge-status yellow">Diproses</span>';
                }
                return $elem;
            })
            ->addColumn('action', function($d) {
                return '<i class="bi bi-eye me-3"></i><i class="bi bi-pencil-square" onclick="changeStatusReport()"></i>';
            })
            ->rawColumns(['created_at', 'name', 'ticket', 'channel', 'status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Report';
        $captcha = captcha_img();
        return view('pages.general.form', compact('title', 'captcha'));
    }

    /**
     * Display success message
     * @return Response
     */
    public function success($token, $ticket)
    {
        $title = __('view.report_received');
        $token = decrypt_data($token);
        $ticket = decrypt_data($ticket);
        return view('pages.general.success', compact('title', 'token', 'ticket'));
    }
    
    /**
     * Display tracking record
     * @return Response
     */
    public function tracking($ticket)
    {
        $title = __('view.tracking_detail');
        $captcha = captcha_img();

        $service = new ReportingService();
        $params = [
            'ticket' => $ticket
        ];
        $detail = $service->detailReport($params);
        return view('pages.general.tracking', compact('title', 'captcha', 'detail'));
    }

    /**
     * Function to track report
     * 
     * @param string ticket
     * 
     * @return Response
     */
    public function trackReport(Request $request)
    {
        try {
            $ticket = $request->ticket;
            $service = new ReportingService();
            $track = $service->tracking($ticket);
            if (!$track) {
                return response()->json(['message' => __('view.ticket_not_found')], 500);
            }
            
            return response()->json(['message' => 'Success', 'url' => route('reporting.tracking', encrypt_data($ticket))]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                // 'captcha' => 'required|captcha',
                'time_reporting' => 'required',
                'place_reporting' => 'required',
                'chronology' => 'required',
                'file_evidence' => 'required'
            ],[
                'captcha.captcha' => __('view.captcha_error'),
                'captcha.required' => __('view.captcha_required'),
                'time_reporting.required' => __('view.time_reporting_required'),
                'place_reporting.required' => __('view.place_reporting_required'),
                'chronology.required' => __('view.chronology_required'),
                'file_evidence.required' => __('view.file_evidence_required')
            ]);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->all()], 500);
            }

            $service = new ReportingService();

            $model = new Reporting();
            $model->ticket_number = generate_ticket();
            $model->token = generate_token();
            $model->report_time = date('Y-m-d H:i:s', strtotime($request->time_reporting));
            $model->scene = $request->place_reporting;
            if ($request->name) {
                $model->name = $request->name;
            }
            if ($request->phone) {
                $model->phone = $request->phone;
            }
            if ($request->email) {
                $model->email = $request->email;
            }
            $model->save();

            // handle description
            $service->storeDescription($request->chronology, $model->id);

            // handle upload file
            $service->uploadEvidence($request->file_evidence, true, $model->id);
            
            DB::commit();
            return response()->json(['message' => __('view.store_report_success'), 'url' => route('reporting.success', ['token' => encrypt_data($model->token), 'ticket' => encrypt_data($model->ticket_number)])]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Function to store additional evidence
     * 
     * @param int id
     * @return Response
     */
    public function storeAdditional(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'captcha' => 'required|captcha',
                'description' => 'required',
                'file_evidence' => 'required'
            ], [
                'captcha.captcha' => __('view.captcha_error'),
                'captcha.required' => __('view.captcha_required'),
                'description.required' => __('view.chronology_required'),
                'file_evidence.required' => __('view.file_evidence_required')
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->all()], 500);
            }

            $service = new ReportingService();
            // handle description
            $service->storeDescription($request->description, $id, true);
            // handle upload
            $service->uploadEvidence($request->file_evidence, true, $id, true);
            DB::commit();
            return response()->json(['message' => __('view.additional_store_success')]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Function to generate new captcha
     * 
     * @return Response
     */
    public function reloadCaptcha()
    {
        return response()->json(['message' => 'Success', 'data' => captcha_img('flat')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket)
    {
        $title = __('view.reporting_detail');
        $captcha = captcha_img();

        $service = new ReportingService();
        $params = [
            'ticket' => $ticket
        ];
        $detail = $service->detailReport($params);
        return view('pages.general.detail', compact('title', 'captcha', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
