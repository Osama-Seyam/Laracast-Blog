<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(){
        $attributes = $this->validatePost();
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);
        return redirect('/');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', ['post' => $post]);
    }


    public function update(Post $post){
        $attributes = $this->validatePost($post);
        $path = $post->thumbnail;
        if(isset($attributes['thumbnail'])){
            Storage::delete($path);
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);
        return redirect('/');
    }

    public function destroy(Post $post){
        $path = $post->thumbnail;
        Storage::delete($path);
        $post->delete();
        return back()->with('success', 'post deleted');
    }

    protected function validatePost(Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title'=> 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => $post->exists ? ['image'] : ['required' , 'image'],
            'excerpt'=> 'required',
            'body'=> 'required',
            'category_id' => 'required|exists:categories,id'
        ]);
    }
}
