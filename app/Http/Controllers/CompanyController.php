<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\StoreCompany;

class CompanyController extends Controller
{
    public function companies(){
        return view('dashboards.admin.companies');
    }
    public function companyAdd(StoreCompany $req){
        // $data=$req->all();
        // return $data;
        $company = new Company;
        $company->name = $req->company_name;
        $company->city = $req->company_city;
        $company->save();
        return redirect('admin/companies')->with('status','Company Added Successfully');
    }
}
