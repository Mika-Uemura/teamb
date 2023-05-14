<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }

    public function store(Post $post, Request $request)
    {
        $img_path=Storage::putFile('public/img', $request->file('image'));
        $img_path=str_replace('public','storage',$img_path);
        $input = $request['post'];
        $input['img_path']=$img_path;
        $input['user_id']=Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post, Category $category)
    {
        return view('posts/edit')->with(['post' => $post,'categories' => $category->get()]);
    }

    public function update(Request $request, Post $post)
    {
        if($request->file('image')){
             $img_path=Storage::putFile('public/img', $request->file('image'));
             $img_path=str_replace('public','storage',$img_path);
        }else{
            $img_path=$post->img_path;
        }
       $input = $request['post'];
        $input['img_path']=$img_path;
        $input['user_id']=Auth::id();
        $post->fill($input)->save();

        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        if($post->user_id==Auth::id()){
            $post->delete();
        }
        return redirect('/');
    }

}
