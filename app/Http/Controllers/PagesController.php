<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        return view('dashboard');
    }

    public function about()
    {
        return view('about_software');
    }

    public function my_account()
    {
        return view('my_account');
    }

    public function faqs()
    {
        return view('faqs');
    }

    public function logout()
    {
        return view('logout');
    }

}
