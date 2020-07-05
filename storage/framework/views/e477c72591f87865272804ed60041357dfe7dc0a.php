<?php $__env->startSection('page_header'); ?>
   <h3 class="text-center"> درباره محصول</h3>
   <?php if($errors->any()): ?>
       <div class="alert alert-danger">
           <ul>
               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><?php echo e($error); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </ul>
       </div>
   <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php

?>
<?php $__env->startSection('content'); ?>
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <form  method="post" action="/admin/productsContinue"   enctype="multipart/form-data" id="createproductform">
                <?php echo csrf_field(); ?>
                <div class="col-md-12">

                <div class="form-group  col-md-12 ">

                        <textarea id="ckeckditor1" name="aboutProduct">
                                    <?php echo e(session('aboutproducts')); ?>

                        </textarea>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-primary " name="savecountinue" value="ذخیره">
            </div>
            </form>
        </div>
    </div>
    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> اطمینان دارید</h4>
                </div>

                <div class="modal-body">
                    <h4>از حذف اطمینان دارید '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">لغو</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">بله، این را حذف کن!</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('style/ckeditor/ckeditor.js')); ?>"></script>

    <script type="text/javascript">
        CKEDITOR.replace( 'ckeckditor1' );
    </script>
<?php $__env->stopSection(); ?>

    <script src="<?php echo e(asset('style/jquery.min.js')); ?>"></script>







<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/createProductContinue.blade.php ENDPATH**/ ?>