<!DOCTYPE html>
<html>
<head>
	<title>App-name <?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
	<?php $__env->startSection('sidebar'); ?>
		this is master sidebar
	<?php echo $__env->yieldSection(); ?>
	<div class="container">
		<?php echo $__env->yieldContent('content'); ?>
	</div>
</body>
</html><?php /**PATH F:\xampp\htdocs\L\laravel-6\resources\views/layout/app.blade.php ENDPATH**/ ?>