<?php

namespace Socieboy\Jupiter\Http\Controllers;

class FileManagerController extends JupiterController
{
    public function index()
    {
        $this->authorize('read_files');
        return view('jupiter::file-manager.index');
    }


}