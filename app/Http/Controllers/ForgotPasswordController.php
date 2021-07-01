<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller{

    public function index()
    {
        return view('forgot_password');
    }

    public function verifyKey(Request $request)
    {
        $email = $request->input('email');
        $security_key = $request->input('security_key');

        $user_data = DB::table('users')->select('*')
                                ->where('email', '=', $email)
                                ->where('security_key', '=', $security_key)
                                ->get();

        $user_data = json_decode(json_encode($user_data), 'true');

        if( count($user_data) == 1 )
        {
            session_start();
            $_SESSION['userid'] = $user_data[0]['id'];
            return view('reset_password');
        }else{
            return redirect('forgot_password')->with('wrong_credentials', 'You have entered incorrect Credentials');
        }

    }

    public function loadResetPassword()
    {
        return view('reset_password');
    }

    public function changePassword(Request $request)
    {
        session_start();

        $password = $request->input('new_password');
        $password = Hash::make($password);

        $data = array('password' => $password);

        DB::table('users')
            ->where('id', '=', $_SESSION['userid'])
            ->update( $data );

        unset($_SESSION['userid']);

        return redirect('login')->with('password_changed', "You have changed your Password. Please login to continue !");
    }

}
