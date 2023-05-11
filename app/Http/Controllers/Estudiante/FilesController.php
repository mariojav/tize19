<?php

namespace App\Http\Controllers\Estudiante;
use App\Post;
use App\Tarea;
use App\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{

    public function store(Tarea $tarea){
        // $this->validate(request(),[
        //     'photo'=>'image', //jpg png bmp gif svg
        // ]);
        // return $tarea;

        $file=request()->file('file')->store('tareas');

        $photoUrl = Storage::url($file); 
        File::create([
            'url' => $file,
            // 'url' => $photoUrl,
            'tarea_id' => $tarea->id,
        ]);
    }

    public function destroy(Tarea $file){
        $file->delete();
        return back()->with('flash','archivo eliminada');
    }
}
