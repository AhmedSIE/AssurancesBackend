<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use App\Models\Message as ModelsMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function save(Request $request){
        $user=$request->user()->id;
        $message= new ModelsMessage();
        $message->user_id=$user;
        $message->statut='envoyé';
        $message->texte=$request->message;
        $message->save();
        $messages=ModelsMessage::where('user_id',$request->user()->id)->get();
        // event(new MyEvent($message));
        return response()->json($messages);
    }
    public function index(Request $request){
        $messages=ModelsMessage::where('user_id',$request->user()->id)->get();
        return response()->json($messages);
    }
}
