<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function dashboardPage()
  {
    $loggedUser = Auth::user();
    return view('admin.home-page', compact('loggedUser'));
  }
}
