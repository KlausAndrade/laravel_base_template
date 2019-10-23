<?php

namespace App\Http\Controllers\Settings;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     *
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail($value);
                    }
                }
            ],
            'password' => 'required|confirmed|min:6|different:old_password',
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);
    }
}
