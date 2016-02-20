<?php

namespace Socieboy\Jupiter\Http\Controllers;

use Socieboy\Jupiter\Http\Controllers\JupiterController;

class DashboardController extends JupiterController
{
    /**
     * Show the Dashboard home page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('jupiter::index');
    }
}