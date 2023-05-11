
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="<?php echo e(route('docente.posts.store')); ?>">
      <?php echo e(csrf_field()); ?>

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Titulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group <?php echo e($errors->has('titulo')? 'has-error' : 'no hay'); ?> ">
              
              <input name = "titulo" class="form-control" value="<?php echo e(old('titulo')); ?>" placeholder="ingrresa aqui el titulo de la publicacion" required
              <?php echo $errors->first('titulo','<span class="help-block">:message</span>'); ?>>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  class="btn btn-primary">Crear publicacion</button>
      </div>
    </div>
  </div>
  </form>
</div>



