<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
            <div class="panel-heading"> <h3><?php echo e($usuario->name.' '.$usuario->apellidopaterno.' '.$usuario->apellidomaterno.' '.$usuario->email); ?></h3></div>

                <div class="panel-body">
                    Bienvenido al sistema de gestion de laboratorio
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>