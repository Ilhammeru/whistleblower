<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
                $user = User::find(auth()->user()->id);
                $role = $user->role;

                // gather all data and put into cache
                $service = new UserService();
                $data = $service->gatherAllData();
                if (!$data) {
                    $this->logout($request);
                }

                return redirect($data['redirection']);
            }

            return redirect()
                ->back()
                ->with('error_alert', "Email or Password doesn't match")
                ->withInput();
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error_alert', $th->getMessage());
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
