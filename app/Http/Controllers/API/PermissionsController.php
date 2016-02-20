<?php

namespace Socieboy\Jupiter\Http\Controllers\API;

use App\Models\Permission;
use Socieboy\Jupiter\Http\Controllers\JupiterController;

class PermissionsController extends JupiterController
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