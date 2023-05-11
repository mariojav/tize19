<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo e($mat->nombremateria); ?></h3>
    
    

    <div class="panel panel-default">
        <div class="panel-heading">
            informacion
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <p>CODIGO : <?php echo e($mat->codigomateria); ?></p>
                </div>
            </div>

            <div class="row">
                    <div class="col-xs-12 form-group">
                        <p>DESCRIPCION : <?php echo e($mat->descripcionmateria); ?></p>
                    </div>
            </div>    
        </div>
    </div>

    <h3 class="page-title">Estudiantes</h3>
    
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lista_estudiantes')): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count(App\User::all()) > 0 ? 'datatable' : ''); ?> dt-select">
                <thead>
                
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        
                        <th><?php echo app('translator')->getFromJson('global.users.fields.name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.users.fields.apellidopaterno'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.users.fields.apellidomaterno'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.users.fields.cedula'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.users.fields.codigosiss'); ?></th>
                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                
                    <?php if(count($materia) > 0): ?>
                        <?php $__currentLoopData = $materia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                                <td></td>

                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->apellidopaterno); ?></td>
                                <td><?php echo e($user->apellidomaterno); ?></td>
                                <td><?php echo e($user->cedula); ?></td>
                                <td><?php echo e($user->codigosiss); ?></td>
                                
                                
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('registrar_actividad')): ?><a href="<?php echo e(url('/actividades/' . $user->id).'/'.$user->id); ?>" class="btn btn-xs btn-info">Actividad</a><?php endif; ?>
                                    
                            
                                </td>

                                <td>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('registrar_actividad')): ?><a href="<?php echo e(url('/sesiones/' . $mat->id).'/'.$user->id); ?>" class="btn btn-xs btn-info">Sesiones</a><?php endif; ?>

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
    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>