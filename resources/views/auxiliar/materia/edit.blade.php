@extends('layouts.app')

@section('content')
    <h3 class="page-title">{{$mat->nombremateria}}</h3>
    
    {{-- {!! Form::model($mat, ['method' => 'PUT', 'route' => ['admin.materias.update', $mat->id]]) !!} --}}

    <div class="panel panel-default">
        <div class="panel-heading">
            informacion
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <p>CODIGO : {{$mat->codigomateria}}</p>
                </div>
            </div>

            <div class="row">
                    <div class="col-xs-12 form-group">
                        <p>DESCRIPCION : {{$mat->descripcionmateria}}</p>
                    </div>
            </div>    
        </div>
    </div>

    <h3 class="page-title">Estudiantes</h3>
    {{-- {{App\User::all() = App\User::all()}} --}}
    
    @can('lista_estudiantes')
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count(App\User::all()) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        
                        <th>@lang('global.users.fields.name')</th>
                        <th>@lang('global.users.fields.apellidopaterno')</th>
                        <th>@lang('global.users.fields.apellidomaterno')</th>
                        <th>@lang('global.users.fields.cedula')</th>
                        <th>@lang('global.users.fields.codigosiss')</th>
                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                
                    @if (count($materia) > 0)
                        @foreach ($materia as $user)
                            {{-- @if($user->roles()->pluck('name')->first() == 'docente') --}}
                            {{-- <tr data-entry-id="{{ $user->id }}"> --}}
                                <td></td>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->apellidopaterno }}</td>
                                <td>{{ $user->apellidomaterno }}</td>
                                <td>{{ $user->cedula }}</td>
                                <td>{{ $user->codigosiss }}</td>
                                {{-- <td>
                                    @foreach ($user->roles()->pluck('name') as $role)
                                        <span class="label label-info label-many">{{ $role }}</span>
                                    @endforeach
                                </td> --}}
                                {{-- @php  $num=$user->id;
                                      $actividadd = DB::table('users')
                                          ->join('tareas','user_id', '=','users.id')
                                          ->join('actividads','tareas_id','=','tareas.id')
                                          ->where('users.id',$num)->get()->pluck('id')
                                          ->first();
                                @endphp --}}
                                <td>
                                    @can('registrar_actividad')<a href="{{url('/actividades/' . $user->id).'/'.$user->id }}" class="btn btn-xs btn-info">Actividad</a>@endcan
                                    {{-- <a href="{{ route('portafolio.edit',[$portafolio->id]) }}" class="btn btn-xs btn-primary">Portafolio</a> --}}
                            
                                </td>

                                <td>

                                @can('registrar_actividad')<a href="{{url('/sesiones/' . $mat->id).'/'.$user->id }}" class="btn btn-xs btn-info">Sesiones</a>@endcan

                                </td>

                            </tr>
                            {{-- @endif --}}
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

