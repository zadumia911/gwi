<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyinfoController extends Controller
{
  public function manage(){
    return view('backEnd.companyinfo.manage');
  }
}
