<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreUser;

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
    public function Users(){
        // $data = User::leftJoin("companies", function ($join) {
        //     $join->on("users.user_companies", "=", "companies.id");
        // })->get();
        // return $data;
        $company=Company::all();
        // return $data;
        return view('dashboards.admin.add_user',compact('company'));
    }
    public function userAdd(StoreUser $request){
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 2;
        $user->user_companies = json_encode($request->company_name);
        $user->password = $request->password;
        $data = $user->save();
    }
}
