{{-- @extends('admin.layout') --}}
@extends('layouts.app')

@section('header')
<h1>
  POSTS
  <small>Crear publicacion</small>
</h1>
@stop

@section('content')
    <div class="row">
        <form method="POST" action="{{route('docente.posts.update',$post)}}">
          {{csrf_field()}} {{method_field('PUT')}}
        
          <div class="col-md-8">
            <div class="box box-primary">      
                <div class="box-body">
                    <div class="form-group {{ $errors->has('titulo')? 'has-error' : 'no hay'}} ">
                        <label>Titulo de la publicacion</label>
                        <input name = "titulo" class="form-control" value="{{old('titulo',$post->titulo)}}" placeholder="ingrresa aqui el titulo de la publicacion">
                        {!!$errors->first('titulo','<span class="help-block">:message</span>')!!}
                    </div>
                      
                     <div class="form-group {{ $errors->has('descripcion')? 'has-error' : 'no hay'}}">
                        <label>contenido de  la publicacion</label>
                        <textarea row="10"name = "descripcion" id="editor" class="form-control"  placeholder="contenido  de la publicacion">{{old('descripcion',$post->descripcion)}}</textarea>
                        {!!$errors->first('descripcion','<span class="help-block">:message</span>')!!}
                      </div>
                </div>
                           
            </div>
          </div>
          <div class="col-md-4">
            <div class="box box-primary">
                
                <div class="box-body">
                    <!-- Date -->
                    
              <div class="form-group">
                    <label>Fecha de publicacion:</label>
    
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="fechapublicacion" type="text" class="form-control pull-right" value="{{old('fechapublicacion', $post->fechapublicacion ? $post->fechapublicacion->format('m/d/Y'): null)}}"id="datepicker1">
                    </div>
                    <!-- /.input group -->
              </div>

              <div class="form-group">
                  <label>Fecha Limite Entrega:</label>
  
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input name="fechaentrega" type="text" class="form-control pull-right" value="{{old('fechaentrega', $post->fechaentrega ? $post->fechaentrega->format('m/d/Y'): null)}}"id="datepicker">
                  </div>
                  <!-- /.input group -->
            </div>

            <div class="form-group {{ $errors->has('category')? 'has-error' : 'no hay'}} ">
              <label >Categoria</label>
              <select name="category"class="form-control">
                <option value="">Selecciona una category</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{ old('category',$post->category_id) == $category->id ? 'selected' : ''}}> {{$category->nombre}} </option>        
                @endforeach
              </select>
              {!!$errors->first('category','<span class="help-block">:message</span>')!!}
            </div>
            
            <div class="form-group {{ $errors->has('category')? 'has-error' : 'no hay'}}">
            <label >Grupos de la materia </label>
              <select name="gruposMateria[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona uno o mas grupos en lo que quiere publicar la tarea"
              style="width: 100%;">
              @foreach ($gruposMateria as $grupoMateria)
              <option {{collect(old('gruposMateria',$post->gruposMateria->pluck('id')))->contains($grupoMateria->id) ? 'selected' : ''}} value="{{ $grupoMateria->id}}">{{$grupoMateria->nombregrupomat}}</option>
              @endforeach
                  
              </select>
              {!!$errors->first('gruposMateria','<span class="help-block">:message</span>')!!}
            </div>

                        <div class="form-group">
                          <div class="dropzone"></div>
                        </div>

                        <div class="div form-group">
                          <button type="submit" class="btn btn-primary btn-block">Guardar publicacion</button>
                        </div>
                </div>
            </div>
        </div>
    </form>


    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                @foreach ($post->photos as $photo)
                  <form method="POST" action="{{ route('docente.photos.destroy',$photo)}}">
                    {{method_field('DELETE')}} {{ csrf_field()}}
                  <div class="col-md-2">
                      <button class="btn btn-danger btn-xs" style="position:absolute"><i class="fa fa-remove"></i></button>
                      <img class="img-responsive" src="{{url($photo->url)}}" alt="">
                  </div>
                </form>
                  
                @endforeach
              </div>
        </div>
      </div>
    </div>
    </div>  

@stop

@push('styles')
 
{{-- dropzone css --}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"> --}}
<link rel="stylesheet" type="text/css" href="/dropzone/dist/min/dropzone.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/otro/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/otro/adminlte/bower_components/select2/dist/css/select2.min.css">

@endpush




@push('scripts')
{{-- dropzone --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> --}}
<script src="/dropzone/dist/min/dropzone.min.js"></script>
<!-- CK Editor -->
<script src="/otro/adminlte/bower_components/ckeditor/ckeditor.js"></script>
<!-- bootstrap datepicker -->
<script src="/otro/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="/otro/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    //Date picker
    $('#datepicker').datepicker({
    autoclose: true
    })
    //Date picker
    $('#datepicker1').datepicker({
    autoclose: true
    })
    $('.select2').select2();
    CKEDITOR.replace('editor')
    CKEDITOR.config.height= 315;


    //creamos una nueva instancia de prpzone para especificar
    var myDropzone=new Dropzone('.dropzone',{
      url:'/docente/posts/{{$post->id}}/photos',
      acceptedFiles:'.pdf,.png',
      maxFilesize: 5,
      paramName:'photo',
      headers:{
        'X-CSRF-TOKEN':'{{csrf_token()}}'
      },
      dictDefaultMessage:'Arrastra las fotos a qui para subirla',
    });
    myDropzone.on('error',function(file, res){
      var msg= res.message;
      $('.dz-error-message:last > span').text(msg);
    });
    Dropzone.autoDiscover = false;
</script>
@endpush



