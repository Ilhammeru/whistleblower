<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Function to show login form
     */
    public function index()
    {
        $title = __('view.login');

        return view('pages.auth.login', compact('title'));
    }

    /**
     * Function to login
     */
    public function login(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required|min:6'
            ]);

            if ($validate->fails()) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validate)
                    ->with('error_alert', $validate->errors()->all());
            }

            $username = $request->username;
            $password = $request->password;

            $credential = [
                'username' => $username,
                'password' => $password,
            ];

            if (Auth::attempt($credential)) {
                $user = auth()->user();
                return redirect()->route('dashboard');
            }

            return redirect()
                ->back()
                ->with('error_alert', "Email or Password doesn't match")
                ->withInput();
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error_alert', 'Failed to login');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
