@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Materias</h3>
    {{-- <p>
        <a href="{{ route('aux.materias.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p> --}}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>
  
        <div class="panel-body table-responsive">
            <table id="scrol" class="table  table-striped {{ count($materias)  > 0 ? '' : '' }} dt-select">
                <thead>
                    <tr>
                        <!-- <th style="text-align:center;"><input type="checkbox" id="select-all"></th>                         -->
                        <!-- <th>ID</th> -->
                        <th>@lang('global.materias.fields.nombremateria')</th>
                        <th>@lang('global.materias.fields.codigomateria')</th>
                        <th>@lang('global.materias.fields.descripcionmateria')</th>
                        <!-- <th>Grupo</th> -->
                        <th>Portafolio</th>
                        <th>&nbsp;</th> 
                    </tr>
                </thead>
                
                <tbody>
                
                    @if (count($materias) > 0)
                        @foreach ($materias as $materia)
                            <tr data-entry-id="{{ $materia->id }}">
                                <!-- <td></td> -->
                                
                                @if(App\GrupoMateria::all()->pluck('materia_id')->first() == $materia->id) 
                                    <!-- <td>{{ $materia->idMateria}}</td> -->
                                    <td>{{ $materia->nombremateria }}</td>
                                    <td>{{ $materia->codigomateria }}</td>
                                    <td>{{ $materia->descripcionmateria }}</td>
                                    <!-- <td>{{ $materia->grupoMateria }}</td> -->
                                    <td> <a href="{{ route('auxmaterias.edit',[$materia->id]) }}" class="btn btn-xs btn-info">Portafolio</a></td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('materias.mass_destroy') }}';
    </script>
    
@endsection

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
      $('#scrol').DataTable({
        'scrollX'     : true
      })
    })
</script>

@endpush