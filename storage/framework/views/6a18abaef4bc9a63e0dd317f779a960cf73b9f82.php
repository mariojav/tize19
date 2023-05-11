<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('global.laboratorios.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.laboratorios.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_create'); ?>
        </div>
        

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('nombrelab', 'Nombre Laboratorio*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('nombrelab', old('nombrelab'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('nombrelab')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('nombrelab')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('nummaquinas', 'Numero de Maquinas*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('nummaquinas', old('nummaquinas'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('nummaquinas')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('nummaquinas')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>


        
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>