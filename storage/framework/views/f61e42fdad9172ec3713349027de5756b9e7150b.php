<?php $__env->startSection('content'); ?>
<h1 class="page-title"><center>HORARIOS DE LOS LABORATORIOS</h1>


<div class="btn-group" role="group" aria-label="...">
  
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Seleccione una opción
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <?php $__currentLoopData = $laboratorios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laboratorio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href=" <?php echo e(url('/horarios/' . $laboratorio->id)); ?>"><?php echo e($laboratorio->nombrelab); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
        <!-- bloque de php -->
        <?php echo $__env->make('plantillaHorario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>