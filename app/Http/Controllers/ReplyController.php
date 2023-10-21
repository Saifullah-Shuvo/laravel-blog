<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function addReply(Request $request){
        $replies = new Reply();
        $replies->visitor_name = $request->visitor_name;
        $replies->visitor_email = $request->visitor_email;
        $replies->visitor_website = $request->visitor_website;
        $replies->comment_id = $request->comment_id;
        $replies->body = $request->body;
        $replies->save();
        return redirect()->back()->with(['success','Reply added successfully!']);
    }
}
