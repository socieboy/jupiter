<?php

namespace Socieboy\Jupiter\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
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