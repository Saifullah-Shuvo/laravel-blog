<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request){
        // $posts = Post::where('post_status', '=', 'active')->latest()->limit(10)->get();
        $posts = Post::where('post_status', '=', 'active')->orderBy('id', 'DESC')->paginate(6);
        if ($request->ajax()) {
            $view = view('frontend.data', compact('posts'))->render();

            return response()->json(['html' => $view]);
        }
        return view('frontend.bloghome',compact('posts'));
        
    }
    
    public function allposts(){
        $posts = Post::where('post_status', '=', 'active')->orderBy('id', 'DESC')->paginate(10);
        return view('frontend.allposts',compact('posts'));
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


