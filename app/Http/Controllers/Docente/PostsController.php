<?php

namespace App\Http\Controllers\Docente;

use App\Post;
use DB;
use App\Category;
use App\Tag;
use App\GrupoMateria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    
    public function show($id){
        $post = Post::find($id);
        return view('docente.posts.show',compact('post'));
    }

    public function index(){
        $posts = Post::all();
        // return $posts->tags;
        return view('docente.posts.index',compact('posts'));
    }

    public function otro($materiaID){
        $posts = Post::all();
        // return $posts->tags;
        return view('docente.posts.index',compact('posts','materiaID'));
    }

    public function store(Request $request){

        $this->validate($request, ['titulo' => 'required']);
        $materiaID=$request->get('materiaID');
        $post = Post::create([
            'titulo'=>$request->get('titulo')
            ]);
        return redirect()->route('docente.postss.edit',[$post,$materiaID]);

    }

    public function edit(Post $post){
        return $post;
        $categories = Category::all();
        $tags = Tag::all();
        // $gruposMateria = GrupoMateria::all();

        // $query = DB::select('     
        // select posts.titulo,tareas.id,tareas.titulotarea,desctarea,fecha_entrega,files.url
        // from tareas,posts,files
        // where tareas.post_id=posts.id and tareas.id=files.tarea_id and tareas.user_id = '.$userEst_id.' and posts.user_id = '.$userDoc_id           
        // );
        
        $userID=Auth::user()->id;
        $materiaID=
        $gruposMateria= DB::select(' select grupos_materia.id,grupos_materia.nombregrupomat
        from grupos_materia
        where grupos_materia.user_id='.$userID.' and grupos_materia.materia_id='.$materiaID);


        return view('docente.posts.edit',compact('categories','gruposMateria','post'));
    }

    public function otro1(Post $post, $materiaID){
        // return $materiaID;
        $categories = Category::all();
        $tags = Tag::all();
        // $gruposMateria = GrupoMateria::all();

        // $query = DB::select('     
        // select posts.titulo,tareas.id,tareas.titulotarea,desctarea,fecha_entrega,files.url
        // from tareas,posts,files
        // where tareas.post_id=posts.id and tareas.id=files.tarea_id and tareas.user_id = '.$userEst_id.' and posts.user_id = '.$userDoc_id           
        // );
        
        $userID=Auth::user()->id;
        // $materiaID=
        $gruposMateria= DB::select(' select grupos_materia.id,grupos_materia.nombregrupomat
        from grupos_materia
        where grupos_materia.user_id='.$userID.' and grupos_materia.materia_id='.$materiaID);


        return view('docente.posts.edit',compact('categories','gruposMateria','post'));
    }

    public function update(Post $post, Request $request){
        
        $this->validate($request, [
            'titulo'=>'required', 
            'descripcion'=>'required',
            'fechapublicacion'=>'required',
            'fechaentrega'=>'required',
            'category'=>'required',
            'gruposMateria' => 'required',
            ]);
        
        // return $request->all();
        $post->titulo = $request->get('titulo');
        $post->descripcion = $request->get('descripcion');
        $post->fechapublicacion = $request->has('fechapublicacion') ? Carbon::parse($request->get('fechapublicacion')) : null;
        $post->fechaentrega = $request->has('fechaentrega') ? Carbon::parse($request->get('fechaentrega')) : null;
        $post->category_id = $request->get('category');
        $post->user_id = $userAuth=Auth::user()->id;
        $post->save();

        // $post->tags()->attach($request->get('tags'));
        $post->gruposMateria()->sync($request->get('gruposMateria'));

        // return back()->with('flash','Tu publicacion a sido guardado');
        return redirect()->route('docente.posts.index',$post)->with('flash','Tu publicacion a sido guardado');
    }

    // public function store(Request $request){
        
    //     $this->validate($request, [
    //         'titulo'=>'required', 
    //         'descripcion'=>'required',
    //         'category'=>'required',
    //         'tags' => 'required',
    //         ]);
        
    //     // return $request->all();
    //     $post = new Post;
    //     $post->titulo = $request->get('titulo');
    //     $post->descripcion = $request->get('descripcion');
    //     $post->fechapublicacion = $request->has('fechapublicacion') ? Carbon::parse($request->get('fechapublicacion')) : null;
    //     $post->category_id = $request->get('category');
    //     $post->save();

    //     $post->tags()->attach($request->get('tags'));

    //     return back()->with('flash','Tu publicacion a sido creado');
        
        


    // }
}
