<?php

namespace Socieboy\Jupiter\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Socieboy\Jupiter\Http\Controllers\JupiterController;

class UsersController extends JupiterController
{

    /**
     * Display User Management page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('read_users');
        return view('jupiter::users.index');
    }
}