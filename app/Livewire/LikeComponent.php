<?php

namespace App\Livewire;

use App\Models\Like;
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

    if ($this->isLiked == false) {
      $this->isLiked = true;
      //save likes to database
      $likePost = new Like;
      $likePost->user_id = auth()->user()->id;
      $likePost->post_id = $this->post_id;
      $likePost->save();
    } else {
      $this->isLiked = false;

      $unlikePost = Like::where([['user_id', auth()->user()->id], ['post_id', $this->post_id]])->delete();
    }

    //dd($this->post_id);
  }

  public function render()
  {
    return view('livewire.like-component', [
      'likesCount' => Like::where('post_id', $this->post_id)->count()
    ]);
  }
}
