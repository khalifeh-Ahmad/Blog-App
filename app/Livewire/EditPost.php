<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{

  public Post $post;
  public $title;
  public $content;

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
      //'photo' => 'required',
    ]);

    Post::where('id', $this->post->id)->update([
      'title' => $this->title,
      'content' => $this->content,
    ]);
    session()->flash('message', 'The post Updated Successfully');
    return $this->redirect('/my/posts', navigate: true);
  }

  public function render()
  {
    return view('livewire.edit-post');
  }
}
