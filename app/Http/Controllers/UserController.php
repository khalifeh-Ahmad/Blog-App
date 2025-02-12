<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\UserProfile;
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
    $user_image = UserProfile::where('user_id',   $loggedUser->id)->first()->image;
    return view('user.home-page', compact('loggedUser', 'user_image'));
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
    $user_image = UserProfile::where('user_id',   $loggedUser->id)->first()->image; //(['image']);
    //dd($user_image);
    return view('user.view-post', compact('loggedUser', 'post_data', 'user_image'));
  }

  public function loadProfile()
  {
    $loggedUser = $this->getLoggedUser();
    return view('user.user-profile', compact('loggedUser'));
  }

  public function loadGuestProfile($id)
  {
    $loggedUser = $this->getLoggedUser();
    $guest_id = $id;
    return view('user.guest-profile', compact('loggedUser', 'guest_id'));
  }
}
