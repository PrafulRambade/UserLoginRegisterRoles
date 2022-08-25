<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

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
        $company=Company::all();
        // return $data;
        return view('dashboards.admin.add_user',compact('company'));
    }
    public function userAdd(Request $request){
        // return $request;
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 2;
        $user->password = $request->password;
        $data = $user->save();
        return $data->id;

        foreach($request->company_name as $values){
            DB::table('user_with_companies')->insert([
                'user_id' => $data->id,
                'company_id' => $values,
            ]);
        }
    }
}
