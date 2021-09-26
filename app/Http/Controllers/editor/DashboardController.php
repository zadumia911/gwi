<?php

namespace App\Http\Controllers\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('backEnd.dashboard.dashboard');
    }
}
