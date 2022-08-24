<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCOntroller extends Controller
{
    public function index(){
        return view('dashboards.admin.index');
    }
    public function profile(){
        return view('dashboards.admin.profile');
    }
    public function setting(){
        return view('dashboards.admin.setting');
    }
}
