<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('global.users.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.users.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_create'); ?>
        </div>
        

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('name', 'Nombre*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('name')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('apellidopaterno', 'Apellido Paterno*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('apellidopaterno', old('apellidopaterno'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('apellidopaterno')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('apellidopaterno')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('apellidomaterno', 'Apellido Materno', ['class' => 'control-label']); ?>

                    <?php echo Form::text('apellidomaterno', old('apellidomaterno'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('apellidomaterno')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('apellidomaterno')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('cedula', 'Cedula*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('cedula', old('cedula'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('cedula')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('cedula')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('codigosiss', 'Codigo Siss*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('codigosiss', old('codigosiss'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('codigosiss')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('codigosiss')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('email', 'Correo*', ['class' => 'control-label']); ?>

                    <?php echo Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('email')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('email')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    
                    <?php echo Form::label('password', 'Contraseña*', ['class' => 'control-label']); ?>

                    <div>
                        <li>minimo 6 caracteres en total</li>
                        <li>minimo 4 letras entre (A-Z) o (a-z)</li>
                        <li>minimo 1 numero entre [0-9] </li>
                        <li>minimo 1 caracter especial entre[.!$#O%]</li>
                    </div>
                    <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('password')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('password')); ?>

                        </p>
                    <?php endif; ?> -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('roles', 'Seleccione Rol*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('roles[]', $roles, old('roles'), ['class' => 'form-control select2', 'multiple' => 'multiple']); ?>

                    <p class="help-block"></p>
                    <!-- <?php if($errors->has('roles')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('roles')); ?>

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