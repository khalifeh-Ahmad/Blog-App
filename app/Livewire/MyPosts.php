<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class MyPosts extends Component
{
  public $my_posts;
  public $postsCount;

  public function mount()
  {
    $this->loadPosts();
  }

  public function loadPosts()
  {
    $user_id = auth()->user()->id;
    $this->my_posts = Post::where('user_id', $user_id)->get();
    $this->postsCount = $this->my_posts->count();
  }

  public function deletePost($pId)
  {

    Post::where('id', $pId)->delete();
    session()->flash('message', 'The post Deleted Successfully');
    return $this->redirect('/my/posts', navigate: true);
    //or  //$this->loadPosts();
  }


  public function render()
  {
    return view('livewire.my-posts', [
      'posts' => $this->my_posts,
      'post_count' => $this->postsCount,
    ]);
  }
}
