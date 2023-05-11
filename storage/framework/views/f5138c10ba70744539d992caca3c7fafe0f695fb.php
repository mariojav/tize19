<?php $request = app('Illuminate\Http\Request'); ?>


<?php $__env->startSection('content'); ?>
    
    <form class="form-group" action="cargar" method="POST" enctype = "multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="file" name="path" accept=".csv">
        <br>
        <button type="submit">Registrar todos los elementos</button>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>