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