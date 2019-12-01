<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        return view('posts.index' , compact('posts'));
    }
    public function show(){

    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'tag' => 'required',
        ]);
        $post = new Post();
        $post->title  = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        if($request->hasFile('image'))
        {
            $image = $request->file('image')->store("posts", 'public');
            $post->image = $image;
        }
        $post->save();
        $this->storeTag($request , $post);
        return back();
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit' , compact('post'));
    }
    public function update(Request $request , Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'tag' => 'required',
        ]);
        $post->title  = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        if($request->hasFile('image'))
        {
            $image = $request->file('image')->store("posts", 'public');
            $post->image = $image;
        }
        $post->save();
        $this->updateTag($request , $post);
        return back();
    }
    public function  storeTag( $request , $post)
    {
        $parts = explode(",", $request->tag);
        for ($i = 0; $i < sizeof($parts); $i++) {
            $tag_element = trim($parts[$i]);
            $db_tag =  Tag::where('body', $tag_element)->get();
            if ($db_tag->isEmpty()) {
                $tag = new Tag();
                $tag->body = $tag_element;
                $tag->save();
                $tagId = $tag->id;
            } else {
                $tagId = $db_tag->first()->id;
            }
            $post_tags = DB::table('post_tags')->insert(['post_id' => $post->id, 'tag_id' =>  $tagId]);
        }
    }
    public function updateTag( $request , $post)
    {
        foreach( $post->tags as $tag)
        {
            $post_tag = PostTag::where('post_id',$post->id)->where('tag_id' , $tag->id)->first();
            $post_tag->delete();
        }
        $parts = explode(",", $request->tag);
        for ($i = 0; $i < sizeof($parts); $i++) {
            $tag_element = trim($parts[$i]);
            $db_tag =  Tag::where('body', $tag_element)->get();
            if ($db_tag->isEmpty()) {
                $tag = new Tag();
                $tag->body = $tag_element;
                $tag->save();
                $tagId = $tag->id;
            } else {
                $tagId = $db_tag->first()->id;
            }
            $post_tags = DB::table('post_tags')->insert(['post_id' => $post->id, 'tag_id' =>  $tagId]);
        }
    }
}
