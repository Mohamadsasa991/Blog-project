<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
// use DebugBar\DebugBar;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    public function index(){
        // $posts =Post::all();
        Debugbar::addMessage('Another message', 'mylabel');
        $posts =Post::with('user','tags')->orderBy('id','DESC')
        ->paginate();
        return view('posts.index',['posts'=>$posts]);
    }

    public function home(){
        $posts =Post::with('user')->orderBy('id','DESC')->paginate();
        return view('home',['posts'=>$posts]);
    }



    public function create(){
        Gate::authorize('create-post');
        $users = User::select('id','name')->get();
        $tags = Tag::select('id','name')->get();
        return view('posts.add',compact('users','tags'));
    }

    public function store(Request $req){
        Gate::authorize('create-post');
        // dd($req->all());all info about data are store in Request
        $req->validate([
            'title'=>['required','string','min:3'],
            'description'=>['required','string','max:1400'],
            'user_id'=>['required','exists:users,id'],
            'image'=>['required','image','mimes:jpg,png,jpeg,gif'],
        ]);
        // upload the image and in store function we add the path that we want to store image
        //in
        $image = $req->file('image')->store('images', 'public');
        // dd($image);
        $post =new Post();
        $post->title =$req->title;
        $post->description =$req->description;
        $post->user_id =$req->user_id;
        $post->image =$image;
        $post->save();
       $post->tags()->sync($req->tags ?? []);
        return back()->with('success','Post added Successfully');
    }

    public function show($id){
        $post =Post::findOrFail($id);
        return view('posts.show',['post'=>$post]);
    }

    public function search(Request $request){
        $q =$request->q;
        $posts = Post::where('title','LIKE','%'. $q.'%')->paginate();
        return view('posts.search',['posts'=>$posts]);
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $users = User::select('id','name')->get();
        $tags = Tag::select('id','name')->get();
        return view('posts.edit',['post'=>$post,'users'=>$users,'tags'=>$tags]);
    }

    public function update($id ,Request $request){
        $post =Post::findOrFail($id);
        $old_image =$post->image;
        $post->title =$request->title;
        $post->description =$request->description;
        $post->user_id =$request->user_id;
        if($request->hasFile('image')){
            $new_image = $request->file('image')->store('images', 'public');
            File::delete($old_image);
            $post->image =$new_image;
        }
        $post->save();
        // dd($post);
       $post->tags()->sync($req->tags ?? []);
        return redirect('posts')->with('success','Post updated Successfully');
    }

    public function destroy($id){
        $post =Post::findOrFail($id);
        $post->delete();
        return back()->with('success','Post deleted Successfully');
    }
}

