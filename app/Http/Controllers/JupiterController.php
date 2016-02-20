<?php

namespace Socieboy\Jupiter\Http\Controllers;

use App\Http\Controllers\Controller;

class JupiterController extends Controller
{
    /**
     * JupiterController constructor.
     */
    public function __construct()
    {
        $this->authorize('dashboard');
    }
}