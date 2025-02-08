<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function dashboardPage()
  {
    $loggedUser = Auth::user();
    return view('user.home-page', compact('loggedUser'));
  }

  public function loadMyPosts()
  {
    $loggedUser = Auth::user();
    return view('user.my-posts', compact('loggedUser'));
  }

  public function loadCreatePost()
  {
    $loggedUser = Auth::user();
    return view('user.create-post', compact('loggedUser'));
  }
}
