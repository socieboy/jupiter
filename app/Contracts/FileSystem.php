<?php

namespace Socieboy\Jupiter\Contracts;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem as File;

class FileSystem
{
    protected $baseDir;

    protected $files;

    public $collection = [];

    public function __construct(Request $request, File $files)
    {
        $this->files = $files;
        $this->baseDir = config('jupiter.file-browser.base-dir');
        $this->createBaseDirectory();
        $this->collection = $this->get($this->baseDir);

    }

    protected function get($path = "")
    {
        $path = realpath($path);
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
        $collect = new collect();
        foreach($objects as $name => $object){
            $collect->pu($name);
        }
    }

    protected function createBaseDirectory()
    {
        if(!$this->files->exists($this->baseDir)){
            $this->files->makeDirectory($this->baseDir, 0777, true);
        }
    }


}