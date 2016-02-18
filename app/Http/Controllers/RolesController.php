<?php

namespace Socieboy\Jupiter\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;

class RolesController extends Controller
{

    /**
     * Display Role Mangement page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('read_roles');
        return view('jupiter::roles.index');
    }
}