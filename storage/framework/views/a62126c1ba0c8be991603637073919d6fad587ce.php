<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    <center><h3 class="page-title">Lista de Sesiones</h3></center>
     <br><br>
    
    <p>
    <a href="<?php echo e(url('/crearsesion/'.$materia_id.'/'.$user_id)); ?>" class="btn btn-success">Nueva asistencia</a>    
    </p>



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
            <?php echo app('translator')->getFromJson('global.app_list'); ?>
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
                        <th></th>
                        <th>&nbsp;</th> 
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
                                        
                                
                                        <td> <a href="<?php echo e(url('/sesioneseliminar/'.$sesion->id)); ?>" onclick="return confirm('Se eliminara el elemento de la base de datos \nEstas seguro de continuaar?')" class="btn btn-xs btn-warning">Eliminar</a></td>
                                
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
    <a href="<?php echo e(url('/auxmaterias/'.$materia_id.'/edit')); ?>" class="btn btn-default">volver</a>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('styles'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="/otro/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- DataTables -->
<script src="/otro/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/otro/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
      $('#scrol').DataTable({
        'scrollX'     : true
      })
    })
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>