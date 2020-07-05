<?php $__env->startSection('profile_assets'); ?>
<link href="<?php echo e(asset('style/profile/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
<script src="<?php echo e(asset('style/profile/script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div  class="mt-3">
    <div id="wrapper">
       <?php echo $__env->make('profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header py-3 text-<?php echo e(__('generic.text_direction')); ?>">
                            <p class="text-danger m-0 font-weight-bold"><?php echo e(__('generic.pershuse')); ?></p>
                        </div>
                        <div class="card-body">
                            <div class="panel border shadow">
                                <div class="panel-content">
                                    <table class="table table-responsive table-hover table-striped">
                                        <thead class="text-center">
                                            <tr>
                                                <th><?php echo e(__('generic.row')); ?></th>
                                                <th><?php echo e(__('generic.name_product')); ?></th>
                                                <th> <?php echo e(__('generic.price_unit')); ?>(<?php echo e(__('generic.vahed_pool')); ?>)</th>
                                                <th><?php echo e(__('generic.number')); ?></th>
                                                <th> <?php echo e(__('generic.price_total')); ?></th>
                                                <th><?php echo e(__('generic.date')); ?></th>
                                                <th> <?php echo e(__('generic.number_transaction')); ?></th>
                                                <th><?php echo e(__('generic.state_of_buy')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>

                                            <?php if(isset($purchases)): ?>
                                            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($i++); ?></td>
                                                    <td><?php echo e($sal->name); ?></td>
                                                    <td><?php echo e(number_format(  ($sal->price)-($sal->price * $sal->takhfif/100) )); ?></td>
                                                    <td><?php echo e($sal->number); ?></td>
                                                    <td><?php echo e(number_format( (($sal->price)-($sal->price * $sal->takhfif/100))* $sal->number )); ?></td>
                                                    <td><?php echo e($sal->created_at); ?></td>
                                                    <td><?php echo e($sal->transId); ?></td>
                                                    <td>
                                                        <?php if($sal->status =='در حال پردازش'): ?>
                                                            <span class="bg-danger text-dark p-1 rounded"><?php echo e($sal->status); ?></span>
                                                            <?php else: ?>
                                                            <span class="bg-success text-dark p-1 rounded"><?php echo e($sal->status); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
     </div>
</div>


<?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title',__('generic.pershuse')); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/profile/purchasesUser.blade.php ENDPATH**/ ?>