<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessageReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

     public $formUserId;
     public $toUserId;
     public $messageContent;
    //  public $zoomMeeting;
     public $attachments;


    public function __construct($formUserId,$toUserId,$messageContent,$attachments){
        $this->formUserId = $formUserId;
        $this->toUserId = $toUserId;
        $this->messageContent = $messageContent;
        // $this->zoomMeeting = $zoomMeeting;
        $this->attachments = $attachments;
    }

    // /**
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return \Illuminate\Broadcasting\Channel|array
    //  */
    // public function broadcastOn()
    // {
    //      return new PrivateChannel('messages.'.$this->toUserId);

    // }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('Messages');
        // return new PrivateChannel("Messages.$this->toUserId");

    }
    public function broadcastAs()
    {
        return 'order.messages';
    }
}
