<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $user = auth()->user();
        $posts = Post::get();
        return view('admin.posts.allposts',compact('posts'));
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
        return redirect('/admin/posts/create')->with('message', 'Post Created Successfully');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|min:5',
        //     'content' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $imageName = '';

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        //image store in public folder
        if ($request->image) {
            $image = $request->image;
            $image_path = public_path('postimage/' . $post->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            // $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imageName);
        }
        //end
        $post->image = $imageName;

        $post->save();
        return redirect('/admin/posts')->with('success', 'Post Updated Successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        //delete image
        $image_path = public_path('postimage/' . $post->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        //     Storage::delete($image_path);
        //     //$image_path->delete();
        // }
        // if(Storage::exists(public_path('postimage/'.$post->image))){
        //     Storage::delete(public_path('postimage'.$post->image));
        // }
        //end delete image
        $post->delete();

        return redirect('admin/posts')->with('danger', 'Post Deleted Successfully');
    }
}
