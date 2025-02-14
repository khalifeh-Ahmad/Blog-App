<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Notifications\UserActivityNotification;
use Livewire\Component;

class LikeComponent extends Component
{

  public $post_id;
  public $isLiked;

  public function mount($postId)
  {
    $this->post_id = $postId;
    $checkifLiked = Like::where([['user_id', auth()->user()->id], ['post_id', $this->post_id]])->first();
    $this->isLiked = $checkifLiked == null ? false : true;
  }

  public function likeUnLike()
  {
    $post = Post::find($this->post_id);

    $postOwner = User::find($post->user_id);

    if ($this->isLiked == false) {
      $this->isLiked = true;
      //save likes to database// 
      $likePost = new Like;
      $likePost->user_id = auth()->user()->id;
      $likePost->post_id = $this->post_id;
      $likePost->save();

      // Send notification to the post owner (if it's not the same user)
      if ($postOwner->id !== auth()->user()->id) {
        $postOwner->notify(new UserActivityNotification(
          auth()->user()->name . " liked your post.",
          "/view/post/" . $this->post_id
        ));
      }
    } else {
      $this->isLiked = false;

      $unlikePost = Like::where([['user_id', auth()->user()->id], ['post_id', $this->post_id]])->delete();
    }
  }

  public function render()
  {
    return view('livewire.like-component', [
      'likesCount' => Like::where('post_id', $this->post_id)->count()
    ]);
  }
}
