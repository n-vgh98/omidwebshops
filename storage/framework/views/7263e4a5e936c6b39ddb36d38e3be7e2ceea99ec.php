<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
?>


<?php $__env->startSection('profile_assets'); ?>
<link href="<?php echo e(asset('style/profile/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
<script src="<?php echo e(asset('style/profile/script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div  class="mt-3">
    <div id="wrapper">
       <?php echo $__env->make('profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <div class="container-fluid">

                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <div class="card mb-3">
                                <div class="card-header text-<?php echo e(__('generic.text_direction')); ?>"><?php echo e((__('generic.messages'))); ?></div>
                                <div class="card-body text-<?php echo e(__('generic.text_direction')); ?> shadow">
                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="row my-3">
                                          <div class="col-6">
                                              <?php echo e(__('generic.message')); ?> :  <?php echo e($message->message); ?>

                                          </div>
                                          <div class="col-6">
                                              <?php echo e(__('generic.replay')); ?> : <?php echo e($message->pasokh); ?>

                                          </div>

                                      </div>
                                        <hr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">


                        </div>
                    </div>

                </div>


                   <div class="container">

                    <div class="row bg-white">
                        <h5 class="text-center my-3"><?php echo e(__('generic.message_user_glad')); ?></h5>
                        <div class="col-6 ">
                            <form method="post" action="<?php echo e(url('/sendMessage')); ?>">
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

                                <div class="form-group"><input class="form-control" type="hidden" name="name" value="<?php echo e(Auth::user()->name); ?>"  /></div>
                                <div class="form-group"><input class="form-control" type="hidden"  name="email" value="<?php echo e(Auth::user()->email); ?>" /></div>
                                <div class="form-group"><input class="form-control" type="hidden" name="mobile" value="<?php echo e(Auth::user()->mobile); ?>"  /></div>
                                <div class="form-group"><textarea class="form-control" name="message" placeholder="<?php echo e(__('generic.write_your_message')); ?>" rows="8"></textarea></div>
                                <div class="form-group"><button class="btn btn-primary" type="submit"><?php echo e(__('generic.send_message')); ?> </button></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title',__('generic.messages')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/profile/message.blade.php ENDPATH**/ ?>