<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;
use App\Models\User;

class PostController extends Controller
{
    public function save(){

        $id = auth()->user()->id;

        $user=User::find($id);
        $post=new Post;
        $post->name="Post4";
        $post->cat="Post Category4";
        // $post->author_id=$author;
        $user->post()->save($post);
    }
    public function index(){
        $data = Post::with('user')->get();
        // return Post::all();
        return view('dashboards.admin.post_view')->with('data',$data);
    }
}
