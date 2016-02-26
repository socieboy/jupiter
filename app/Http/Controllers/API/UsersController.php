<?php

namespace Socieboy\Jupiter\Http\Controllers\API;

use App\User;
use Socieboy\Jupiter\Contracts\Users\NewUser;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\CreateUserRequest;
use Socieboy\Jupiter\Contracts\Users\UpdateUser;
use Socieboy\Jupiter\Http\Controllers\JupiterController;

class UsersController extends JupiterController
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

    /**
     * Create a User process.
     * @param CreateUserRequest $request
     * @param NewUser $newUser
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request, NewUser $newUser)
    {
        $this->authorize('create_users');
        $newUser->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Update exiting User
     * @param $user
     * @param UpdateUserRequest $request
     * @param UpdateUser $updateUser
     * @return User
     */
    public function update($user, UpdateUserRequest $request, UpdateUser $updateUser)
    {
        $this->authorize('update_users');
        return $updateUser->save($user);
    }

    /**
     * Delete a User.
     * @param $user
     */
    public function destroy($user)
    {
        $this->authorize('delete_users');
        $user->delete();
    }
}