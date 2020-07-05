
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php echo e($post->id); ?> @@@ <?php echo e($post->content); ?><br>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo e($posts->onEachSide(5)->links()); ?>



<?php /**PATH F:\xampp\htdocs\L\laravel-6\resources\views/paginate.blade.php ENDPATH**/ ?>