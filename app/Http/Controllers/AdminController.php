<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Model untuk superadmin
use App\Notifications\AdminForgotPasswordNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email', // Validasi email admin
        ]);

        $adminEmail = $request->email;

        // Kirim notifikasi ke superadmin
        $superadmins = User::where('role', 'superadmin')->get(); // Asumsi ada role superadmin
        Notification::send($superadmins, new AdminForgotPasswordNotification($adminEmail));

        return redirect()->back()->with('success', 'Permintaan reset password telah dikirim. Superadmin akan diberitahu.');
    }
}
