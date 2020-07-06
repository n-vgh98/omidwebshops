<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title',__('generic.about_us')); ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-6 bg-white">
                <div class="my-3">
                    <?php if(count($about_us) > 0): ?>
                      <?php echo $about_us[0]->getTranslatedAttribute('about_us'); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/about-us.blade.php ENDPATH**/ ?>