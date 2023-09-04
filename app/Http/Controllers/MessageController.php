<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; 

class MessageController extends Controller
{
    //

    public function get_messages(){
        $messages = Message::all(); 
        return response()->json($messages); 

    }
}
