<?php

namespace App\Livewire;

use App\Models\Follower;
use Livewire\Component;

class FollowComponent extends Component
{

  public $followed_Id;
  public $followers_number;
  public $isFollowed;

  public function mount($followedId)
  {
    $this->followed_Id = $followedId;
    $this->followers_number = Follower::where('followed_id', $this->followed_Id)->count();
    $checker = Follower::where([['follower_id', auth()->user()->id], ['followed_id', $this->followed_Id]])
      ->first();
    $this->isFollowed = $checker == null ? 0 : 1;
  }

  public function followUnFollow()
  {
    $user_id = auth()->user()->id;
    $checker = Follower::where([['follower_id', $user_id], ['followed_id', $this->followed_Id]])
      ->first();

    if ($checker == null) {
      // create a data 
      $createFollow = new Follower;
      $createFollow->follower_id = $user_id;
      $createFollow->followed_id = $this->followed_Id;
      $createFollow->save();

      $this->followers_number = Follower::where('followed_id', $this->followed_Id)->count();
      $checker = Follower::where([['follower_id', $user_id], ['followed_id', $this->followed_Id]])
        ->first();
    } else {
      # unfollow by deleting the data..
      $deleteFollow = Follower::where([['follower_id', $user_id], ['followed_id', $this->followed_Id]])
        ->delete();
      $this->followers_number = Follower::where('followed_id', $this->followed_Id)->count();
      $checker = Follower::where([['follower_id', $user_id], ['followed_id', $this->followed_Id]])
        ->first();
    }

    $this->isFollowed = $checker == null ? 0 : 1;
  }

  public function render()
  {
    return view('livewire.follow-component');
  }
}
