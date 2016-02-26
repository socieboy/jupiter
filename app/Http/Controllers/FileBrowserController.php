<?php

namespace Socieboy\Jupiter\Http\Controllers;

class FileBrowserController extends JupiterController
{
    public function index()
    {
        $this->authorize('read_files');
        return view('jupiter::file-browser.index');
    }


}