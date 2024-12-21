<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
  public function login()
  {
    /** @var \Illuminate\Contracts\Auth\Guard $auth */
    $auth = auth();

    if ($auth->check()) {
      return redirect('/');
    }

    return view('auth::index');
  }
  public function authenticate(Request $request)
  {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
      // Authentication passed...
      Alert::success('Success', 'Selamat datang!!');
      return redirect()->intended('/');
    } else {
      // Authentication failed...
      $user = User::where('username', $credentials['username'])->first();

      if (!$user) {
        return redirect()->back()->with('error', 'Username atau Password Salah');
      } else {
        return redirect()->back()->with('error', 'Username atau Password Salah');
      }
    }
  }


  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
  }

}
