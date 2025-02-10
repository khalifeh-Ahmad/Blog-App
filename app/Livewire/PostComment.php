<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class PostComment extends Component
{
  public $post_id;
  public $comment = '';
  public $postComments;
  public function mount($postId)
  {
    $this->post_id = $postId;
    $this->postComments = Comment::join('users', 'users.id', '=', 'comments.user_id')
      ->where('post_id', $this->post_id)->get(['users.name', 'comments.*']);
  }

  public function leaveComment()
  {
    $this->validate([
      'comment' => 'required'
    ]);
    $cerateComment = new Comment;
    $cerateComment->user_id = auth()->user()->id;
    $cerateComment->post_id = $this->post_id;
    $cerateComment->comment = $this->comment;
    $cerateComment->save();
    $this->postComments = Comment::where('post_id', $this->post_id)->get();
  }

  public function render()
  {
    return view('livewire.post-comment');
  }
}
