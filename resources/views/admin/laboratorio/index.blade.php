@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')


@section('content')
    <h3 class="page-title">@lang('global.laboratorios.title')</h3>
    <p>
        <a href="{{ route('admin.laboratorios.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    @include('admin.notificaciones.info')

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($laboratorios) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        
                        <th>@lang('global.laboratorios.fields.nombrelab')</th>
                        <th>@lang('global.laboratorios.fields.nummaquinas')</th>
                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                
                    @if (count($laboratorios) > 0)
                        @foreach ($laboratorios as $laboratorio)
                            <tr data-entry-id="{{ $laboratorio->id }}">
                                <td></td>

                                <td>{{ $laboratorio->nombrelab }}</td>
                                <td>{{ $laboratorio->nummaquinas }}</td>
                                
                                <td>
                                    <a href="{{ route('admin.laboratorios.edit',[$laboratorio->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.laboratorios.destroy', $laboratorio->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('admin.laboratorios.mass_destroy') }}';
    </script>
    
@endsection