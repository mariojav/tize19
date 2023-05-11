<?php

use Illuminate\Database\Seeder;
use App\Post;
use Carbon\Carbon;
use App\Category;
use App\GrupoMateria;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Post::truncate();
        // Category::truncate();
        // GrupoMateria::truncate();

        $category = new Category;
        $category->nombre = "Practica";
        $category->save();

        $category = new Category;
        $category->nombre = "Investigacion";
        $category->save();

        $category = new Category;
        $category->nombre = "Examen";
        $category->save();

        $category = new Category;
        $category->nombre = "Repaso";
        $category->save();


        $post = new Post;
        $post->titulo = "mi primer post";
        $post->descripcion = "contenidio de mi primer post";
        $post->fechapublicacion = Carbon::now();
        $post->fechaentrega = Carbon::now();
        $post->category_id=1;
        $post->user_id=2;
        $post->save();
        $post->gruposMateria()->attach(1);

        $post = new Post;
        $post->titulo = "mi segundo post";
        $post->descripcion = "contenidio de mi segundo post";
        $post->fechapublicacion = Carbon::now();
        $post->fechaentrega = Carbon::now();
        $post->category_id=1;
        $post->user_id=2;
        $post->save();
        $post->gruposMateria()->attach(2);

        $post = new Post;
        $post->titulo = "mi tercero post";
        $post->descripcion = "contenidio de mi tercero post";
        $post->fechapublicacion = Carbon::now();
        $post->fechaentrega = Carbon::now();
        $post->category_id=1;
        $post->user_id=2;
        $post->save();
        $post->gruposMateria()->attach(3);

        $post = new Post;
        $post->titulo = "mi cuarto post";
        $post->descripcion = "contenidio de mi cuarto post";
        $post->fechapublicacion = Carbon::now();
        $post->fechaentrega = Carbon::now();
        $post->category_id=2;
        $post->user_id=2;
        $post->save();
        $post->gruposMateria()->attach(4);

        $post = new Post;
        $post->titulo = "mi quinto post";
        $post->descripcion = "contenidio de mi quinto post";
        $post->fechapublicacion = Carbon::now();
        $post->fechaentrega = Carbon::now();
        $post->category_id=2;
        $post->user_id=2;
        $post->save();
        $post->gruposMateria()->attach(5);





        // $tag = new GrupoMateria;
        // $tag->nombre = "tag 1";
        // $tag->save();

        // $tag = new GrupoMateria;
        // $tag->nombre = "tag 2";
        // $tag->save();

        // $tag = new GrupoMateria;
        // $tag->nombre = "tag 3";
        // $tag->save();

        
    }
}

