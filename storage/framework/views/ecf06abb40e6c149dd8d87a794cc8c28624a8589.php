<?php
$sliders = App\Slider::all();
$count = $sliders->count();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div id="demo" class="carousel slide " data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <?php for($i= 0 ;$i < $count ; $i++): ?>
                    <li data-target="#demo" data-slide-to="<?php echo e($i); ?>" <?php if($i==0) echo "class=active";  ?> ></li>
                    <?php endfor; ?>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="carousel-item   <?php if($loop->first) echo "active";  ?> " >
                            <img src="<?php echo e(asset('storage/'.$slide->imageAddress)); ?>"  alt="Los Angeles" class="imageslider">

                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div>
    </div>

</div>

<?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/slider.blade.php ENDPATH**/ ?>