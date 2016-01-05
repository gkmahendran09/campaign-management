<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard() {
      return view('admin.dashboard');
    }

    public function report() {
      // return view('admin.dashboard');
    }

    public function start() {
      // return view('admin.dashboard');
    }
}
