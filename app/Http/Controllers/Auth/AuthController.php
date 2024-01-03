<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ValidateConfirmationRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ValidateRegisterRequest;
use App\Http\Services\EmailService;
use App\Http\Services\FileUploadService;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{   
    public function register()
    {
        return view('auth.register');
    }
    
    public function login()
    {
        return view('auth.login');
    }

    public function confirmation(int $id)
    {
        return view('auth.confirmation', compact('id'));
    }
    
    public function register_user(ValidateRegisterRequest $request)
    {
        $user_data = $request->only('email', 'password');
        $profile_data = $request->only('company_name', 'description', 'avatar');

        $user_data['confirmation_code'] = random_int(10000, 99999);
        if ($request->hasFile('avatar')) {
            $name = FileUploadService::singleUpload($request->file('avatar'));
            $profile_data['avatar'] = $name;
        }
        
        $user = UserService::create($user_data, $profile_data);
        
        EmailService::send_email($request->input('email'), (string) $user->confirmation_code);
        return redirect()->route('auth.confirmation', $user->id);
    }

    public function confirm_user(ValidateConfirmationRequest $request)
    {
        $response = User::query()->where('id', intval($request->input('id')))
        ->where('confirmation_code', intval($request->input('code')))->update([
            'confirmed' => true
        ]);

        if ($response === 1) {
            return redirect()->route('index');
        }

        return back()->withErrors([
            'code' => 'Sorry but this code not correct.',
        ]);
    }

    public function login_user(Request $request)
    {
        $data = ['confirmed' => true, ...$request->only(['email', 'password'])];

        if (Auth::attempt($data, true)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->withErrors([
            'password' => 'Sorry but email or password not correct or your account not confirmed',
        ]);
    }   

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();

        return redirect()->route('index');
    }
}
