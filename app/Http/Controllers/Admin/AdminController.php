<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.posts.allposts');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request){

        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->user_type;

        $post = new Post();

        $post->title = $request->title;
        $post->content = $request->content;

        // image store in public folder
        $image = $request->image;
        if($image){
            // $imageName = time().'.'.$image->getClientOriginalExtension();
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imageName);
            //end
            $post->image = $imageName;
        }
        
        $post->post_status = 'active';
        $post->user_id = $userid;
        $post->user_type = $usertype;
        $post->author_name = $name;

        $post->save();
        return redirect('/admin/posts/create')->with('success', 'Post Created Successfully');
    }
}
