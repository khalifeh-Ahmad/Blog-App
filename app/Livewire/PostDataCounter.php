<?php

namespace App\Livewire;

use App\Models\Follower;
use App\Models\Like;
use App\Models\Post;
use Livewire\Component;

class PostDataCounter extends Component
{

  //public $postLikes;
  public $type;
  public $count;

  public function mount($type)
  {
    $userId = auth()->user()->id;
    switch ($type) {
      case 'likes':
        $this->count = Post::join('likes', 'likes.post_id', '=', 'posts.id')
          ->where('posts.user_id', $userId)
          ->count();
        break;
      case 'comments':
        $this->count = Post::join('comments', 'comments.post_id', '=', 'posts.id')
          ->where('posts.user_id', $userId)
          ->count();
        break;
      case 'posts':
        $this->count = Post::where('user_id', $userId)->count();
        break;
      case 'followers':
        $this->count = Follower::where('follower_id', $userId)->count();
        break;
      default:
        $this->count = 0; // Fallback in case of an unexpected type
    }
    // $this->postLikes = Post::join('likes', 'likes.post_id', '=', 'posts.id')
    //   ->where('posts.user_id', auth()->user()->id)->count();
    ////$this->postLikes = Like::where('user_id', auth()->user()->id)->count();
  }
  public function render()
  {
    return view('livewire.post-data-counter');
  }
}
