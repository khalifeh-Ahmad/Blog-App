<?php

namespace App\Livewire;

use App\Models\Follower;
use App\Models\UserFollower;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowersPage extends Component
{
  public $followers;
  public function mount()
  {
    $this->loadFollowers();

    //dd($this->followers);
  }

  public function loadFollowers()
  {
    // $this->followers = Follower::where('followed_id', Auth::id())->with('follower')
    //   ->leftJoin('user_profiles', 'user_profiles.user_id', '=', 'followers.follower_id')
    //   ->get(['followers.*', 'user_profiles.image as profile_image']);


    $this->followers = Follower::where('followed_id', Auth::id())
      ->leftJoin('user_profiles', 'user_profiles.user_id', '=', 'followers.follower_id')
      ->join('users', 'users.id', '=', 'followers.follower_id')
      ->get(['followers.*', 'users.name', 'user_profiles.image as profile_image']);
  }

  public function removeFollower($followerId)
  {
    Follower::where('followed_id', Auth::id())
      ->where('follower_id', $followerId)
      ->delete();

    $this->loadFollowers();
  }


  public function render()
  {
    return view('livewire.followers-page');
  }
}
