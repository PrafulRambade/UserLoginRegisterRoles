<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('dashboards.user.index');
    }
    public function profile(){
        return view('dashboards.user.profile');
    }
    public function setting(){
        return view('dashboards.user.setting');
    }
}
