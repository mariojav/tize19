<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Inscripcion de Estudiantes</h3>
    <p>
        <a href="<?php echo e(route('admin.asignaciones.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('global.app_add_new'); ?></a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($asignaciones) > 0 ? 'datatable' : ''); ?> dt-select">
                <thead>
                
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        
                        <th><?php echo app('translator')->getFromJson('global.asignaciones.fields.user_id'); ?></th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Cedula</th>
                        <th>Materia</th>
                        <th><?php echo app('translator')->getFromJson('global.asignaciones.fields.grupomateria_id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.asignaciones.fields.grupolaboratorio_id'); ?></th>
                
                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                
                    <?php if(count($asignaciones) > 0): ?>
                        <?php $__currentLoopData = $asignaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($asignacion->grupoMateria()->pluck('nombregrupomat')->first()!=null): ?>
                            <tr data-entry-id="<?php echo e($asignacion->id); ?>">
                                <td></td>

                                
                                
                                <td><?php echo e($asignacion->user()->pluck('name')->first()); ?></td>
                                <td><?php echo e($asignacion->user()->pluck('apellidopaterno')->first()); ?></td>
                                <td><?php echo e($asignacion->user()->pluck('apellidomaterno')->first()); ?></td>
                                <td><?php echo e($asignacion->user()->pluck('cedula')->first()); ?></td>

                                <?php  $materia_id = $asignacion->grupoLaboratorio()->pluck('materia_id')->first();
                                    $materia=App\Materia::find($materia_id)->nombremateria;
                                 ?>
                                <td><?php echo e($materia); ?></td>

                                    
                                <td><?php echo e($asignacion->grupoMateria()->pluck('nombregrupomat')->first()); ?></td>
                                
                                <td><?php echo e($asignacion->grupoLaboratorio()->pluck('nombregrupolab')->first()); ?></td>
                                
                                
                                
                                <td>
                                    <a href="<?php echo e(route('admin.asignaciones.edit',[$asignacion->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('global.app_edit'); ?></a>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.asignaciones.destroy', $asignacion->id])); ?>

                                    <?php echo Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                                
                            </tr>
                            <?php endif; ?>
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

<?php $__env->startSection('javascript'); ?> 
    <script>
        window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.asignaciones.mass_destroy')); ?>';
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>