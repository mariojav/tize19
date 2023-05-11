<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('global.gruposLaboratorio.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.gruposLaboratorio.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_create'); ?>
        </div>
        

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('nombregrupolab', 'Nombre Grupo Laboratorio*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('nombregrupolab', old('nombregrupolab'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('nombregrupolab')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('nombregrupolab')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row">
                

                <div class="col-xs-12 form-group">
                    <?php echo Form::label('materia_id', 'Seleccion Materia', ['class' => 'control-label']); ?>

                    <?php echo Form::select('materia_id', (new App\Materia())->pluck('nombremateria','id'), old('nombremateria'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('materia_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('materia_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('laboratorio_id', 'Seleccione Laboratorio', ['class' => 'control-label']); ?>

                    <?php echo Form::select('laboratorio_id', (new App\Laboratorio())->pluck('nombrelab','id'), old('laboratorio_id'), ['class' => 'form-control select2']); ?>

                    
                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('laboratorio_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('laboratorio_id')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('diagrupo', 'dia grupo', ['class' => 'control-label']); ?>

                    <?php echo Form::select('diagrupo',array('lunes'=>'lunes','martes'=>'martes','miercoles'=>'miercoles','jueves'=>'jueves','viernes'=>'viernes'), old('diagrupo'), ['class' => 'form-control select2']); ?>

                    
                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('diagrupo')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('diagrupo')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('horagrupo', 'hora grupo', ['class' => 'control-label']); ?>

                    <?php echo Form::select('horagrupo',['6:45-8:15'=>'6:45-8:15','8:15-9:45'=>'8:15-9:45','9:45-11:15'=>'9:45-11:15','11:15-12:45'=>'11:15-12:45','12:45-14:15'=>'12:45-14:15','14:15-15:45'=>'14:15-15:45','15:45-17:15'=>'15:45-17:15','17:15-18:45'=>'17:15-18:45','18:45-20:15'=>'18:45-20:15','20:15-21:45'=>'20:15-21:45'], old('horagrupo'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('horagrupo')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('horagrupo')); ?>

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