<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('global.materias.title'); ?></h3>
    
    <?php echo Form::model($materia, ['method' => 'PUT', 'route' => ['admin.materias.update', $materia->id]]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_edit'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('nombremateria', 'Nombre*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('nombremateria', old('nombremateria'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('nombremateria')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('nombremateria')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('codigomateria', 'Codigo Materia*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('codigomateria', old('codigomateria'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('codigomateria')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('codigomateria')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>