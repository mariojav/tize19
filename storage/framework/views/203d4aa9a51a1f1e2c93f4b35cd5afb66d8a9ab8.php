<?php $__env->startSection('header'); ?>


<h1>
  Todas las publicaciones
  <small>Tareas, Practicas y Examenes </small>
</h1>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <h1>Dashboard</h1>
    

    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Crear publicacion</button>

    <div class="box-body panel-body table-responsive">
            <table id="posts-table" class="table table-bordered table-striped table-responsive dataTables_scrollBody">
              <thead>
              <tr>
                <th>ID</th>posts
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha Publicacion</th>
                <th>Fecha Entrega</th>
                <th>Categoria</th>
              </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($post->id); ?></td>
                        <td><?php echo e($post->titulo); ?></td>
                        <td><?php echo e($post->descripcion); ?></td>
                        <td><?php echo e($post->fechapublicacion); ?></td>
                        <td><?php echo e($post->fechaentrega); ?></td>
                        <td><?php echo e($post->category['nombre']); ?></td>
                        <td>
                            <a href="<?php echo e(route('estudiante.posts.show',$post)); ?>" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-eye"></i></a>
                            <a href="<?php echo e(route('docente.posts.edit',$post)); ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
              
              </tfoot>
            </table>
          </div>

          <?php echo $__env->make('docente.posts.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('styles'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="/otro/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- DataTables -->
<script src="/otro/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/otro/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
      $('#posts-table').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'scrollX'     : true
      })
    })
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>