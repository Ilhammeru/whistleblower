<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function success()
    {
        $title = __('view.report_received');

        return view('pages.general.success', compact('title'));
    }
    
    /**
     * Display tracking record
     * @return Response
     */
    public function tracking()
    {
        $title = __('view.tracking_detail');
        $captcha = captcha_img();
        return view('pages.general.tracking', compact('title', 'captcha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $title = __('view.reporting_detail');
        $captcha = captcha_img();
        return view('pages.general.detail', compact('title', 'captcha'));
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
