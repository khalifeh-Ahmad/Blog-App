<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


  private function getLoggedUser()
  {
    return Auth::user();
  }

  public function dashboardPage()
  {
    $loggedUser = $this->getLoggedUser();
    return view('user.home-page', compact('loggedUser'));
  }

  public function loadMyPosts()
  {
    $loggedUser = $this->getLoggedUser();
    return view('user.my-posts', compact('loggedUser'));
  }

  public function loadCreatePost()
  {
    $loggedUser = $this->getLoggedUser();
    return view('user.create-post', compact('loggedUser'));
  }

  public function loadEditPost($pId)
  {
    $loggedUser = $this->getLoggedUser();
    $post_data = Post::find($pId);
    return view('user.edit-post', compact('loggedUser', 'post_data'));
  }

  public function loadPostPage($pId)
  {
    $loggedUser = $this->getLoggedUser();
    $post_data = Post::join('users', 'users.id', '=', 'posts.user_id')
      ->where('posts.id', $pId)->first(['users.name', 'posts.*']);

    return view('user.view-post', compact('loggedUser', 'post_data'));
  }

  public function loadProfile()
  {
    $loggedUser = $this->getLoggedUser();
    return view('user.user-profile', compact('loggedUser'));
  }
}
