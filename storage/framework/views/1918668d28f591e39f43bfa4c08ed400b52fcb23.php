<?php if( $notificacion <> '' ): ?>
    <div class="<?php echo e($tipo); ?>" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            <li><?php echo e($notificacion); ?></li>
        </ul>
    </div>
<?php endif; ?>