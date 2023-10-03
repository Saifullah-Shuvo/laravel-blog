<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::where('post_status', '=', 'active')->latest()->limit(10)->get();
        return view('frontend.bloghome',compact('posts'));
    }

    public function details($id){
        $post = Post::findOrFail($id);
        return view('frontend.singlepost',compact('post'));
    }

    public function accept($id){
        $data = Post::find($id);
        $data->post_status = 'active';
        $data->save();

        return redirect()->back()->with('success','Post Status Changed to Active');
    }

    public function reject($id){
        $data = Post::find($id);
        $data->post_status = 'inactive';
        $data->save();

        return redirect()->back()->with('danger','Post Status Changed to Inactive');
    }
}


