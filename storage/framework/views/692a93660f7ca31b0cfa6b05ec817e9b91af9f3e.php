<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Materias</h3>
    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lista_materias')): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_list'); ?>
        </div>
  
        <div class="panel-body table-responsive">
            <table id="scrol" class="table  table-striped <?php echo e(count($materias) > 0 ? '' : ''); ?> dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all"></th>                        
                        <th><?php echo app('translator')->getFromJson('global.materias.fields.nombremateria'); ?></th>
                        <th><?php echo app('translator')->getFromJson('global.materias.fields.codigomateria'); ?></th>
                        <th>Grupos</th>
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
                                    <?php $lola=DB::table('grupos_materia')->select('user_id','materia_id','nombregrupomat')->where('user_id',$materia->user_id)->where('materia_id',$materia->id)->get()?>
                                    <td>            
                                        <?php $__currentLoopData = $lola; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="label label-info label-many"><?php echo e($grupis->nombregrupomat); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                      
                                    <td> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('portafolio')): ?><a href="<?php echo e(route('docmaterias.edit',[$materia->id])); ?>" class="btn btn-xs btn-info">Portafolio</a><?php endif; ?></td>
                                    
                                

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

<?php $__env->startPush('scripts'); ?>
<!-- DataTables -->
<script>
    $(function () {
      $('#scrol').DataTable({
        'scrollX'     : true
      })
    })
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>