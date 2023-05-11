<?php

namespace App\Http\Controllers\Estudiante;

use App\Post;
use DB;
use App\Tarea;
use App\Materia;
use App\Category;
use App\Tag;
use App\GrupoMateria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TareasController extends Controller
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

    public function store(Request $request){

        $postID = $request->get('idpost');
        // return $postID;
        $tarea = Tarea::create([
            'titulotarea'=>$request->get('titulotarea'),
            'desctarea'=>$request->get('desctarea'),
            'fecha_entrega'=> Carbon::now()->toDateTimeString(),
            'user_id'=>$userAuth=Auth::user()->id,
            'post_id'=>$postID
            ]);
            
        // return redirect()->route('estudiante.posts.show',[$postID]);
        return redirect()->route('estudiante.tareas.edit',$tarea);
        // return $tarea;
         
    }

    public function cargarPortafolio($materia_id, $estudiante_id){
        // dd($materia_id);
        $datosEstudiante= DB::select('select * 
        from users
        where users.id = '.$estudiante_id .'
        ');

        $datosMateria = DB::select('select * 
        from materias
        where materias.id = '.$materia_id.'
        ');

        $userDoc_id=Auth::user()->id;
        $userEst_id=$estudiante_id;

        $query = DB::select('     
        select posts.titulo,tareas.id,tareas.titulotarea,desctarea,fecha_entrega,files.url
        from tareas,posts,files
        where tareas.post_id=posts.id and tareas.id=files.tarea_id and tareas.user_id = '.$userEst_id.' and posts.user_id = '.$userDoc_id           
        );
// dd($query);
        // return $query;
        return view('docente.estudiantes.index', compact('datosMateria', 'datosEstudiante','query'));
    }


    public function edit(Tarea $tarea){
        // $categories = Category::all();
        // $tags = Tag::all();
        // $gruposMateria = GrupoMateria::all();
        $post = Post::findOrFail($tarea->post_id);
// return $post;
        return view('estudiante.posts.edit',compact('tarea','post'));

    }

    public function update(Tarea $tarea, Request $request){
        
        // $this->validate($request, [
        //     'titulo'=>'required', 
        //     'descripcion'=>'required',
        //     'fechapublicacion'=>'required',
        //     'fechaentrega'=>'required',
        //     'category'=>'required',
        //     'gruposMateria' => 'required',
        //     ]);
        
        // return $request->all();
        $tarea->titulotarea = $request->get('titulotarea');
        $tarea->desctarea = $request->get('desctarea');
        $tarea->fecha_entrega = $request->has('fecha_entrega') ? Carbon::parse($request->get('fecha_entrega')) : null;
        $tarea->user_id=$userAuth=Auth::user()->id;
        $tarea->post_id=$request->get('idpost');

        $tarea->save();

        // $tarea->tags()->attach($request->get('tags'));
        // $tarea->gruposMateria()->sync($request->get('gruposMateria'));

        // return back()->with('flash','Tu publicacion a sido guardado');
        $post = Post::findOrFail($request->get('idpost'));

        return redirect()->route('estudiante.posts.show',$post)->with('flash','Tu publicacion a sido guardado');
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

