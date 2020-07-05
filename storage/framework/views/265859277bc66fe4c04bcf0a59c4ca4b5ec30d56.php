<?php $__env->startSection('title','خرید های من'); ?>
<?php $__env->startSection('profile_assets'); ?>
<link href="<?php echo e(asset('style/profile/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
<script src="<?php echo e(asset('style/profile/script.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div  class="mt-3">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar  sidebar-dark accordion bg-gradient-danger p-0">
            <div class="container-fluid d-flex flex-column justify-content-start p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>خانومی</span></div>
                </a>
                <hr class="divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">

                    <li class="nav-item" role="presentation"><a class="nav-link  text-right" href="<?php echo e(url('profile')); ?>"><i class="fas fa-user"></i><span class="mr-1">پروفایل شما</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active text-right" href="<?php echo e(url('bagUser')); ?>"><i class="far fa-user-circle"></i><span class="mr-1">خرید های شما</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-right" href="<?php echo e(url('logout')); ?>"><i class="far fa-user-circle"></i><span class="mr-1">خروج</span></a></li>
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
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th>نام محصول</th>
                                                <th> قیمت واحد(تومان)</th>
                                                <th>تعداد</th>
                                                <th>قیمت کل</th>
                                                <th>تاریخ</th>
                                                <th>شماره تراکنش</th>
                                                <th>دسته بندی محصول</th>
                                            </tr>
                                        </thead>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/profile/bag.blade.php ENDPATH**/ ?>