<?php $__env->startSection('content'); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title',__('generic.fqa')); ?>
<div class="container bg-white border">
    <div class="row">
        <div class="col-12">
            <div class="fqa">
                <h2 class="title text-center">
                    <span class="text-primary "><?php echo e(__('generic.fqa')); ?></span>
                </h2>
                <?php if(count($fqa) > 0): ?>
                   <?php $__currentLoopData = $fqa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div>
                           <?php echo $f->getTranslatedAttribute('question'); ?>

                       </div>
                    <div>
                        <?php echo $f->getTranslatedAttribute('replay'); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
    <?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/fqa.blade.php ENDPATH**/ ?>