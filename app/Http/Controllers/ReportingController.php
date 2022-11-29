<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
