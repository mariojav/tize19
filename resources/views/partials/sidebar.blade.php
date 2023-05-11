
@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
{{-- 
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li> --}}
  
            {{-- ROL ADMINISTRADOR --}}
            <div class="user-panel">
                        @php
                            use App\User;
                            use Illuminate\Support\Facades\Auth;
                            $userAuth=Auth::user()->id;
                            $usuario=User::find($userAuth)   
                        @endphp
                     @if($usuario->roles->pluck('name')->first()=='administrador')
                          <div class="pull-left image">
                            <img src="/adminlte/img/admin.png" class="img-circle" alt="User Image">
                          </div>
                     @elseif($usuario->roles->pluck('name')->first()=='docente')
                          <div class="pull-left image">
                            <img src="/adminlte/img/docente.png" class="img-circle" alt="User Image">
                          </div>
                     @elseif($usuario->roles->pluck('name')->first()=='auxiliar')
                          <div class="pull-left image">
                            <img src="/adminlte/img/auxiliar.png" class="img-circle" alt="User Image">
                          </div>
                     @elseif($usuario->roles->pluck('name')->first()=='estudiante')
                          <div class="pull-left image">
                            <img src="/adminlte/img/estudiante.png" class="img-circle" alt="User Image">
                          </div>
                     @else()
                     <div class="pull-left image">
                       <img src="/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                     </div>
                     @endif   

                    <div class="pull-left info">
                        
                        <p>{{$usuario->roles->pluck('name')->first()}}</p>
                        <p>{{$usuario->name.' '.$usuario->apellidopaterno.' '.$usuario->apellidomaterno}}</p>
                        <!-- Status -->
                    </div>
                </div>

                <a href="#" class="pull-center"><i class="fa fa-circle text-success "></i> Enlinea</a>

            @role('administrador')
                {{-- @can('gestion_usuarios') --}}
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span class="title">@lang('global.user-management.title')</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        {{-- <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.permissions.index') }}">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">
                                    @lang('global.permissions.title')
                                </span>
                            </a>
                        </li> --}}
                        <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.roles.index') }}">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">
                                    @lang('global.roles.title')
                                </span>
                            </a>
                        </li>
                        <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                            <a href="{{ route('admin.users.index') }}">
                                <i class="fa fa-user"></i>
                                <span class="title">
                                    @lang('global.users.title')
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- @endcan --}}


            {{-- Gestor de laboratoios --}}
            <li class="{{ $request->segment(1) == 'laboratorios' ? 'active' : '' }}">
                <a href="{{ route('admin.laboratorios.index') }}">
                    <i class="fa fa-book"></i>
                    <span class="title">Gestion de Laboratorios</span>
                </a>
            </li>
            {{-- FinGestor de laboratoios --}}

            {{-- Gestor de materias para adminstrador --}}
            <li class="{{ $request->segment(1) == 'materias' ? 'active' : '' }}">
                <a href="{{ route('admin.materias.index') }}">
                    <i class="fa fa-book"></i>
                    <span class="title">Gestion de Materias</span>
                </a>
            </li>
            {{-- Fin gestor de materias para administrador  --}}


            {{-- gestor de grupos --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Gestion de Grupos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ $request->segment(2) == 'gruposLaboratorio' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.gruposLaboratorio.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">Grupos de Laboratorio
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'gruposMateria' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.gruposMateria.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">Grupos de Materia
                            </span>
                        </a>
                    </li>
                
                </ul>
            </li>
            {{-- fin gestor de grupos --}}

            {{-- Gestion de inscripciones --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Inscripciones</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ $request->segment(2) == 'asignaciones' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.asignaciones.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">Estudiantes</span>
                        </a>
                    </li>
                
                </ul>
            </li>
            {{-- fin gestion de inscripciones --}}

            {{-- Gestion de asignaciones --}}
            <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span class="title">Asignaciones</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        
                        <li class="{{ $request->segment(2) == 'auxasignaciones' ? 'active active-sub' : '' }}">
                                <a href="{{ route('admin.auxasignaciones.index') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span class="title">Auxiliares</span>
                                </a>
                        </li>
                    
                    </ul>
                </li>
                {{-- fin gestion de asignaciones --}}
    

            
            @endrole {{-- Fin rol  administrador --}}

            @role('docente')

            {{-- Gestor de materias para docente --}}
            <li class="{{ $request->segment(1) == 'materias' ? 'active' : '' }}">
                <a href="{{ route('docmaterias.index') }}">
                    <i class="fa fa-book"></i>
                    <span class="title">Mis Materias Docente</span>
                </a>
            </li>
            {{-- Fin gestor de materias para docente  --}}

            @can('horarios')
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                    <a href="{{ url('/horario') }}">
                        <i class="fa fa-wrench"></i>
                        <span class="title">Horarios</span>
                    </a>
            </li>
            @endcan


            @endrole {{-- Fin rol  docente --}}

            @role('auxiliar')

            {{-- Gestor de materias para docente --}}
            <li class="{{ $request->segment(1) == 'materias' ? 'active' : '' }}">
                <a href="{{ route('auxmaterias.index') }}">
                    <i class="fa fa-book"></i>
                    <span class="title">Mis Materias Auxiliar</span>
                </a>
            </li>
            {{-- Fin gestor de materias para docente  --}}

            @can('horarios')
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                    <a href="{{ url('/horario') }}">
                        <i class="fa fa-wrench"></i>
                        <span class="title">Horarios</span>
                    </a>
            </li>
            @endcan


            @endrole {{-- Fin rol  docente --}}

            @role('estudiante')

            {{-- Gestor de materias para docente --}}
            <li class="{{ $request->segment(1) == 'materias' ? 'active' : '' }}">
                <a href="{{ route('estmaterias.index') }}">
                    <i class="fa fa-book"></i>
                    <span class="title">Mis Materias Estudiante</span>
                </a>
            </li>
            {{-- Fin gestor de materias para docente  --}}

            @can('horarios')
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                    <a href="{{ url('/horario') }}">
                        <i class="fa fa-wrench"></i>
                        <span class="title">Horarios</span>
                    </a>
            </li>
            @endcan


            @endrole {{-- Fin rol  docente --}}


                
            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                    <a href="{{ route('auth.change_password') }}">
                        <i class="fa fa-key"></i>
                        <span class="title">Cambiar Contraseña</span>
                    </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>



    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}
