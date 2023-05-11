<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Materias</h3>
    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lista_materias')): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_list'); ?>
        </div>
  
        <div class="panel-body table-responsive">
            <table class="table  table-striped <?php echo e(count($materias)  > 0 ? '' : ''); ?> dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all"></th>                        
                        <th><?php echo app('translator')->getFromJson('global.materias.fields.nombremateria'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.materias.fields.codigomateria'); ?></th>
                        <th>Grupo Laboratorio</th>
                        
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
                                    <td><?php echo e($materia->nombregrupolab); ?></td>
                                    
                                    <td> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('portafolio')): ?><a href="<?php echo e(route('auxmaterias.edit',[$materia->id])); ?>" class="btn btn-xs btn-info">Portafolio</a> <?php endif; ?></td>
                                
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

<?php $__env->startSection('javascript'); ?> 
    <script>
        window.route_mass_crud_entries_destroy = '<?php echo e(route('materias.mass_destroy')); ?>';
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>