<?php $__env->startSection('title','سبد خرید'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <input type="hidden" value="0" id="sumhidden">
    <div class="container bg-white mt-3">
        <div class="row justify-content-center">
            <div class="col-4">
                <h3 class="text-center  border text-danger">سبد خرید شما</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6 my-2">
                <div class="form-group">
                    <a class="btn btn-dark " href="/">افزودن کالا</a>
                    <a class="btn btn-danger " href="/empty/cart">خالی کردن سبد خرید</a>
                </div>
            </div>
        </div>
    </div>
<?php if($errors): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-danger"> <?php echo e($error); ?></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
    <?php if(session('pardakht')): ?>
        <div class="text-success text-center border">
            <?php echo (session('pardakht')); ?>

            <?php echo e(session()->forget('pardakht')); ?>

        </div>

    <?php endif; ?>


    <div class="container">
        <div class="row bg-light mt-2">
            <div class="col-sm-4 border-left text-center">
                <span>نام محصول</span>
            </div>

            <div class="col-sm-1 border-left text-center">
                <span>تعداد</span>
            </div>

            <div class="col-sm-2 border-left text-center">
                <span>قیمت واحد</span>
            </div>

            <div class="col-sm-4 border-left text-center">
                <span>قیمت کل</span>
            </div>

            <div class="col-sm-1 border-left bg-danger text-center">
                <span>حذف</span>
            </div>
        </div>
    </div>
<?php if(session()->has('cartItem')): ?>
    <?php $__currentLoopData = session('cartItem'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container">
        <div class="row bg-white mt-2">
            <div class="col-sm-4 border-left text-center">

                <img src="<?php echo e(asset('storage/products/'.$item['image'])); ?>" class="img-fluid" width="60px" height="60px">
                <span><?php echo e($item['name']); ?></span>
            </div>

            <div class="col-sm-1 border-left d-flex">
                <div class="my-auto">
                    <input type="number" value="<?php echo e($item['number']); ?>" min="1" class="form-control d-block" onchange="calculateSum(<?php echo e($item['id']); ?>)" id="number<?php echo e($item['id']); ?>">
                </div>
            </div>

            <div class="col-sm-2 border-left d-flex">
                <div class="my-auto mx-auto">

                    <span> <?php echo e(number_format( $item['price'] )); ?>  تومان </span>
                </div>
            </div>

            <div class="col-sm-4 border-left d-flex">
                <div class="my-auto mx-auto">
                      قیمت : <span id="sum<?php echo e($item['id']); ?>" class="sum"><?php echo e(number_format( $item['price'] * $item['number'] )); ?> </span>

                    <span>تومان</span>
                    <div class=" text-danger">
                       تخفیف :  <span id="takhfif<?php echo e($item['id']); ?>" class="takhfif"><?php echo e(number_format( ( ($item['price'] * $item['takhfif'])/100 ) * $item['number'] )); ?> </span>

                        <span>تومان</span>
                    </div>
                    <div class="bg-danger"><hr></div>
                    <div class="">
                        قیمت نهایی :  <span class="finalPrice"><?php echo e(number_format ( ($item['price'] * $item['number'])-( ($item['price'] * $item['takhfif'])/100 ) * $item['number'] )); ?></span>       تومان
                    </div>
                    <div>

                    </div>
                </div>
            </div>

            <div class="col-sm-1 border-left d-flex bg-danger" >
                <div class="my-auto mx-auto">
                    <a href="/deleteFromCart/<?php echo e($item['id']); ?>" class="close bg-danger">&times;</a>
                </div>
            </div>



        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="container">
    <div class="row">
        <div class="col-4 offset-6 border mt-3 p-2">
            <div class="">
                مجموع سبد خرید :
                <?php $sum = 0 ?>
                <span id="sumofsabadkharid">

                    <?php $__currentLoopData = session('cartItem'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php  $sum += ( $item['number'] * $item['price'] ) ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e(number_format($sum)); ?>

                </span>  تومان
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row ">
            <div class="col-4 offset-6 border mt-3 p-2 bg-info">
                <div class="">
                    <?php $sumtakhfif = 0 ?>
                    مجموع تخفیف :
                    <span id="sumoftakhfif">
                        <?php $__currentLoopData = session('cartItem'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php  $sumtakhfif += ( ( ($item['price'] * $item['takhfif'])/100 ) * $item['number'] ) ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e(number_format($sumtakhfif)); ?>

                    </span>  تومان
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-4 offset-6 border mt-3 p-2 bg-success">
                <div class="">
                    مبلغ قابل پرداخت :
                    <span id="priceofsabadkharid">
                        <?php echo e(number_format($sum - $sumtakhfif)); ?>

                    </span>  تومان
                </div>
            </div>
        </div>
    </div>



    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-6 offset-6 my-2">
                <form method="get" action="/continuePardakht">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="pay" id="sumofsabadkharidforpay" value="<?php echo e(($sum - $sumtakhfif) ?? ''); ?>">

                    <div class="form-group">
                        <input type="submit" value="تأیید و ادامه فرایند خرید" name="btnContinuePardakht" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
    <?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript">
        function calculateSum(id) {
            var number = '#number'+id;
            var number = $(number).val();
            window.location = "/add/cart/"+id+"/"+number;
        }//end of function calculateSum
        //----------------------------------------------------------------------------------


    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/sabadKharid.blade.php ENDPATH**/ ?>