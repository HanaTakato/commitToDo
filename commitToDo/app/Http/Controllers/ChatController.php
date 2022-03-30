<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function chatAll(){

        $inUser = session()->get('inUser');

        if($inUser==[] || $inUser=="" || $inUser==null){
            return redirect('signIn.php');
            exit;
        }

        return view('pages.chat');
    }
}
