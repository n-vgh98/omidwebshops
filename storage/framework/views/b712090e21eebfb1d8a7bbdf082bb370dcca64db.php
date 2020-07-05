<?php $__env->startSection('title','export'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card mt-4" >
        <div class="card-header " style="direction: rtl">
            وارد کردن و استخراج کاربران
        </div>
        <div class="card-body">
            <form action="<?php echo e(url('importUser')); ?>" method="POST" name="importform"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" name="file" class="form-control">
                <br>
                <a class="btn btn-info rtl" href="<?php echo e(url('exportUser')); ?>">
                    دخیره کاربران</a>
                <button class="btn btn-success">وارد کردن کاربران به دیتابیس</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="card mt-4" >
        <div class="card-header " style="direction: rtl">
            وارد کردن و استخراج فاکتورها
        </div>
        <div class="card-body">
            <form action="<?php echo e(url('importFactor')); ?>" method="POST" name="importform"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" name="file" class="form-control">
                <br>
                <a class="btn btn-info rtl" href="<?php echo e(url('exportFactor')); ?>">
                    دخیره فاکتورها</a>
                <button class="btn btn-success">وارد کردن فاکتور به دیتابیس</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/import-export/import-export.blade.php ENDPATH**/ ?>