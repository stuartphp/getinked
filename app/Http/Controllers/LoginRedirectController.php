<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRedirectController extends Controller
{
    public function index()
    {
        $role = auth()->user()->roles->title;

        if($role == 'User')
        {
            return redirect('customer/account');
        }else{
            return redirect('users');
        }
    }
}
