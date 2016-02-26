<?php

namespace Socieboy\Jupiter\Contracts\Users;

use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Http\Request;

class NewUser
{
    use UploadAvatarTrait, SetPasswordTrait;

    /**
     * @var array
     */
    protected $user;

    /**
     * NewUser constructor.
     * @param Request $request
     */
    public function __construct(Request $request, Mailer $mailer)
    {
        $this->user = $this->formatRequest($request);
        $this->file = $request->file('avatar');
        $this->mailer = $mailer;
    }

    /**
     * Save the new user.
     */
    public function save()
    {
        $this->uploadAvatar();
        $user = User::create($this->user);
        $this->sendEmailOfNotification($this->user);
        return $user;
    }

}