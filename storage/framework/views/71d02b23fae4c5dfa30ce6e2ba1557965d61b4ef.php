<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
?>

<?php $__env->startSection('title','پروفایل'); ?>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active text-right" href="<?php echo e(url('profile')); ?>"><i class="fa fa-user"></i><span class="mr-1">اطلاعات حساب</span></a></li>

                    <li class="nav-item" role="presentation"><a class="nav-link  text-right" href="<?php echo e(url('address')); ?>"><i class="fa fa-user"></i><span class="mr-1">جزئیات آدرس</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-right" href="<?php echo e(url('purchasesUser')); ?>"><i class="fa fa-shopping-cart"></i><span class="mr-1">خرید های شما</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-right" href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i><span class="mr-1">صفحه اصلی</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-right" href="#"><i class="fa fa-home"></i><span class="mr-1">محصولات مناسب شما</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-right" href="<?php echo e(url('logout')); ?>"><i class="fas fa-sign-out-alt"></i><span class="mr-1">خروج</span></a></li>
                </ul>

            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <div class="container-fluid">

                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <img class="rounded-circle mb-3 mt-4" src="<?php echo e(asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)); ?>" width="160" height="160">
                                    <form method="post" action="<?php echo e(url('userAvatarFile')); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="file" name="userAvatarImage">

                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class=" btn btn-danger" name="saveAvatar" value="ذخیره ">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">

                            <div class="row">
                                <div class="col">
                                    <div class="card shadow">
                                        <div class="card-header py-3 text-right">
                                            <p class="text-primary m-0 font-weight-bold">تغییر رمز عبور</p>
                                        </div>
                                        <div class="card-body">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger text-right"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <form method="post" action="<?php echo e(url('changeUserPassword')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group text-right "><label for="password"><strong>رمز عبور جدید</strong></label><input class="form-control" id="password" type="password"  name="password"></div>
                                                <div class="form-group text-right "><label for="password-confirmation"><strong>تکرار رمز عبور جدید</strong></label><input class="form-control" id="password-confirmation" type="password" name="password_confirmation"></div>

                                                <div class="form-group"><button class="btn btn-danger btn-sm" type="submit" name="btnChangePassword">تغییر رمز عبور</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-header py-3">
                                        <p class="text-primary text-right m-0 font-weight-bold">اطلاعات شخصی</p>
                                    </div>
                                    <div class="card-body bg-white">
                                        <?php if($errors->any()): ?>
                                        <div class="alert alert-danger text-right">
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                        <form method="post" action="<?php echo e(url('/changeOherAttributes')); ?>">
                                            <?php echo csrf_field(); ?>

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-right"><label for="first_name"><strong>نام و نام خانوادگی</strong></label><input class="form-control" type="text" placeholder="" name="name" value= "<?php echo e(Auth::user()->name); ?>"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-right"><label for="last_name"><strong>شماره موبایل</strong></label><input class="form-control" type="tel" placeholder="" name="mobile" value= "<?php echo e(Auth::user()->mobile); ?>"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-right"><label for="first_name"><strong>سن</strong></label><input class="form-control" type="text" placeholder="" name="age"  value= "<?php echo e(Auth::user()->age); ?>"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-right"><label for="kodemelli"><strong>کد ملی</strong></label><input class="form-control" type="text" placeholder="" name="kodemelli"  value= "<?php echo e(Auth::user()->kodemelli); ?>"></div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-right"><label for="first_name"><strong>شغل</strong></label><input class="form-control" type="text" placeholder="" name="shoghl" value= "<?php echo e(Auth::user()->shoghl); ?>"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-right"><label for="last_name"><strong>تحصیلات</strong></label><input class="form-control" type="text" placeholder="" name="tahsilat" value= "<?php echo e(Auth::user()->tahsilat); ?>"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-right"><label for="first_name"><strong>جنسیت</strong></label></div>
                                                    <div class="form-group text-right ">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label text-right">
                                                                <input type="radio" class="form-check-input mx-1 text-right" name="gener" value="مرد" <?php  if(Auth::user()->gener == 'مرد') echo 'checked'; ?>  >مرد
                                                                <input type="radio" class="form-check-input mx-1" name="gener" value="زن" <?php  if(Auth::user()->gener == 'زن') echo 'checked'; ?>>زن
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-danger btn-sm" type="submit" name="saveUserCahnge">دخیره تغییرات</button></div>
                                        </form>
                                    </div>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/profile/karbar.blade.php ENDPATH**/ ?>