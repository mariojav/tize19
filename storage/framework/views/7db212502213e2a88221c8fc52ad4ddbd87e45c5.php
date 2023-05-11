<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('global.materias.title'); ?></h3>
    <p>
        <a href="<?php echo e(route('admin.materias.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('global.app_add_new'); ?></a>
    </p>

    <?php echo $__env->make('admin.notificaciones.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($materias) > 0 ? 'datatable' : ''); ?> dt-select">
                <thead>
                
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        
                        <th><?php echo app('translator')->getFromJson('global.materias.fields.nombremateria'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.materias.fields.codigomateria'); ?></th>
                
                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                
                    <?php if(count($materias) > 0): ?>
                        <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($materia->id); ?>">
                                <td></td>

                                <td><?php echo e($materia->nombremateria); ?></td>
                                <td><?php echo e($materia->codigomateria); ?></td>
                                
                                <td>
                                    <a href="<?php echo e(route('admin.materias.edit',[$materia->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('global.app_edit'); ?></a>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.materias.destroy', $materia->id])); ?>

                                    <?php echo Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    
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

<?php $__env->startSection('javascript'); ?> 
    <script>
        window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.materias.mass_destroy')); ?>';
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>