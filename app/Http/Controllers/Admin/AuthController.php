<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
 
    public function showLoginForm()
    {

        $logged =  Auth::guard('admin')->check();

        if($logged) {
            
            return redirect()->route('admin.dashboard');
        }
        

        return view('admin.login');
    }


    public function login(Request $request)
    {
        $errors = new MessageBag();
        
        if (in_array('', $request->only('email', 'password'))){
            $errors = ['email' => ['Digite um email'], 'password' => ['Digite uma senha']];

            return back()->withErrors($errors)->withInput($request->only('email', 'remember'));
            
        }
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $errors = ['email' => ['Digite um email válido']];

            return back()->withErrors($errors)->withInput($request->only('email', 'remember'));
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(!Auth::guard('admin')->attempt($credentials)) {
            $errors = ['password' => ['Email ou senha incorreto.']];

            return back()->withErrors($errors)->withInput($request->only('email', 'remember'));
        }

        //$this->authenticated($request->getClientIp());

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);

    }
}
