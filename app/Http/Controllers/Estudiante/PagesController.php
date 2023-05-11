<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Post;
use \App\Materia;

class PagesController extends Controller
{
    public function home($materia_id){
        // $posts = App\Post::all(); //trae todos los datos
        // $posts = Post::latest('published_at')->get(); //ordena por fecha de creacion
        // $posts = Post::where NotNull('published_at')
        //                 ->where('published_at','<=',Carbon::now())
        //                 ->latest('published_at')
        //                 ->get();
        $posts = Post::published()->get();
        $materia = Materia::findOrFail($materia_id);
        // return view('welcome')->with('posts',$posts); // una forma de pasar valor a la vista with(varible,valor)
        return view('estudiante.welcome',compact('posts','materia')); // otra forma de pasar valor a la vista compact(valor de $posts)
    }
}
