<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<form method="post" action="/formprocess">
		<?php echo csrf_field(); ?>
		<?php echo method_field('PUT'); ?>
	</form>
	<?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		<?php echo e($message); ?>

	<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</body>
</html><?php /**PATH F:\xampp\htdocs\L\laravel-6\resources\views/form.blade.php ENDPATH**/ ?>