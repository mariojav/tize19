@extends('layouts.app')

@section('content')
    <h3 class="page-title">{{$materia->nombremateria}}</h3>
    
    {{-- {!! Form::model($materia, ['method' => 'PUT', 'route' => ['admin.materias.update', $materia->id]]) !!} --}}

    <div class="panel panel-default">
        <div class="panel-heading">
            informacion
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <p>CODIGO: {{$materia->codigomateria}}</p>
                    <p>ID: {{$materia->id}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">

        {{-- <a href="{{route('docmaterias.edit',[$materia->id]) }}" class="btn btn-primary" role="button">Estudiantes</a> --}}
        @can('gestion_tareas')
           <a href="{{route('docente.postss.index',[$materia->id])}}" class="btn btn-primary" role="button">Publicacion de Tareas</a>
        @endcan
    </div>

    <h3 class="page-title">Estudiantes de la materia</h3> 

 
      @php
// namespace App\Http\Controllers\Admin;
// use App\Http\Controllers\Controller;

// use App\Materia;
// use App\User;
// use App\Asignacion;
// use Illuminate\Support\Facades\Gate;
// use App\Http\Requests\Admin\StoreAsignacionesRequest;
// use App\Http\Requests\Admin\UpdateAsignacionesRequest;
// use Spatie\Permission\Models\Role;
// use DB;
          
        // $users = User::with('roles')->get();
        // $nonmembers = $users->reject(function ($user, $key) {
        //     return !$user->hasRole('estudiante');
        // });

        // $userAuth=Auth::user()->id;

        // $hola= Collect([]);
        // foreach($nonmembers as $nonmember){
        //     $ids=$nonmember->id;
            // foreach(GrupoMateria::all() as $grupomateria){
                // if($grupomateria->materia_id===$materia->id && $grupomateria->user_id===$userAuth && $grupomateria->user_id===$ids){
                    // $complet=Collect([User::find($ids)]);
                    // $hola->push($complet);

                // }
            // }
        // }

        // $lola=DB::table('asignaciones')->join('grupos_materia','asignaciones.grupomateria_id','=','grupos_materia.id')->join('users','asignaciones.user_id','=','users.id')->where('grupos_materia.user_id',2)->where('grupos_materia.materia_id',1)->get();

      @endphp
      
      {{-- {{$hola}} --}}

      {{-- @if (User::where('email', '=', Input::get('email'))->exists()) --}}
      {{-- @if (GrupoMateria::where('materia_id','=', )->exists() && ) --}}
    

    @can('lista_estudiantes')
    <div class="panel panel-default">
            <div class="panel-heading">
                @lang('global.app_list')
            </div>
    
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped {{ count($lola) > 0 ? 'datatable' : '' }} dt-select">
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
                    
                        @if (count($lola) > 0)
                            @foreach ($lola as $user)
                                {{-- @if($user->roles()->pluck('name')->first() == 'docente') --}}
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
                                    {{-- {{$num=$user->id}}
                                    {{ $actividadd = DB::table('users')
                                              ->join('tareas','user_id', '=','users.id')
                                              ->join('actividads','tareas_id','=','tareas.id')
                                              ->where('users.id',$num)->get()->pluck('id')
                                              ->first()
                                    }} --}}
                                    <td>
                                        <a href="{{url('/docente/materia/' . $materia->id.'/'.$user->id) }}" class="btn btn-xs btn-info">Actividad</a>
                                        <a href="{{url('/estudiante/materia/' . $materia->id).'/'.$user->id }}" class="btn btn-xs btn-info">Portafolio</a>
                                        <a href="{{url('/docsesiones/'.$materia->id.'/'.$user->id)}}" class="btn btn-xs btn-info" role="button">Sesiones</a>
                                        {{-- <a href="{{ route('portafolio.edit',[$portafolio->id]) }}" class="btn btn-xs btn-primary">Portafolio</a> --}}
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

