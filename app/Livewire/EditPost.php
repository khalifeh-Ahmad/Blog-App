<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
  use WithFileUploads;

  public Post $post;
  public $title;
  public $content;
  public  $photo;

  public function mount($postData)
  {
    $this->post = $postData;
    $this->title = $postData->title;
    $this->content = $postData->content;
  }

  public function update()
  {
    $this->validate([
      'title' => 'required',
      'content' => 'required',
    ]);
    if ($this->photo == null) {
      Post::where('id', $this->post->id)->update([
        'title' => $this->title,
        'content' => $this->content,
      ]);
    } else {
      $photo_name = md5($this->photo . microtime()) . '.' . $this->photo->extension();
      $this->photo->storeAs('public/images', $photo_name);
      Post::where('id', $this->post->id)->update([
        'title' => $this->title,
        'content' => $this->content,
        'photo' => $photo_name,
      ]);
    }

    session()->flash('message', 'The post Updated Successfully');
    return $this->redirect('/my/posts', navigate: true);
  }

  public function render()
  {
    return view('livewire.edit-post');
  }
}
