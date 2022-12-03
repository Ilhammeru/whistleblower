<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('view.question');

        return view('pages.admin.message', compact('title'));
    }

    /**
     * Function to prepare data for Datatables
     * 
     * @return Datatables
     */
    public function ajax()
    {
        $data = [
            [
                'id' => 1,
                'ticket' => 'WRK6JB/2022',
                'name' => 'detektifconan - Pajak',
                'time' => '20/11/2022 17:22',
                'status' => 1,
            ],
            [
                'id' => 2,
                'ticket' => 'ZXCVBN/2022',
                'name' => 'Baderun - Pajak',
                'time' => '20/11/2022 18:21',
                'status' => 2,
            ],
        ];
        return DataTables::of($data)
            ->editColumn('status', function($d) {
                $text = '';
                if ($d['status'] == 1) {
                    $text = 'Dijawab oleh A';
                } else if ($d['status'] == 2) {
                    $text = 'Belum dijawab';
                }
                return $text;
            })
            ->addColumn('action', function($d) {
                return '<i class="bi bi-eye me-3"></i><i class="bi bi-pencil-square" onclick="showMessage()"></i>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
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
