<?php
    if(session()->has('locale'))
        {
            \Illuminate\Support\Facades\App::setLocale(session('locale'));
        }
?>
<?php $__env->startSection('css'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title', __('generic.replay') ); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">

        <?php echo e(__('generic.replay')); ?>

    </h1>
    <?php echo $__env->make('voyager::multilingual.language-selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="<?php echo e(url('admin/pasokh_user_message/'.$id)); ?>"
                            method="POST" enctype="multipart/form-data">

                        <!-- CSRF TOKEN -->
                        <?php echo e(csrf_field()); ?>


                        <div class="panel-body">

                            <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                         <div class="container">
                             <div class="row">
                                   <textarea name="pasokh" rows="5"  class="col-md-12" autofocus>

                                   </textarea>
                             </div>
                         </div>
                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <?php $__env->startSection('submit-buttons'); ?>
                                <button type="submit" class="btn btn-primary save"><?php echo e(__('voyager::generic.send')); ?></button>
                            <?php $__env->stopSection(); ?>
                            <?php echo $__env->yieldContent('submit-buttons'); ?>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> <?php echo e(__('voyager::generic.are_you_sure')); ?></h4>
                </div>

                <div class="modal-body">
                    <h4><?php echo e(__('voyager::generic.are_you_sure_delete')); ?> '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                    <button type="button" class="btn btn-danger" id="confirm_delete"><?php echo e(__('voyager::generic.delete_confirm')); ?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\vendor\tcg\voyager\src/../resources/views/messages/pasokh.blade.php ENDPATH**/ ?>