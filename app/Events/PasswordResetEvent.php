<?php namespace App\Events;


use Illuminate\Queue\SerializesModels;
use App\Models\User;

use Event;

class PasswordResetEvent extends Event {

    use SerializesModels;


    public $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

}
