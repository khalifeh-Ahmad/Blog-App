<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ViewPost extends Component
{
  public $posts;

  public function mount()
  {
    $this->posts = Post::join('users', 'users.id', '=', 'posts.user_id')
      ->orderBy('created_at', 'desc')->get(['users.name', 'posts.*']);

    //dd($this->posts);
    //$this->posts = Post::orderBy('created_at', 'desc')->get();
  }
  public function render()
  {
    return view('livewire.view-post');
  }
}
