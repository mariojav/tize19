<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('global.asignaciones.title'); ?></h3>
    
    <?php echo Form::model($asignacion, ['method' => 'PUT', 'route' => ['admin.asignaciones.update', $asignacion->id]]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_edit'); ?>
        </div>

        <div class="panel-body">
                <div class="row">
                        <div class="col-xs-12 form-group">
                            <?php echo Form::label('user_id', 'Seleccion Materia', ['class' => 'control-label']); ?>

                            <?php echo Form::select('user_id', (new App\User())->pluck('name','id'), old('user_id'), ['class' => 'form-control select2']); ?>

                            <p class="help-block"></p>
                            <?php if($errors->has('user_id')): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('user_id')); ?>

                                </p>
                            <?php endif; ?>
                        </div>
        
                    </div>
        
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <?php echo Form::label('grupomateria_id', 'Seleccione Grupo Materia', ['class' => 'control-label']); ?>

                            <?php echo Form::select('grupomateria_id', (new App\GrupoMateria())->pluck('nombregrupomat','id'), old('grupomateria_id'), ['class' => 'form-control select2']); ?>

                            
                            <p class="help-block"></p>
                            <!-- <?php if($errors->has('grupomateria_id')): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('grupomateria_id')); ?>

                                </p>
                            <?php endif; ?> -->
                        </div>
                    </div>
        
                    <div class="row">
                            <div class="col-xs-12 form-group">
                                <?php echo Form::label('grupolaboratorio_id', 'Seleccione Grupo de Laboratorio', ['class' => 'control-label']); ?>

                                <?php echo Form::select('grupolaboratorio_id', (new App\GrupoLaboratorio())->pluck('nombregrupolab','id'), old('grupolaboratorio_id'), ['class' => 'form-control select2']); ?>

                                
                                <p class="help-block"></p>
                                <!-- <?php if($errors->has('grupolaboratorio_id')): ?>
                                    <p class="help-block">
                                        <?php echo e($errors->first('grupolaboratorio_id')); ?>

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