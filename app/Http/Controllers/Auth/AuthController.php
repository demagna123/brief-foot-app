<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //

       public function login(LoginRequest $request)
{
    if (Auth::attempt($request->only('email', 'password'))) {
        return redirect()->route('profil')->with('success', "Connexion réussie");
    } else {
        // return redirect()->route('home')->with('error', "Connexion échouée")->withInput();
    }
}


public function profil(){

    return view('auth.profil');
}
    public function registerform(){
        return view('auth.create');
    }

        public function loginform(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
    return redirect()->route('loginform');
    }


    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function sendCode(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Aucun utilisateur trouvé.']);
        }

        $code = rand(100000, 999999);

        DB::table('verification_codes')->updateOrInsert(
            ['email' => $request->email],
            ['code' => $code, 'created_at' => now()]
        );

        Mail::to($request->email)->send(new VerificationCodeMail($code));

        return redirect()->route('password.code.form')->with('email', $request->email);
    }

    public function showCodeForm()
    {
        return view('auth.verify-code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
        ]);

        $record = DB::table('verification_codes')
                    ->where('email', $request->email)
                    ->where('code', $request->code)
                    ->first();

        if (!$record) {
            return back()->withErrors(['code' => 'Code incorrect ou expiré.']);
        }

        return redirect()->route('password.reset.form')->with([
            'email' => $request->email,
            'code' => $request->code,
        ]);
    }

    public function showResetForm(Request $request)
    {
        return view('auth.reset-password', [
            'email' => session('email'),
            'code' => session('code'),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $record = DB::table('verification_codes')
                    ->where('email', $request->email)
                    ->where('code', $request->code)
                    ->first();

        if (!$record) {
            return back()->withErrors(['code' => 'Code invalide ou expiré.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('verification_codes')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Mot de passe mis à jour.');
    }


}
