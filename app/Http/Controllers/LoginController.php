<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    private $rules = [
        'username' => 'nullable',
        'email' => 'required',
        'password' => 'required',
    ];

    public function index()
    {
        return view('login');
    }

    public function signup(Request $req)
    {
        $cred = Validator::make($req->all(), $this->rules);

        if ($cred->fails())
            return back()->with('error', 'Daftar gagal');

        $data = $req->validate($this->rules);
        $data['password'] = Hash::make($req->password);
        $user = User::create($data);

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $req->session()->regenerate();
            return redirect()->intended();
        }

        return back()->with('error', 'Daftar gagal');
    }

    public function login(Request $req)
    {
        $cred = Validator::make($req->all(), $this->rules);

        if ($cred->fails())
            return back()->with('error', 'Login gagal');

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $req->session()->regenerate();
            return redirect(route('landing'))->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Login gagal');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/');
    }
}
