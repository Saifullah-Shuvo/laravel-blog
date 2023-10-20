<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $comments = new Comment();
        $comments->visitor_name = $request->visitor_name;
        $comments->visitor_email = $request->visitor_email;
        $comments->visitor_website = $request->visitor_website;
        $comments->post_id = $request->post_id;
        $comments->body = $request->body;
        $comments->save();

        return redirect()->back()->with(['success','Comment added successfully!']);
    }
}
