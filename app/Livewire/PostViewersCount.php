<?php

namespace App\Livewire;

use App\Models\PostViewers;
use Livewire\Component;

class PostViewersCount extends Component
{

  public $post_viewers;

  public function mount($pId)
  {
    $this->post_viewers = PostViewers::where('post_id', $pId)->count();
  }
  public function render()
  {
    return view('livewire.post-viewers-count');
  }
}
