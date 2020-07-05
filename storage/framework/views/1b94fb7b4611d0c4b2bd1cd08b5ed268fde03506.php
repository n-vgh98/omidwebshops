<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($pro->name); ?><br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/testProducts.blade.php ENDPATH**/ ?>