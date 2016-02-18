<?php

namespace Socieboy\Jupiter\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionsController extends Controller
{

    /**
     * Retrieve permissions.
     * @return mixed
     */
    public function index()
    {
        return Permission::onlyVisibles();
    }
}