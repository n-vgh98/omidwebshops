<?php $__env->startSection('title','تماس با ما'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row ">
            <div class="col-12 justify-content-center bg-white">
                <h5 class="text-center mt-2">
                    کاربر گرامی، پیش از ارسال ایمیل یا تماس تلفنی بخش <a href="/fqa"> سؤالات متداول</a> را مطالعه فرمایید.
                </h5>
                <p>
                    تلفن تماس : 0917568785555
                </p>
                <p>
                    زمان پاسخگویی  :شنبه تا چهارشنبه (9:00 الی 18:00) ـ پنج شنبه (9:00 الی 17:00)
                </p>
                <p>
                    آدرس : شیراز،  شهرک گلستان،  کد پستی 1493637119
                </p>
                <p>
                    پست الکترونیک :info@omidwebshop.ir
                </p>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row bg-white">
            <h5 class="text-center my-3">از دیدن پیام شما خوشحال خواهیم شد و در اسرع وقت پاسخگو خواهیم بود</h5>
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

                   <div class="form-group"><input class="form-control" type="text" name="name" placeholder=" نام و نام خانوادگی" /></div>
                   <div class="form-group"><input class="form-control" type="email" name="email" placeholder="ایمیل" /></div>
                   <div class="form-group"><input class="form-control" type="text" name="mobile" placeholder="شماره تلفن" /></div>
                   <div class="form-group"><textarea class="form-control" name="message" placeholder="پیام خود را بنویسید" rows="8"></textarea></div>
                   <div class="form-group"><button class="btn btn-primary" type="submit">ارسال </button></div>
               </form>
           </div>
        </div>

    </div>

    <?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/contact-us.blade.php ENDPATH**/ ?>