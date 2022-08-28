<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;

class PostController extends Controller
{
    public function save($id){
        $author=Author::find($id);
        $post=new Post;
        $post->name="Post4";
        $post->cat="Post Category4";
        // $post->author_id=$author;
        $author->post()->save($post);
    }
    public function index(){
        $data = Post::with('author')->get();
        // return Post::all();
        return view('dashboards.admin.post_view')->with('data',$data);
    }
}
