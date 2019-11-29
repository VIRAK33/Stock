<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
class AuthenticateController extends Controller
{
    public function login(Request $r)
    {
        $user = array(
            'username' => $r->username,
            'password' => $r->password
        );
        if(Auth::attempt($user))
        {
            return redirect('admin');
        }
        else{
            return redirect('login')
                ->with('error', 'Invalid username or password');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
