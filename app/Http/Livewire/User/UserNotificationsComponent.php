<?php

namespace App\Http\Livewire\User;

use App\Models\UserNotifications;
use Livewire\Component;

class UserNotificationsComponent extends Component
{
    protected $listeners = ['markAll'];

    public $userNotifications;
    public $markOverwritten;

    public function mount()
    {
        $this->userNotifications = auth()->user()->notifications;
        $this->markAll();
    }
    private function markAll()
    {
        auth()->user()->notifications()->update(['isMarkedAsSeen' => 1]);
    }

    public function markAsRead($id)
    {
        UserNotifications::where('id', $id)->update(['isMarkedAsSeen' => 1, 'unmark_flag' => 0]);
        $this->userNotifications->where('id', $id)->first()->isMarkedAsSeen = 1;
        $this->userNotifications->where('id', $id)->first()->unmark_flag = 0;
    }

    public function markAsNotRead($id)
    {
        UserNotifications::where('id', $id)->update(['unmark_flag' => 1]);

        $this->userNotifications->where('id', $id)->first()->isMarkedAsSeen = 0;
        $this->userNotifications->where('id', $id)->first()->unmark_flag = 0;
    }

    public function render()
    {
        return view('livewire.user.user-notifications-component');
    }
}
