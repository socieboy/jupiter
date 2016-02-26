<?php

namespace Socieboy\Jupiter\Contracts\Users;

use Intervention\Image\Facades\Image;

trait UploadAvatarTrait
{
    /**
     * @var string
     */
    protected $baseDir = 'uploads/avatars/';

    /**
     * @var array|null|\Symfony\Component\HttpFoundation\File\UploadedFile
     */
    protected $file;

    /**
     * Uplaod a photo if exits.
     */
    protected function uploadAvatar()
    {
        if(! $this->file ) return;
        $name = $this->makeFileName();
        $this->user['avatar'] = '/' . $this->baseDir . $name;
        $this->file->move($this->baseDir, $name);
        $this->fitAvatar($this->user['avatar']);
    }

    /**
     * Make a unique name for the avatar.
     * @return string
     */
    protected function makeFileName()
    {
        $name = sha1(
            time() . $this->file->getClientOriginalName()
        );
        $extension = $this->file->getClientOriginalExtension();
        return "{$name}.{$extension}";
    }

    /**
     * Resize the avatar.
     * @param $path
     */
    protected function fitAvatar($path)
    {
        Image::make(public_path($path))
            ->fit(200)
            ->save(public_path($path));
    }

}