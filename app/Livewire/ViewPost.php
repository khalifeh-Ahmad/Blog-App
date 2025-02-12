<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\PostViewers;
use Livewire\Component;

class ViewPost extends Component
{
  public $posts;
  public function mount()
  {
    $this->posts = Post::join('users', 'users.id', '=', 'posts.user_id')
      ->orderBy('created_at', 'desc')->get(['users.name', 'users.id as followedId', 'posts.*']);

    //$this->posts = Post::orderBy('created_at', 'desc')->get();
  }


  public function addViewers($pID)
  {
    $userId = auth()->user()->id;
    $ipAddress = request()->ip();
    //$ipAddress = request()->header('X-Forwarded-For') ?? request()->ip();
    //dd(request()->ip());

    //Check if the user OR IP has already viewed this post
    $existingView = PostViewers::where('post_id', $pID)
      ->where(function ($query) use ($userId, $ipAddress) {
        $query->where('user_id', $userId)
          ->orWhere('ip_address', $ipAddress);
      })
      ->exists();

    // If no existing view, insert a new record
    if (!$existingView) {
      PostViewers::create([
        'user_id' => $userId,
        'post_id' => $pID,
        'ip_address' => $ipAddress,
      ]);
    }

    // $addViewer = new PostViewers;
    // $addViewer->user_id = auth()->user()->id;
    // $addViewer->post_id = $pID;
    // $addViewer->save();
  }
  public function render()
  {
    return view('livewire.view-post');
  }
}
