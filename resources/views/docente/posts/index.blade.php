
{{-- @extends('admin.layout') --}}
@extends('layouts.app')

@section('header')


<h1>
  Todas las publicaciones
  <small>Tareas, Practicas y Examenes </small>
</h1>

@stop

@section('content')

    <h3>Gestion de publicacion de Tareas</h3>
    {{-- <h1>{{Auth::user()->get() }}</h1> --}}

    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Crear Tarea</button>

    <div class="box-body panel-body table-responsive">
            <table id="posts-table" class="table table-bordered table-striped table-responsive dataTables_scrollBody">
              <thead>
              <tr>
                <th>ID</th>posts
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha Publicacion</th>
                <th>Fecha Entrega</th>
                <th>Categoria</th>
              </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id}}</td>
                        <td>{{ $post->titulo}}</td>
                        <td>{{ $post->descripcion}}</td>
                        <td>{{ $post->fechapublicacion}}</td>
                        <td>{{ $post->fechaentrega}}</td>
                        <td>{{ $post->category['nombre']}}</td>
                        <td>
                            <a href="{{route('docente.posts.show',$post)}}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-eye"></i></a>
                            <a href="{{route('docente.postss.edit',[$post,$materiaID])}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                            {{-- <a href="{{route('docente.posts.edit',$post)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a> --}}
                            <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
              <tfoot>
              
              </tfoot>
            </table>
          </div>

          @include('docente.posts.create')
@stop


@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="/otro/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

@endpush

@push('scripts')
<!-- DataTables -->
<script src="/otro/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/otro/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
      $('#posts-table').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'scrollX'     : true
      })
    })
</script>

@endpush
