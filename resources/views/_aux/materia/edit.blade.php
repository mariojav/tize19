@extends('layouts.app')

@section('content')
   
    <h3 class="page-title">{{$materia->nombremateria}}</h3>
    
    {{-- {!! Form::model($materia, ['method' => 'PUT', 'route' => ['admin.materias.update', $materia->id]]) !!} --}}

    <div class="panel panel-default">
        <div class="panel-heading">
            Informacion
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <p>CODIGO : {{$materia->codigomateria}}</p>
                </div>
            </div>

            <div class="row">
                    <div class="col-xs-12 form-group">
                        <p>DESCRIPCION : {{$materia->descripcionmateria}}</p>
                    </div>
            </div>    
        </div>
    </div>

    <h3 class="page-title">Estudiantes</h3>
    {{-- {{App\User::all() = App\User::all()}} --}}
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count(App\User::all()) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                    <!-- ojo revisar plantil -->
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Cedula de Identidad</th>
                        <th>Codigo SIS</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                
                <tbody>

                
                    @if (count($estudiantes) > 0)
                        @foreach ($estudiantes as $user)
                            
                            <tr data-entry-id="{{ $user->id }}">
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
                                {{$num=$user->id}}
                                {{ $actividadd = DB::table('users')
                                          ->join('tareas','user_id', '=','users.id')
                                          ->join('actividads','tareas_id','=','tareas.id')
                                          ->where('users.id',$num)->get()->pluck('id')
                                          ->first()
                                }}
                                <td>
                                    <!-- <h1>Hola esto es: {{$materia->id}}</h1> -->
                                    <!-- <h2>Esto es el id del estudiate {{ $user->id }}</h2> -->
                                    <!-- <a href="\actividades\31\11" class="btn btn-xs btn-info">Actividad</a>   $materia -->
                                    <a href="{{url('/actividades/' . $materia->id).'/'.$user->id }}" class="btn btn-xs btn-info">Actividad</a>
                                    
                                    {{-- <a href="{{ route('portafolio.index',[$portafolio->id]) }}" class="btn btn-xs btn-primary">Portafolio</a> --}}
                                    <!-- Ver las sesiones del estudiante -->

                                <th>&nbsp;</th>
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


