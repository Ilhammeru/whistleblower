<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Function to show dashboard index
     * 
     * @return Response
     */
    public function index()
    {
        $title = __('view.dashboard');

        return view('pages.admin.dashboard', compact('title'));
    }
}
