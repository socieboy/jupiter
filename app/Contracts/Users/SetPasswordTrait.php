<?php
namespace Socieboy\Jupiter\Contracts\Users;

use Illuminate\Http\Request;

trait SetPasswordTrait
{
    /**
     * @var Mailer
     */
    protected $mailer;

    /**
     * Format the inputs.
     * @param Request $request
     * @return array
     */
    protected function formatRequest(Request $request)
    {
        return [
            'name' => ucfirst(strtolower($request->name)),
            'email' => strtolower($request->email),
            'password' => $this->getPassword($request)
        ];
    }

    /**
     * Get the password.
     * @param Request $request
     * @return mixed|string
     */
    protected function getPassword(Request $request)
    {
        return (! $request->generate_password) ? $request->password : $this->makePassword();
    }

    /**
     * Generate password if it's neccesary
     * @param int $length
     * @return string
     */
    protected function makePassword($length = 8)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%*_-=+?";
        return substr(str_shuffle($chars), 0, $length);
    }

    /**
     * Send a email with the password.
     * @param $user
     */
    protected function sendEmailOfNotification($user)
    {
        $this->mailer->send('jupiter::emails.password-notification', $user, function($message) use($user){
            $message->from(
                config('jupiter.emails.from.email'),
                config('jupiter.emails.from.name')
            );
            $message->to(
                $user['email'],
                $user['name']
            )->subject('Welcome to our application.');
        });
    }
}