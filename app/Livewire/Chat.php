<?php

namespace App\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends Component
{
    public $message;
    public $convo =[];
    //public $messages;

    public function mount()
    {
        $messages = Message::all();
        foreach($messages as $message)
        {
            $convo[] = ['username'=>$message->username,'message'=>$message->message];
        }

    }

    public function submitMessage()
    {
        //dispatch message
        //dump($this->message);
        MessageEvent::dispatch(Auth::user()->id, $this->message);
        $this->message = "";
    }
    #[On('echo:our-channel,MessageEvent')]
    public function listenForMessages($data)
    {
        $this->convo[]=[
            'username'=>$data['username'],
            'message'=>$data['message']
        ];
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
