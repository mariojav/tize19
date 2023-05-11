<?php $__env->startSection('content'); ?>


<h2 class="page-title"><center>Registro de actividades</center></h2>
<?php if(count($nombre) > 0): ?>
  <h4><center><?php echo e($nombre[0]->name ." ". $nombre[0]->apellidopaterno ." ".$nombre[0]->apellidomaterno); ?></center></h4>
<?php else: ?>
  <h4>No se encontro informacion</h4>
<?php endif; ?>
  <form name="formulario" action="/actividades" method = "post">
  <?php echo e(csrf_field()); ?>

      <h4>Selecciona una tarea</h4>
      <!-- <label>Selecciona una tarea</label> -->
      <select name ="tarea_id" value="selecciona una tarea">
        <option value="-1">Selecciona una opcion</option>
        <?php if(count($tareas) > 0): ?>
          <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($tarea->publicacion_id); ?>"><?php echo e($tarea->nombre); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </select>

      <div class="box-body">
      <h3 class="box-title">Faltas</h3>

            <!-- Minimal style -->

            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input name= "copio" type="checkbox" class="minimal" value="Copio">
                Copio
              </label>
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input name = "recibio" type="checkbox" class="minimal" value="Recibio ayuda">
                Recibio ayuda externa
              </label>
            </div>
            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input name="perjudico" type="checkbox" class="minimal" value="Perjudico a sus companieros">
                Perjudico a sus companieros
              </label>
            </div>
            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input name="abandono" type="checkbox" class="minimal" value="Abandono el laboratorio">
                Abandono el laboratorio
              </label>
            </div>
            <!-- checkbox -->
            <div class="form-group">
              <label>
                <input name="saco" type="checkbox" class="minimal" value="saco su portatil">
                Saco su computadora portatil
              </label>
            </div>

            <div class="form-group">
              <label>Descripcion</label>
              <textarea name="descripcion" class="form-control" rows="3" placeholder="Enter ...">Trabajo regular</textarea>
            </div>
            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Salvar</button>
            </div>
            <br>
            

  </form>

        <label for=""></label>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('global.app_list'); ?>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped <?php echo e(count($estudiantes) > 0 ? 'datatable' : ''); ?> dt-select">
                <thead>
                    <tr>

                        <!-- <th style="text-align:center;"><input type="checkbox" id="select-all" /></th> -->
                        
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Actividad</th>
                        <th>Titulo Tarea</th>
                        <th>Observaciones</th>
                        <th>Descripcion</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                
                    <?php if(count($estudiantes) > 0 ): ?>
                        <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($estudiante->actividad_id); ?>">
                                    <!-- <td></td> -->
                                    
                                    <td><?php echo e($estudiante->actividad_id); ?></td>
                                    <td><?php echo e($estudiante->fecha); ?></td>
                                    <td><?php echo e($estudiante->cedula); ?></td>
                                    <td><?php echo e($estudiante->name); ?></td>
                                    <td><?php echo e($estudiante->apellidopaterno); ?></td>
                                    <td><?php echo e($estudiante->apellidomaterno); ?></td>
                                    <td><?php echo e($estudiante->nombre); ?></td>
                                    <td><?php echo e($estudiante->titulotarea); ?></td>
                                    <td><?php echo e($estudiante->observaciones); ?></td>
                                    <td><?php echo e($estudiante->descripcion); ?></td>
                                  
                                    <td></td>
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

  <?php $__env->startSection('javascript'); ?> 
    <script>
        window.route_mass_crud_entries_destroy = '<?php echo e(route('admin.materias.mass_destroy')); ?>';
    </script>
    
  <?php $__env->stopSection(); ?>

  

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>