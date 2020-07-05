<?php $__env->startSection('title','child blade'); ?>

<?php $__env->startSection('sidebar'); ?>
	##parent-placeholder-19bd1503d9bad449304cc6b4e977b74bac6cc771##
	<p>this is a from child that append to patent</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<p>this is a content from child</p>

	<?php $__env->startComponent('alert'); ?>
		<?php $__env->slot('title'); ?>
				slot title
		<?php $__env->endSlot(); ?>
		<strong>Hooooop</strong>this is  text danger and use of slot and component
	<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\L\laravel-6\resources\views/child.blade.php ENDPATH**/ ?>