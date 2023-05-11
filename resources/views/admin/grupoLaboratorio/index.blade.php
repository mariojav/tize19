@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.gruposLaboratorio.title')</h3>
    <p>
        <a href="{{ route('admin.gruposLaboratorio.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped dataTables_scrollBody {{ count($gruposLaboratorio) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        
                        <th>@lang('global.gruposLaboratorio.fields.nombregrupolab')</th>
                        <th>@lang('global.gruposLaboratorio.fields.materia_id')</th>
                        <th>@lang('global.gruposLaboratorio.fields.laboratorio_id')</th>
                        <th>@lang('global.gruposLaboratorio.fields.diagrupo')</th>
                        <th>@lang('global.gruposLaboratorio.fields.horagrupo')</th>
                
                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                
                    @if (count($gruposLaboratorio) > 0)
                        @foreach ($gruposLaboratorio as $grupoLaboratorio)
                            <tr data-entry-id="{{ $grupoLaboratorio->id }}">
                                <td></td>

                                <td>{{ $grupoLaboratorio->nombregrupolab }}</td>
                                {{-- <td>{{ $grupoLaboratorio->each(function($grupoLaboratorio){ $grupoLaboratorio->materias;}) }}</td> --}}
                                <td>{{ $grupoLaboratorio->materia()->pluck('nombremateria')->first() }}</td>
                                <td>{{ $grupoLaboratorio->laboratorio()->pluck('nombrelab')->first() }}</td>
                                {{-- <td>{{ $grupoLaboratorio->laboratorio_id }}</td> --}}
                                @foreach($dias as $dia)
                            {{-- <h1> {{{$dia['mi']}}}</h1> --}}
                                @endforeach

                                <td>{{ $grupoLaboratorio->diagrupo  }}</td>
                                <td>{{ $grupoLaboratorio->horagrupo }}</td>
                                
                                <td>
                                    <a href="{{ route('admin.gruposLaboratorio.edit',[$grupoLaboratorio->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.gruposLaboratorio.destroy', $grupoLaboratorio->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>

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
        window.route_mass_crud_entries_destroy = '{{ route('admin.gruposLaboratorio.mass_destroy') }}';
    </script>
    
@endsection