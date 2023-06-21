<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use McKenziearts\Notify\Traits\NotifiesUsers;
use App\Models\User;


class AuthController extends Controller
{

    public function login()
    {
        return view('pages.auth.login');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function do_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->hasRole('admin')){
                return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin');
            }
            return redirect()->route('home')->with('success', 'Welcome '. Auth::user()->name);
        }
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password, [])) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Welcome ' . Auth::user()->name);
        } else {
            return back()->with('error', 'Invalid email and password');
        }

    }

    public function do_register(Request $request)
    {
         $validatedData = $request->validate([
            'email' =>'required|email|unique:users',
            'name' =>['required','min:8'],
            'nohp' =>[
                'required',
                'unique:users',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^62/', $value)) {
                        $fail('Phone number must start with "62".');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (strlen($value) < 9) {
                        $fail($attribute.' must be have at least 9 characters.');
                    }
                },
            ],
            'password' =>'required|min:8'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        $user->assignRole('customer');

        return redirect('/login')->with('success','You have successfully registered');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
