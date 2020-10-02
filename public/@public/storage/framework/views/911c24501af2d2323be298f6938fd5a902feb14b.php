<?php $__env->startSection('page_title'); ?>
  Alta producto
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <form role="form" action="<?php echo e(route('productos.store')); ?>" enctype="multipart/form-data" method="POST">
    <?php echo csrf_field(); ?>

    <div class="row">
      <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
          <label>Titulo</label>
          <input type="text" name="titulo" class="form-control <?php if($errors->productos->has('titulo')): ?>is-invalid <?php endif; ?>" placeholder="Titulo ..." value="<?php echo e(old('titulo')); ?>">
          <?php $__currentLoopData = $errors->productos->get('titulo'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="error invalid-feedback"><?php echo e($message); ?></span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <!-- textarea -->
        <div class="form-group">
          <label>Descripcion</label>
          <textarea name="descripcion" class="form-control <?php if($errors->productos->has('descripcion')): ?>is-invalid <?php endif; ?>" rows="3" placeholder="Descripcion ..." value="<?php echo e(old('descripcion')); ?>"></textarea>
          <?php $__currentLoopData = $errors->productos->get('descripcion'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="error invalid-feedback"><?php echo e($message); ?></span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Selecciona las imagenes</label>
          <div class="custom-file">
            <input type="file" name="imagenes[]" multiple class="custom-file-input form-control <?php if($errors->productos->has('imagenes')): ?>is-invalid <?php endif; ?>" id="customFile">
            <label class="custom-file-label" for="customFile">Seleccione</label>
            <?php $__currentLoopData = $errors->productos->get('imagenes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="error invalid-feedback"><?php echo e($message); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="" class="col-md-12">Activo</label>
          <input type="checkbox" name="activo" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
        </div>
      </div>
    </div>
    <div class="row">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/TodoVidrio/resources/views/admin/productos/create.blade.php ENDPATH**/ ?>