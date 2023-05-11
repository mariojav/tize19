<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Asignar auxiliar a grupos de Laboratorio</h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.auxasignaciones.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_create'); ?>
        </div>
        

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('user_id', 'Seleccione Auxiliar ', ['class' => 'control-label']); ?>

                    <?php echo Form::select('user_id', $hola->pluck('$var','$key'), old('user_id'), ['class' => 'form-control select2']); ?>

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
                        <?php echo Form::label('grupolaboratorio_id', 'Seleccione Grupo de laboratorio', ['class' => 'control-label']); ?>

                        <?php echo Form::select('grupolaboratorio_id',$grupoLabMateria->pluck('$var','$key'), old('grupolaboratorio_id'), ['class' => 'form-control select2']); ?>

                        
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

    <?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>


        
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>