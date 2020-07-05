<?php $__env->startSection('title','خرید های من'); ?>
<?php $__env->startSection('profile_assets'); ?>
<link href="<?php echo e(asset('style/profile/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
<script src="<?php echo e(asset('style/profile/script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div  class="mt-3">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar  sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column justify-content-start p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>فروشگاه لوازم خانگی</span></div>
                </a>
                <hr class="divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">

                    <li class="nav-item" role="presentation"><a class="nav-link  text-right" href="<?php echo e(url('profile')); ?>"><i class="fa fa-user"></i><span class="mr-1">اطلاعات حساب</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link  text-right" href="<?php echo e(url('address')); ?>"><i class="fa fa-user"></i><span class="mr-1">جزئیات آدرس</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active text-right" href="<?php echo e(url('purchasesUser')); ?>"><i class="fa fa-shopping-cart"></i><span class="mr-1">خرید های شما</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-right" href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i><span class="mr-1">صفحه اصلی</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-right" href=""><i class="fa fa-home"></i><span class="mr-1">محصولات مناسب شما</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-right" href="<?php echo e(url('logout')); ?>"><i class="fas fa-sign-out-alt"></i><span class="mr-1">خروج</span></a></li>
                </ul>

            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header py-3 text-right">
                            <p class="text-danger m-0 font-weight-bold">خریدهای شما</p>
                        </div>
                        <div class="card-body">
                            <div class="panel border shadow">
                                <div class="panel-content">
                                    <table class="table table-responsive table-hover table-striped">
                                        <thead class="text-center">
                                            <tr>
                                                <th>ردیف</th>
                                                <th>نام محصول</th>
                                                <th> قیمت واحد(تومان)</th>
                                                <th>تعداد</th>
                                                <th>قیمت کل</th>
                                                <th>تاریخ</th>
                                                <th>شماره پیگیری</th>
                                                <th>وضعیت سفارش</th>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/profile/purchasesUser.blade.php ENDPATH**/ ?>