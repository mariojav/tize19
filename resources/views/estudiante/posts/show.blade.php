@extends('layouts.app')
@section('content')


<div class="panel panel-info">
      <div class="panel-heading">Tarea</div>

      <div class="panel-body">

<article class="post container">
    <div class="content-post">
        <header class="container-flex space-between">
          <div class="date">
          <span class="c-gris">{{$post->fechapublicacion->format('M d')}}</span>
          </div>
          <div class="post-category">
          <span class="category">{{$post->category->nombre}}</span>
          </div>
        </header>
        <h1>{{$post->titulo}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
          {!! $post->descripcion !!}
        </div>
    </div>

    @if($post->photos->count()===1)
				<figure><img src="{{url($post->photos->first()->url)}}" alt="" class="img-responsive" alt=""></figure>
				{{-- <figure><img src="{{$post->photos->first()->url}}" alt="" class="img-responsive" alt=""></figure> --}}
			@elseif($post->photos->count()>1)
			<div class="gallery-photos" data-masonry='{"itemSelector":".grid-item","columnWidth":464}'>
					@foreach($post->photos as $photo)
					    <figure class="grid-item grid-item--height2">
                  @php
                    $archivo= $photo->url;
                    $partes = explode(".", $archivo); 
                    $extension = end($partes);
                  @endphp    
                  @if($extension==="pdf")
                  <a download href="{{url($photo->url)}}"><img src="/images/pdf.png" class="img-responsive" alt=""></a>
                  @endif

                  @if($extension==="zip")
						        <img src="{{url($photo->url)}}" class="img-responsive" alt=""></figure>
                  @endif
  
                  @if($extension==="png")
						        <img src="{{url($photo->url)}}" class="img-responsive" alt=""></figure>
                  @endif
              </figure>              
					@endforeach
				</div>
      @endif

      @php
          $iduser=Illuminate\Support\Facades\Auth::user()->id;
          $postID=$post->id; 
          $lola=DB::table('tareas')->where('post_id',$postID)->where('user_id',$iduser)->get();
      @endphp
      <div>
        <div class="box">
          <div class="box-header with-border">
              <h5 class="box-title">1</h5>  
          </div>
          <div class="box-body">

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Archivo</th>
                </tr>
              </thead>

              <tbody>
                @foreach($lola as $tareitas)
                <tr>
                <th scope="row">{{$tareitas->id}}</th>
                <td>{{$tareitas->fecha_entrega}}</td>
                <td>{{$tareitas->titulotarea}}</td>
                <td>{{$tareitas->desctarea}}</td>
                @if(App\Tarea::find($tareitas->id)->files()->pluck('url')->first()!=null)
                <td><a download href="{{url(App\Tarea::find($tareitas->id)->files()->pluck('url')->first())}}"><img src="/images/pdf.png" class="img-responsive" alt=""></a></td>
                @else
                <td>none</td>
                @endif
                
              </tr>
                @endforeach
              
              </tbody>
            </table>

          </div>
        </div>
      </div>


      
        <p>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Presentar Mi Tarea
          </button>
        </p>

        <div class="collapse" id="collapseExample">
          <div class="card card-body">
              <form method="POST" action="{{route('estudiante.tareas.store')}}">
                  {{csrf_field()}}
                
                  <div class="form-group">
                      <label for="">ID post</label>
                      <input type="text" class="form-control" name = "idpost" value="{{$post->id}}">
                  </div>
                  <div class="form-group">
                  <label for="">Titulo</label>
                  <input type="text" class="form-control" name = "titulotarea" placeholder="Titulo tarea">
                </div>
  
                <div class="form-group">
                    <label>Descripcion</label>
                    <textarea row="10"name = "desctarea" id="editor" class="form-control"  placeholder="contenido  de la publicacion"></textarea>
                </div>
  
                  {{-- <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                      Gargar archivo
                    </button>
                  </p>

                  <div class="collapse" id="collapseExample1">
                      <div class="card card-body">
                          Aqui se carga archivo
                          <div class="form-group">
                              <div class="dropzone"></div>
                          </div>
                      </div>
                  </div> --}}

                  <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Aceptar</button>
                    </div>
                  </div>
              </form>            
          </div>
        </div>



  </article>

      </div>
</div>

  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('docente.posts.store')}}">
        {{csrf_field()}}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Titulo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group {{ $errors->has('titulo')? 'has-error' : 'no hay'}} ">
                {{-- <label>Titulo de la publicacion</label> --}}
                <input name = "titulo" class="form-control" value="{{old('titulo')}}" placeholder="ingrresa aqui el titulo de la publicacion" required
                {!!$errors->first('titulo','<span class="help-block">:message</span>')!!}>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  class="btn btn-primary">Crear publicacion</button>
        </div>
      </div>
    </div>
    </form>
  </div

@endsection

@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush

{{-- @push('styles') --}}
 
{{-- dropzone css --}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"> --}}
{{-- <link rel="stylesheet" type="text/css" href="/dropzone/dist/min/dropzone.min.css"> --}}
  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="/otro/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> --}}
    <!-- Select2 -->
    {{-- <link rel="stylesheet" href="/otro/adminlte/bower_components/select2/dist/css/select2.min.css"> --}}

{{-- @endpush --}}




{{-- @push('scripts') --}}
{{-- dropzone --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> --}}
{{-- <script src="/dropzone/dist/min/dropzone.min.js"></script> --}}
<!-- CK Editor -->
{{-- <script src="/otro/adminlte/bower_components/ckeditor/ckeditor.js"></script> --}}
<!-- bootstrap datepicker -->
{{-- <script src="/otro/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> --}}
<!-- Select2 -->
{{-- <script src="/otro/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script> --}}
<script>
    //creamos una nueva instancia de prpzone para especificar
//     var myDropzone=new Dropzone('.dropzone',{
//       url:'/docente/posts/{{$post->id}}/photos',
//       acceptedFiles:'.pdf,.png',
//       maxFilesize: 5,
//       paramName:'photo',
//       headers:{
//         'X-CSRF-TOKEN':'{{csrf_token()}}'
//       },
//       dictDefaultMessage:'Arrastra los archivos imagen y pdf aqui para subirla',
//     });
//     myDropzone.on('error',function(file, res){
//       var msg= res.message;
//       $('.dz-error-message:last > span').text(msg);
//     });
//     Dropzone.autoDiscover = false;
// </script>
{{-- // @endpush --}}