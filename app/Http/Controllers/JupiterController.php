<?php

namespace Socieboy\Jupiter\Http\Controllers;

use App\Http\Controllers\Controller;

class JupiterController extends Controller
{

    public function __construct()
    {
        $this->authorize('dashboard');
    }
}