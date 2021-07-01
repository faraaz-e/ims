<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        $user_data = DB::select('SELECT name, security_key FROM users WHERE id =' .Auth::id() );
        $user_data = json_decode(json_encode($user_data), 'true');

        return view('settings')->with('user_data', $user_data);
    }

    public function updateSettings(Request $request)
    {

        $name = $request->input('name');
        $security_key = $request->input('security_key');

        $data = array('name' => $name, 'security_key' => $security_key );

        DB::table('users')->where('id', '=', Auth::id())
                                ->update( $data );

        return redirect('settings')->with('settings_update_msg', 'Settings updated successfully.');
    }

}
