<?php $__env->startSection('title','سبد خرید'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php if($errors): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-danger"> <?php echo e($error); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(session('pardakht')): ?>
      <div class="container mt-2">
          <div class="row">
              <div class="col-8 offset-2">
                  <div class="text-dark text-center border border-0  shadow ">
                      <?php echo (session('pardakht')); ?>

                      
                  </div>
              </div>
          </div>
      </div>
    <?php endif; ?>
      <div class="container bg-white shadow">
          <div class="row p-2" style="background-color: rgba(91,142,141,0.45)">
              <div class="col-md-4  offset-md-2">
                  <span>نام تحویل گیرنده : </span><span><?php echo e(session('namegirandeh')); ?></span>
              </div>
              <div class="col-md-4">
                  <span>شماره تماس : </span><span><?php echo e(session('mobile')); ?></span>
              </div>
          </div>
          <div class="row p-2">
              <div class="col-md-4 offset-md-2 ">
                  <span>تعداد مرسوله : </span><span><?php echo e(session('number')); ?></span>
              </div>
              <div class="col-md-4">
                  <span> مبلغ کل : </span><span><?php echo e(session('mablagh')); ?></span>
              </div>
          </div>
          <div class="row p-2"  style="background-color: rgba(91,142,141,0.45)">
              <div class="col-md-4 offset-md-2">
                  <span>روش پرداخت : </span><span>اینترنتی</span>
              </div>
              <div class="col-md-4">
                  <span> وضعیت سفارش : </span><span>در حال پردازش</span>
              </div>
          </div>
          <div class="row p-2">
              <div class="col-md-8 offset-md-2">
                  <span> آدرس : </span><span><?php echo e(session('address')); ?></span>
              </div>
          </div>
      </div>
    <div class="container">
        <div class="mt-3">
            <h4>جزئیات پرداخت</h4>
        </div>
    </div>
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-8">
                <table class="table table-responsive table-hover table-striped">
                    <thead class="text-center">
                    <tr>
                        <th>ردیف</th>
                        <th>درگاه پرداخت</th>
                        <th>شماره پیگیری</th>
                        <th>تاریخ</th>
                        <th>مبلغ(تومان)</th>
                        <th>وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(session('result')): ?>

                            <tr>
                                <td>1</td>
                                <td>درگاه پی</td>
                                <td><?php echo e(session('result')->transId); ?></td>
                                <td><?php echo e(now()); ?></td>
                                <td><?php echo e(number_format(session('result')->amount /10)); ?></td>
                                <td>پرداخت موفق</td>

                            </tr>

                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group">
            <a class="btn btn-dark " href="/"> صفحه اصلی</a>
        </div>
    </div>




    <?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/finalpardakht.blade.php ENDPATH**/ ?>