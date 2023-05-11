<?php $__env->startSection('content'); ?>
    <h3 class="page-title">Grupos de Materia</h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.gruposMateria.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_create'); ?>
        </div>
        

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('nombregrupomat', 'Nombre Grupo Materia*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('nombregrupomat', old('nombregrupomat'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('materia_id', 'Seleccion Materia', ['class' => 'control-label']); ?>

                    <?php echo Form::select('materia_id', (new App\Materia())->pluck('nombremateria','id'), old('nombremateria'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('user_id', 'Seleccione Docente', ['class' => 'control-label']); ?>

                        <?php echo Form::select('user_id',$hola->pluck('$var','$key'), old('user_id'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>


        
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>