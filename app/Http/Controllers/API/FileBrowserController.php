<?php

namespace Socieboy\Jupiter\Http\Controllers\API;

use Illuminate\Http\Request;
use Socieboy\Jupiter\Contracts\FileSystem;
use Socieboy\Jupiter\Http\Controllers\JupiterController;

class FileBrowserController extends JupiterController
{
    public function index(Request $request, FileSystem $fileSystem)
    {
        $this->authorize('read_files');
        dd($fileSystem->collection);
    }

    public function store()
    {
        dd(2);
    }



}