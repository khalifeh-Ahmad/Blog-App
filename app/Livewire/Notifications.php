<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notifications extends Component
{
  public $notifications;
  public function mount()
  {
    $this->notifications = Auth::user()->notifications;
  }

  public function markAsRead($notificationId)
  {
    $notification = Auth::user()->notifications()->find($notificationId);
    if ($notification) {
      $notification->markAsRead();
    }
  }

  public function markAllAsRead()
  {
    Auth::user()->unreadNotifications->markAsRead();
  }

  public function render()
  {
    return view('livewire.notifications');
  }
}
