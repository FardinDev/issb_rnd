<?php
namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewPostAdded implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message, $details;

  public function __construct($message, $details)
  {
      $this->message = $message;
      $this->details = $details;
  }

  public function broadcastOn()
  {
      return ['my-channel-admin'];
  }

  public function broadcastAs()
  {
      return 'my-event';
  }


  public function broadcastWith()
    {
        
        return [
            'post' =>  $this->details,
            'message' => $this->message,
        ];
    }
}