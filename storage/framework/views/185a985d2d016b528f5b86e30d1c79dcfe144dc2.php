<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title',__('generic.contact_us') ); ?>
    <div class="container bg-white" >
        <div class="row" >
            <div class="col-12 justify-content-center ">
                <?php echo $contact_us[0]->getTranslatedAttribute('contact_us'); ?>


            </div>
    </div>

    <div class="container bg-white">

        <div class="row ">
            <h5 class="text-center my-3"><?php echo e(__('generic.message_user_glad')); ?></h5>
           <div class="col-6 ">
               <form method="post" action="/sendMessage">
                   <?php echo csrf_field(); ?>

                   <?php if($errors->any()): ?>
                       <div class="alert alert-danger">
                           <ul>
                               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <li><?php echo e($error); ?></li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                       </div>
                   <?php endif; ?>
                   <?php if(session('result')): ?>
                       <div class="bg-success text-center my-2">
                           <?php echo session('result'); ?>

                       </div>

                   <?php endif; ?>

                   <div class="form-group"><input class="form-control" type="text" name="name" placeholder="<?php echo e(__('profile.name')); ?>" /></div>
                   <div class="form-group"><input class="form-control" type="email" name="email" placeholder="<?php echo e(__('profile.email')); ?>" /></div>
                   <div class="form-group"><input class="form-control" type="text" name="mobile" placeholder="<?php echo e(__('profile.mobile')); ?>" /></div>
                   <div class="form-group"><textarea class="form-control" name="message" placeholder="<?php echo e(__('generic.write_your_message')); ?>" rows="8"></textarea></div>
                   <div class="form-group"><button class="btn btn-primary" type="submit"><?php echo e(__('generic.send_message')); ?> </button></div>
               </form>
           </div>
        </div>

    </div>

    <?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/contact-us.blade.php ENDPATH**/ ?>