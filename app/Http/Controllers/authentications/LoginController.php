<?php

namespace App\Http\Controllers\authentications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
  public function index()
  {
    return view('content.authentications.login-form');
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if (auth()->attempt($credentials)) {
      // return json response
      return response()->json([
        'success' => true,
        'message' => 'User Logged in Successfully',
        'redirect_url' => route('dashboard-analytics')
      ]);
    }

    // return json response
    return response()->json([
      'success' => false,
      'message' => 'Invalid Email or Password',
    ], 401);
  }

  public function logout(): RedirectResponse
  {
    Session::flush();
    Auth::logout();

    return Redirect('login');
  }
}
