<?php

namespace Socieboy\Jupiter\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Socieboy\Jupiter\Http\Controllers\JupiterController;

class RolesController extends JupiterController
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