<?php $__env->startSection('content'); ?>
   
    <h3 class="page-title"><?php echo e($materia->nombremateria); ?></h3>
    
    

    <div class="panel panel-default">
        <div class="panel-heading">
            informacion
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <p>CODIGO : <?php echo e($materia->codigomateria); ?></p>
                </div>
            </div>

            <div class="row">
                    <div class="col-xs-12 form-group">
                        <p>DESCRIPCION : <?php echo e($materia->descripcionmateria); ?></p>
                    </div>
            </div>    
        </div>
    </div>

    <h3 class="page-title">Estudiantes</h3>
    
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count(App\User::all()) > 0 ? 'datatable' : ''); ?> dt-select">
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
                        
                    </tr>
                </thead>
                
                <tbody>

                
                    <?php if(count($estudiantes) > 0): ?>
                        <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr data-entry-id="<?php echo e($user->id); ?>">
                                <td></td>

                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->apellidopaterno); ?></td>
                                <td><?php echo e($user->apellidomaterno); ?></td>
                                <td><?php echo e($user->cedula); ?></td>
                                <td><?php echo e($user->codigosiss); ?></td>
                                
                                <?php echo e($num=$user->id); ?>

                                <?php echo e($actividadd = DB::table('users')
                                          ->join('tareas','user_id', '=','users.id')
                                          ->join('actividads','tareas_id','=','tareas.id')
                                          ->where('users.id',$num)->get()->pluck('id')
                                          ->first()); ?>

                                <td>
                                    <!-- <h1>Hola esto es: <?php echo e($materia->id); ?></h1> -->
                                    <!-- <h2>Esto es el id del estudiate <?php echo e($user->id); ?></h2> -->
                                    <!-- <a href="\actividades\31\11" class="btn btn-xs btn-info">Actividad</a>   $materia -->
                                    <a href="<?php echo e(url('/actividades/' . $materia->id).'/'.$user->id); ?>" class="btn btn-xs btn-info">Actividad</a>
                                    
                                </td>

                            </tr>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9"><?php echo app('translator')->getFromJson('global.app_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>