<?php

namespace Socieboy\Jupiter\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;
use Socieboy\Jupiter\Contracts\Users\NewUser;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\CreateUserRequest;
use Socieboy\Jupiter\Contracts\Users\UpdateUser;

class UsersController extends Controller
{

    /**
     * Retrieve all users with roles.
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $this->authorize('read_users');
        return User::withOutSuperAdmin()->with('roles')->get();
    }

    public function store(CreateUserRequest $request, NewUser $newUser)
    {
        $this->authorize('create_users');
        $newUser->save();
        return redirect()->route('admin.user.index');
    }

    public function update($user, UpdateUserRequest $request, UpdateUser $updateUser)
    {
        $this->authorize('update_users');
        return $updateUser->save($user);
    }

    public function destroy($user)
    {
        $this->authorize('delete_users');
        $user->delete();
    }
}