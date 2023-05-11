<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('global.gruposMateria.title'); ?></h3>
    <p>
        <a href="<?php echo e(route('admin.gruposMateria.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('global.app_add_new'); ?></a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($gruposMateria) > 0 ? 'datatable' : ''); ?> dt-select">
                <thead>
                
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        
                        <th><?php echo app('translator')->getFromJson('global.gruposMateria.fields.nombregrupomat'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.gruposMateria.fields.materia_id'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.gruposMateria.fields.user_id'); ?></th>
                
                        <th>&nbsp;</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                
                    <?php if(count($gruposMateria) > 0): ?> 
                        <?php $__currentLoopData = $gruposMateria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoMateria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($grupoMateria->id); ?>">
                                <td></td>

                                <td><?php echo e($grupoMateria->nombregrupomat); ?></td>
                                <td><?php echo e($grupoMateria->materia()->pluck('nombremateria')->first()); ?></td>
                                <td><?php echo e($grupoMateria->usuario()->pluck('name')->first()); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.gruposMateria.edit',[$grupoMateria->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('global.app_edit'); ?></a>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.gruposMateria.destroy', $grupoMateria->id])); ?>

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
        window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.gruposMateria.mass_destroy')); ?>';
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>