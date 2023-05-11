<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    
    <h2><center>Lista de sesiones</center></h2>

    <?php if(count($sesiones)>0): ?>
    
        <div class="panel panel-default">
            <div class="panel-heading">
                informacion
            </div>

            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <p>MATERIA: <?php echo e($sesiones[0]->nombremateria); ?></p>
                        <p>ESTUDIANTE: <?php echo e($sesiones[0]->apellidopaterno); ?> <?php echo e($sesiones[0]->apellidomaterno); ?> <?php echo e($sesiones[0]->name); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
    <div class="panel panel-default">
            <div class="panel-heading">
                informacion
            </div>

            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <p>NOTA: No se encontraron registros de sesiones para el usuario solicitado</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <div class="panel panel-default">
        <div class="panel-heading">
        <?php if(count($sesiones)>0): ?>
            Lista de sesiones de <?php echo e($sesiones[0]->name); ?>

            <?php else: ?>
            Lista vacia
        <?php endif; ?>
        </div>
        
        
        <div class="panel-body table-responsive">
            <table id="scrol" class="table  table-striped <?php echo e(count($sesiones)  > 0 ? '' : ''); ?> dt-select">
                <thead>
                    <tr>
                        
                        <!-- <th>ID</th> -->
                        <th>ID</th>
                        <th>Asistencia</th>
                        <th>Numero de maquina</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                       
                        
                    </tr>
                </thead>
                
                <tbody>
                
                    <?php if(count($sesiones) > 0): ?>
                            <?php $__currentLoopData = $sesiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sesion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-entry-id="<?php echo e($sesion->id); ?>">
                                    <!-- <td></td> -->
                                    
                                        
                                        <td><?php echo e($sesion->id); ?></td>
                                        <td><?php echo e($sesion->asistencia); ?></td>
                                        <td><?php echo e($sesion->maquina); ?></td>
                                        <td><?php echo e($sesion->descripcion); ?></td>
                                        <td><?php echo e($sesion->updated_at); ?></td>
                                
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