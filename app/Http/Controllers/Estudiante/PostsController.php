<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    public function show($id){
        $post = Post::find($id);
        return view('estudiante.posts.show',compact('post'));
    }
}
