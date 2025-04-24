<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User; // Model untuk superadmin
// use App\Notifications\AdminForgotPasswordNotification;
// use Illuminate\Support\Facades\Notification;

class ForgotPasswordController extends Controller
{
    /**
     * Show the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send a password reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $response = Password::sendResetLink($request->only('email'));

        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', __($response));
        }

        return back()->withErrors(['email' => __($response)]);
    

    //     if ($response == Password::RESET_LINK_SENT) {
    //         // Fetch password for demonstration (note: not secure)
    //         $user = \App\Models\User::where('email', $request->input('email'))->first();
    //         $password = $user->password; // This is hashed, so it won't show the actual password

    //         return view('auth.show-password', ['password' => $password]);
    //     }

    // return back()->withErrors(['email' => __($response)]);
    }
}

