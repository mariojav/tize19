<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo e($materia->nombremateria); ?></h3>
    
    

    <div class="panel panel-default">
        <div class="panel-heading">
            informacion
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    <p>CODIGO: <?php echo e($materia->codigomateria); ?></p>
                    <p>ID: <?php echo e($materia->id); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gestion_tareas')): ?>
           <a href="<?php echo e(route('docente.postss.index',[$materia->id])); ?>" class="btn btn-primary" role="button">Publicacion de Tareas</a>
        <?php endif; ?>
    </div>

    <h3 class="page-title">Estudiantes de la materia</h3> 

 
      <?php 
// namespace App\Http\Controllers\Admin;
// use App\Http\Controllers\Controller;

// use App\Materia;
// use App\User;
// use App\Asignacion;
// use Illuminate\Support\Facades\Gate;
// use App\Http\Requests\Admin\StoreAsignacionesRequest;
// use App\Http\Requests\Admin\UpdateAsignacionesRequest;
// use Spatie\Permission\Models\Role;
// use DB;
          
        // $users = User::with('roles')->get();
        // $nonmembers = $users->reject(function ($user, $key) {
        //     return !$user->hasRole('estudiante');
        // });

        // $userAuth=Auth::user()->id;

        // $hola= Collect([]);
        // foreach($nonmembers as $nonmember){
        //     $ids=$nonmember->id;
            // foreach(GrupoMateria::all() as $grupomateria){
                // if($grupomateria->materia_id===$materia->id && $grupomateria->user_id===$userAuth && $grupomateria->user_id===$ids){
                    // $complet=Collect([User::find($ids)]);
                    // $hola->push($complet);

                // }
            // }
        // }

        // $lola=DB::table('asignaciones')->join('grupos_materia','asignaciones.grupomateria_id','=','grupos_materia.id')->join('users','asignaciones.user_id','=','users.id')->where('grupos_materia.user_id',2)->where('grupos_materia.materia_id',1)->get();

       ?>
      
      

      
      
    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lista_estudiantes')): ?>
    <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo app('translator')->getFromJson('global.app_list'); ?>
            </div>
    
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped <?php echo e(count($lola) > 0 ? 'datatable' : ''); ?> dt-select">
                    <thead>
                    
                        <tr>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                            
                            <th><?php echo app('translator')->getFromJson('global.users.fields.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('global.users.fields.apellidopaterno'); ?></th>
                            <th><?php echo app('translator')->getFromJson('global.users.fields.apellidomaterno'); ?></th>
                            <th><?php echo app('translator')->getFromJson('global.users.fields.cedula'); ?></th>
                            <th><?php echo app('translator')->getFromJson('global.users.fields.codigosiss'); ?></th>
                            <th>&nbsp;</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                    
                        <?php if(count($lola) > 0): ?>
                            <?php $__currentLoopData = $lola; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr data-entry-id="<?php echo e($user->id); ?>">
                                    <td></td>
    
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->apellidopaterno); ?></td>
                                    <td><?php echo e($user->apellidomaterno); ?></td>
                                    <td><?php echo e($user->cedula); ?></td>
                                    <td><?php echo e($user->codigosiss); ?></td>
                                    
                                    
                                    <td>
                                        <a href="<?php echo e(url('/docente/materia/' . $materia->id.'/'.$user->id)); ?>" class="btn btn-xs btn-info">Actividad</a>
                                        <a href="<?php echo e(url('/estudiante/materia/' . $materia->id).'/'.$user->id); ?>" class="btn btn-xs btn-info">Portafolio</a>
                                        <a href="<?php echo e(url('/docsesiones/'.$materia->id.'/'.$user->id)); ?>" class="btn btn-xs btn-info" role="button">Sesiones</a>
                                        
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
        <?php endif; ?>








    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>