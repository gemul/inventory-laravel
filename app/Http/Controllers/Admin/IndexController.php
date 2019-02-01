<?php

namespace App\Http\Controllers\Admin;

use App\Reports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
class IndexController extends Controller
{
    public function index()
    {   
        // dd(\Auth::user()->hakAkses('admin'));
        return view('admin.index', ['reports' => new Reports()]);
    }
}
