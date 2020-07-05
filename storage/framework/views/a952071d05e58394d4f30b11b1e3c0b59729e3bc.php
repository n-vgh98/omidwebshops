<?php




?>
<form method="post" action="<?php echo e(url('delete/User')); ?>">
    <?php echo csrf_field(); ?>
    <input type="text" name="userid" value="58">
    <input type="submit" name="btndelete" value="حذف">
</form>
<?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/delete.blade.php ENDPATH**/ ?>