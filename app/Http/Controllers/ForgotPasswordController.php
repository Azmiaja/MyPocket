<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $otp = random_int(100000, 999999); // Lebih aman daripada rand()

            // Simpan OTP di database
            $user->otp = $otp;
            $user->otp_expires_at = now()->addMinutes(10);
            $user->save();

            // // Kirim email menggunakan Markdown (bisa dikustomisasi)
            Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject("Kode OTP Reset Password");
            });


            return redirect()->route('otp')->with('success', 'OTP telah dikirim ke email Anda.');
        } catch (\Exception $e) {
            Log::error("Gagal mengirim OTP: " . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat mengirim OTP. Silakan coba lagi.');
        }
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->otp !== $request->otp || Carbon::now()->gt($user->otp_expires_at)) {
            return back()->with('error', 'Kode OTP salah atau sudah kadaluarsa.');
        }

        return redirect()->route('reset.password.form', ['email' => $user->email]);
    }

    public function showResetForm($email)
    {
        return view('auth.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password),
            'otp' => null, // Hapus OTP setelah digunakan
            'otp_expires_at' => null,
        ]);

        return redirect()->route('login')->with('success', 'Password berhasil direset.');
    }
}
