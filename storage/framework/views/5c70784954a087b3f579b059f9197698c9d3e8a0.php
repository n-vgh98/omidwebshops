<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>this is a post create </h1>
<?php if($errors->any()): ?>
	<div class="alert alert-danger">
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
<?php endif; ?>
</body>
</html><?php /**PATH F:\xampp\htdocs\L\laravel-6\resources\views/post/create.blade.php ENDPATH**/ ?>