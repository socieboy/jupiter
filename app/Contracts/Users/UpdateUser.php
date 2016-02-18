<?php
namespace Socieboy\Jupiter\Contracts\Users;

use App\User;
use Illuminate\Http\Request;

class UpdateUser
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
    public function __construct(Request $request)
    {
        $this->user = $this->formatRequest($request);
        $this->file = $request->file('avatar');
    }

    /**
     * Update the gived user.
     */
    public function save(User $user)
    {
        $this->uploadAvatar();
        $user->fill($this->user)->save();
        return $user;
    }

}