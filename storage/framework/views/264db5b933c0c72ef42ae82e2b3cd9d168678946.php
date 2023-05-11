<?php $__env->startSection('content'); ?>
    <h3 class="page-title">
    <?php if(count($datosMateria)>0 ): ?>
    <?php echo e($datosMateria[0]->nombremateria); ?> 
    <?php endif; ?>
    </h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Informacion:
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php if(count($datosMateria)>0 && count($datosEstudiante)>0): ?>
                        <p><b>ESTUDIANTE:</b> <?php echo e($datosEstudiante[0]->name .' '. $datosEstudiante[0]->apellidopaterno . ' ' . $datosEstudiante[0]->apellidomaterno); ?></p>
                        <p><b>SIS:</b> <?php echo e($datosEstudiante[0]->codigosiss); ?></p>
                    <?php else: ?>
                        <h2>No se encontraron coincidencias</h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <h4>Actividades</h4>
    <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo app('translator')->getFromJson('global.app_list'); ?>
            </div>
    
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped dt-select">
                    <thead>
                    
                        <tr>
                            <!-- <th style="text-align:center;"><input type="checkbox" id="select-all" /></th> -->
                            
                            <th>Nombre de la actividad</th>
                            <th>Observaciones</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>&nbsp;</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                    
                        <?php if(count($actividad) > 0): ?>
                            <?php $__currentLoopData = $actividad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <!-- <td></td> -->
    
                                    <td><?php echo e($act->nombre); ?></td>
                                    <td><?php echo e($act->observaciones); ?></td>
                                    <td><?php echo e($act->descripcion); ?></td>
                                    <td><?php echo e($act->fecha); ?></td>

                                    <td>
                                        <!-- Seccion botones -->
                                    </td>
    
                                </tr>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9"><?php echo app('translator')->getFromJson('global.app_no_entries_in_table'); ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>