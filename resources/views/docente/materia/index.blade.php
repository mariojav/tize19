@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Materias</h3>
    {{-- <p>
        <a href="{{ route('aux.materias.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p> --}}

    @can('lista_materias')
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>
  
        <div class="panel-body table-responsive">
            <table id="scrol" class="table  table-striped {{ count($materias) > 0 ? '' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all"></th>                        
                        <th>@lang('global.materias.fields.nombremateria')</th>
                        <th>@lang('global.materias.fields.codigomateria')</th>
                        <th>Grupos</th>
                        <th>&nbsp;</th> 
                    </tr>
                </thead>
                
                <tbody>
                
                    @if (count($materias) > 0)
                        @foreach ($materias as $materia)
                            <tr data-entry-id="{{ $materia->id }}">
                                <td></td>
                                
                                {{-- @if(App\GrupoMateria::all()->pluck('materia_id')->first() == $materia->id)  --}}
                                    <td>{{ $materia->nombremateria }}</td>
                                    <td>{{ $materia->codigomateria }}</td>
                                    <?php $lola=DB::table('grupos_materia')->select('user_id','materia_id','nombregrupomat')->where('user_id',$materia->user_id)->where('materia_id',$materia->id)->get()?>
                                    <td>            
                                        @foreach ($lola as $grupis)
                                            <span class="label label-info label-many">{{ $grupis->nombregrupomat}}</span>
                                        @endforeach
                                    </td>
                                      
                                    <td> @can('portafolio')<a href="{{route('docmaterias.edit',[$materia->id]) }}" class="btn btn-xs btn-info">Portafolio</a>@endcan</td>
                                    
                                {{-- @endif --}}

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
    @endcan


@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('materias.mass_destroy') }}';
    </script>
    
@endsection

@push('scripts')
<!-- DataTables -->
<script>
    $(function () {
      $('#scrol').DataTable({
        'scrollX'     : true
      })
    })
</script>

@endpush