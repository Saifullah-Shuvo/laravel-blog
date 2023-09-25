<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = '';

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        //image store in public folder
        $image = $request->image;
        // $imageName = time().'.'.$image->getClientOriginalExtension();
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $request->image->move('postimage', $imageName);
        //end
        $post->image = $imageName;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created Successfully');
    }

    // public function show($id)
    // {
    //     // Retrieve a specific post by its ID
    //     $post = Post::findOrFail($id);

    //     // Show the post details
    //     return view('posts.show', compact('post'));
    // }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
        return redirect('/posts')->with('success', 'Post Updated Successfully');
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

        return redirect('/posts')->with('success', 'Post Deleted Successfully');
    }
}
