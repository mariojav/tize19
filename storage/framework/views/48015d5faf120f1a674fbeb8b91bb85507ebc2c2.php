<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Cambiar Contraseña</h3>

    <?php if(session('success')): ?>
        <!-- If password successfully show message -->
        <div class="row">
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        </div>
    <?php else: ?>
        <?php echo Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]); ?>

        <!-- If no success message in flash session show change password form  -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo app('translator')->getFromJson('global.app_edit'); ?>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <?php echo Form::label('current_password', 'Contraseña Actual', ['class' => 'control-label']); ?>

                        <?php echo Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']); ?>

                        <p class="help-block"></p>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <?php echo Form::label('new_password', 'Nueva Contraseña', ['class' => 'control-label']); ?>

                        <?php echo Form::password('new_password', ['class' => 'form-control', 'placeholder' => '']); ?>

                        <p class="help-block"></p>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <?php echo Form::label('new_password_confirmation', 'Confirmacion de nueva contraseña', ['class' => 'control-label']); ?>

                        <?php echo Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']); ?>

                        <p class="help-block"></p>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']); ?>

        <?php echo Form::close(); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>