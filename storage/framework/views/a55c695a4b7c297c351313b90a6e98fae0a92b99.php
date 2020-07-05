<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <input type="hidden" value="0" id="sumhidden">
    <div class="container bg-white mt-3">
        <div class="row justify-content-center">
            <div class="col-4">
                <h3 class="text-center  border text-danger"><?php echo e(__('generic.bag_buy')); ?></h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6 my-2">
                <div class="form-group">
                    <a class="btn btn-dark " href="/"><?php echo e(__('generic.add_product')); ?></a>
                    <a class="btn btn-danger " href="/empty/cart"><?php echo e(__('generic.empty_card')); ?></a>
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
                <span><?php echo e(__('generic.name_product')); ?></span>
            </div>

            <div class="col-sm-1 border-left text-center">
                <span><?php echo e(__('generic.number')); ?></span>
            </div>

            <div class="col-sm-2 border-left text-center">
                <span><?php echo e(__('generic.price_unit')); ?></span>
            </div>

            <div class="col-sm-4 border-left text-center">
                <span><?php echo e(__('generic.price_total')); ?></span>
            </div>

            <div class="col-sm-1 border-left bg-danger text-center">
                <span><?php echo e(__('generic.delete')); ?></span>
            </div>
        </div>
    </div>
<?php if(session()->has('cartItem') && count(session('cartItem')) >0 ): ?>
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

                    <span> <?php echo e(number_format( $item['price'] )); ?>  <?php echo e(__('generic.vahed_pool')); ?> </span>
                </div>
            </div>

            <div class="col-sm-4 border-left d-flex">
                <div class="my-auto mx-auto">
                      <?php echo e(__('generic.price')); ?>  <span id="sum<?php echo e($item['id']); ?>" class="sum"><?php echo e(number_format( $item['price'] * $item['number'] )); ?> </span>

                    <span><?php echo e(__('generic.vahed_pool')); ?></span>
                    <div class=" text-danger">
                           <?php echo e(__('generic.discount')); ?>  :  <span id="takhfif<?php echo e($item['id']); ?>" class="takhfif"> <?php echo e(number_format( ( ($item['price'] * $item['takhfif'])/100 ) * $item['number'] )); ?> </span>

                        <span><?php echo e(__('generic.vahed_pool')); ?></span>
                    </div>
                    <div class="bg-danger"><hr></div>
                    <div class="">
                         <?php echo e(__('generic.price_total')); ?> :  <span class="finalPrice"><?php echo e(number_format ( ($item['price'] * $item['number'])-( ($item['price'] * $item['takhfif'])/100 ) * $item['number'] )); ?></span><?php echo e(__('generic.vahed_pool')); ?>

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
                 <?php echo e(__('generic.total_bag_card')); ?> :
                <?php $sum = 0 ?>
                <span id="sumofsabadkharid">

                    <?php $__currentLoopData = session('cartItem'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php  $sum += ( $item['number'] * $item['price'] ) ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e(number_format($sum)); ?>

                </span>  <?php echo e(__('generic.vahed_pool')); ?>

            </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row ">
            <div class="col-4 offset-6 border mt-3 p-2 bg-info">
                <div class="">
                    <?php $sumtakhfif = 0 ?>
                     <?php echo e(__('generic.total_discount')); ?> :
                    <span id="sumoftakhfif">
                        <?php $__currentLoopData = session('cartItem'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php  $sumtakhfif += ( ( ($item['price'] * $item['takhfif'])/100 ) * $item['number'] ) ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e(number_format($sumtakhfif)); ?>

                    </span>  <?php echo e(__('generic.vahed_pool')); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-4 offset-6 border mt-3 p-2 bg-success">
                <div class="">
                    <?php echo e(__('generic.total_for_pay')); ?> :
                    <span id="priceofsabadkharid">
                        <?php echo e(number_format($sum - $sumtakhfif)); ?>

                    </span>  <?php echo e(__('generic.vahed_pool')); ?>

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
                        <input type="submit" value="<?php echo e(__('generic.confirm_and_continue_buy')); ?>" name="btnPardakht" class="btn btn-danger">
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
<?php $__env->startSection('title',__('generic.bag_buy') ); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/sabadKharid.blade.php ENDPATH**/ ?>