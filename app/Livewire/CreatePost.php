<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class CreatePost extends Component
{

  use WithFileUploads;
  public $post_title = '';
  public $content = '';
  public $photo;

  public function save()
  {
    $this->validate([
      'post_title' => 'required',
      'content' => 'required',
      'photo' => 'required',
    ]);
    $photo_name = md5($this->photo . microtime()) . '.' . $this->photo->extension();
    $this->photo->storeAs('public/images', $photo_name); //then we store image in this path

    $createPost = new Post;
    $createPost->title = $this->post_title;
    $createPost->content = $this->content;
    $createPost->photo = $photo_name;
    $createPost->user_id = auth()->user()->id;
    $createPost->save();
    // Post::insert([
    //   'title' => $this->post_title,
    //   'content' => $this->content,
    //   'photo' => $photo_name,
    //   'user_id' => auth()->user()->id,
    // ]);

    $this->post_title = '';
    $this->content = '';
    session()->flash('message', 'The post was successfully created!');
    $this->redirect('/my/posts', navigate: true); //add this to ensure livewire SPA navigation
    // after save return the fields to empty and redirect user to post lists..
  }

  public function render()
  {
    return view('livewire.create-post');
  }
}
