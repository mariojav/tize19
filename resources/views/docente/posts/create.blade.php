
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          </div class="form-group">
            <input name="materiaID" class="form-control" type="hidden" value="{{$materiaID}}">
          <div>

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  class="btn btn-primary">Crear publicacion</button>
      </div>
    </div>
  </div>
  </form>
</div>


{{-- @extends('admin.layout')

@section('header')
<h1>
        POSTS
        <small>Crear publicacion</small>
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li><a href="{{route('admin.posts.index')}}"><i class="fa fa-list"></i>Posts</a></li>
      <li class="active">Crear</li>
      </ol>
@stop

@section('content')
    <div class="row">

        <form method="POST" action="{{route('admin.posts.store')}}">
          {{csrf_field()}}
        <div class="col-md-8">
                <div class="box box-primary">
                        
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('title')? 'has-error' : 'no hay'}} ">
                                    <label>Titulo de la publicacion</label>
                                    <input name = "title" class="form-control" value="{{old('title')}}" placeholder="ingrresa aqui el titulo de la publicacion">
                                    {!!$errors->first('title','<span class="help-block">:message</span>')!!}
                                </div>
                                

                                <div class="form-group {{ $errors->has('body')? 'has-error' : 'no hay'}}">
                                        <label>contenido de  la publicacion</label>
                                        <textarea row="10"name = "body" id="editor" class="form-control"  placeholder="contenido  de la publicacion">{{old('body')}}</textarea>
                                        {!!$errors->first('body','<span class="help-block">:message</span>')!!}
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
                      <input name="published_at" type="text" class="form-control pull-right" value="{{old('published_at')}}"id="datepicker">
                    </div>
                    <!-- /.input group -->
                  </div>
                      <div class="form-group {{ $errors->has('category')? 'has-error' : 'no hay'}} ">
                        <label >Category</label>
                        <select name="category"class="form-control">
                          <option value="">Selecciona una categoria</option>
                          @foreach ($categories as $category)
                            <option value="{{$category->id}} {{old('category')==$category->id ? 'selected' : ''}} ">{{$category->name}}</option>
                              
                          @endforeach
                        </select>
                        {!!$errors->first('category','<span class="help-block">:message</span>')!!}
                      </div>

                      <div class="form-group {{ $errors->has('category')? 'has-error' : 'no hay'}}">
                      <label >Etiquetas </label>
                        <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una o mas etiquetas"
                        style="width: 100%;">
                        @foreach ($tags as $tag)
                      <option {{collect(old('tags'))->contains($tag->id) ? 'selected' : ''}} value="{{ $tag->id}}">{{$tag->name}}</option>
                        @endforeach
                            
                        </select>
                        {!!$errors->first('tags','<span class="help-block">:message</span>')!!}
                      </div>

                        <div class="form-group {{ $errors->has('excerpt')? 'has-error' : 'no hay'}}">
                                <label>extracto de publicacion</label>
                        <textarea name = "excerpt" class="form-control" placeholder="extracto de la publicacion">{{old('excerpt')}}</textarea>
                                {!!$errors->first('excerpt','<span class="help-block">:message</span>')!!}
                        </div>

                        <div class="div form-group">
                          <button type="submit" class="btn btn-primary btn-block">Guardar publicacion</button>
                        </div>
                </div>
            </div>
        </div>
    </form>
    </div>  

@stop

@push('styles')

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">

@endpush

@push('scripts')
<!-- CK Editor -->
<script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
<!-- bootstrap datepicker -->
<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    //Date picker
    $('#datepicker').datepicker({
    autoclose: true
    })
    $('.select2').select2();
    CKEDITOR.replace('editor')
</script>
@endpush


 --}}
