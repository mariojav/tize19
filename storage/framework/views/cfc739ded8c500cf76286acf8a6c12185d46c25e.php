<?php if( Session::has('notificacion')): ?>
    <div class="alert alert-warning" role="alert">
    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
        <button type="button" class="close" data-dismiss="alert" data-dismiss="alert">
            &times;
        </button>
        <?php echo e(Session::get('notificacion')); ?>

    </div>
<?php endif; ?>

<?php if( Session::has('contiene')): ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" data-dismiss="alert">
            &times;
        </button>
        <?php echo e(Session::get('contiene')); ?>

    </div>
<?php endif; ?>