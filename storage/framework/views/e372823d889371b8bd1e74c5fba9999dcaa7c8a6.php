
<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

  
            
            <div class="user-panel">
                        <?php 
                            use App\User;
                            use Illuminate\Support\Facades\Auth;
                            $userAuth=Auth::user()->id;
                            $usuario=User::find($userAuth)   
                         ?>
                     <?php if($usuario->roles->pluck('name')->first()=='administrador'): ?>
                          <div class="pull-left image">
                            <img src="/adminlte/img/admin.png" class="img-circle" alt="User Image">
                          </div>
                     <?php elseif($usuario->roles->pluck('name')->first()=='docente'): ?>
                          <div class="pull-left image">
                            <img src="/adminlte/img/docente.png" class="img-circle" alt="User Image">
                          </div>
                     <?php elseif($usuario->roles->pluck('name')->first()=='auxiliar'): ?>
                          <div class="pull-left image">
                            <img src="/adminlte/img/auxiliar.png" class="img-circle" alt="User Image">
                          </div>
                     <?php elseif($usuario->roles->pluck('name')->first()=='estudiante'): ?>
                          <div class="pull-left image">
                            <img src="/adminlte/img/estudiante.png" class="img-circle" alt="User Image">
                          </div>
                     <?php else: ?>
                     <div class="pull-left image">
                       <img src="/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                     </div>
                     <?php endif; ?>   

                    <div class="pull-left info">
                        
                        <p><?php echo e($usuario->roles->pluck('name')->first()); ?></p>
                        <p><?php echo e($usuario->name.' '.$usuario->apellidopaterno.' '.$usuario->apellidomaterno); ?></p>
                        <!-- Status -->
                    </div>
                </div>

                <a href="#" class="pull-center"><i class="fa fa-circle text-success "></i> Enlinea</a>

            <?php if(auth()->check() && auth()->user()->hasRole('administrador')): ?>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span class="title"><?php echo app('translator')->getFromJson('global.user-management.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        
                        <li class="<?php echo e($request->segment(2) == 'roles' ? 'active active-sub' : ''); ?>">
                            <a href="<?php echo e(route('admin.roles.index')); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">
                                    <?php echo app('translator')->getFromJson('global.roles.title'); ?>
                                </span>
                            </a>
                        </li>
                        <li class="<?php echo e($request->segment(2) == 'users' ? 'active active-sub' : ''); ?>">
                            <a href="<?php echo e(route('admin.users.index')); ?>">
                                <i class="fa fa-user"></i>
                                <span class="title">
                                    <?php echo app('translator')->getFromJson('global.users.title'); ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                


            
            <li class="<?php echo e($request->segment(1) == 'laboratorios' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.laboratorios.index')); ?>">
                    <i class="fa fa-book"></i>
                    <span class="title">Gestion de Laboratorios</span>
                </a>
            </li>
            

            
            <li class="<?php echo e($request->segment(1) == 'materias' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.materias.index')); ?>">
                    <i class="fa fa-book"></i>
                    <span class="title">Gestion de Materias</span>
                </a>
            </li>
            


            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Gestion de Grupos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="<?php echo e($request->segment(2) == 'gruposLaboratorio' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.gruposLaboratorio.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">Grupos de Laboratorio
                            </span>
                        </a>
                    </li>
                    <li class="<?php echo e($request->segment(2) == 'gruposMateria' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.gruposMateria.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">Grupos de Materia
                            </span>
                        </a>
                    </li>
                
                </ul>
            </li>
            

            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">Inscripciones</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="<?php echo e($request->segment(2) == 'asignaciones' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('admin.asignaciones.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">Estudiantes</span>
                        </a>
                    </li>
                
                </ul>
            </li>
            

            
            <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span class="title">Asignaciones</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        
                        <li class="<?php echo e($request->segment(2) == 'auxasignaciones' ? 'active active-sub' : ''); ?>">
                                <a href="<?php echo e(route('admin.auxasignaciones.index')); ?>">
                                    <i class="fa fa-briefcase"></i>
                                    <span class="title">Auxiliares</span>
                                </a>
                        </li>
                    
                    </ul>
                </li>
                
    

            
            <?php endif; ?> 

            <?php if(auth()->check() && auth()->user()->hasRole('docente')): ?>

            
            <li class="<?php echo e($request->segment(1) == 'materias' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('docmaterias.index')); ?>">
                    <i class="fa fa-book"></i>
                    <span class="title">Mis Materias Docente</span>
                </a>
            </li>
            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('horarios')): ?>
            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('/horario')); ?>">
                        <i class="fa fa-wrench"></i>
                        <span class="title">Horarios</span>
                    </a>
            </li>
            <?php endif; ?>


            <?php endif; ?> 

            <?php if(auth()->check() && auth()->user()->hasRole('auxiliar')): ?>

            
            <li class="<?php echo e($request->segment(1) == 'materias' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('auxmaterias.index')); ?>">
                    <i class="fa fa-book"></i>
                    <span class="title">Mis Materias Auxiliar</span>
                </a>
            </li>
            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('horarios')): ?>
            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('/horario')); ?>">
                        <i class="fa fa-wrench"></i>
                        <span class="title">Horarios</span>
                    </a>
            </li>
            <?php endif; ?>


            <?php endif; ?> 

            <?php if(auth()->check() && auth()->user()->hasRole('estudiante')): ?>

            
            <li class="<?php echo e($request->segment(1) == 'materias' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('estmaterias.index')); ?>">
                    <i class="fa fa-book"></i>
                    <span class="title">Mis Materias Estudiante</span>
                </a>
            </li>
            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('horarios')): ?>
            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('/horario')); ?>">
                        <i class="fa fa-wrench"></i>
                        <span class="title">Horarios</span>
                    </a>
            </li>
            <?php endif; ?>


            <?php endif; ?> 


                
            <li class="<?php echo e($request->segment(1) == 'change_password' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('auth.change_password')); ?>">
                        <i class="fa fa-key"></i>
                        <span class="title">Cambiar Contraseña</span>
                    </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('global.app_logout'); ?></span>
                </a>
            </li>
        </ul>



    </section>
</aside>
<?php echo Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

<button type="submit"><?php echo app('translator')->getFromJson('global.logout'); ?></button>
<?php echo Form::close(); ?>

