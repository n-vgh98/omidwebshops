<?php

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('contents/library/slick/slick.css')); ?>"/>
    <!-- Add the new slick-theme.css if you want the default styling  -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('contents/library/slick/slick-theme.css')); ?>"/>
</head>
<body>
<div class="sameproducts">

    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>
    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>
    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>
    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>
    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>
    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>
    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>
    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>
    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>
    <div>
        <img class=""   src="<?php echo e(asset('storage/products/image_resized1587824668.png')); ?>">
    </div>

</div>
<script src="<?php echo e(asset('style/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('style/popper.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('contents/library/slick/slick.js')); ?>"></script>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {

        $('.sameproducts').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots : true ,
            arrows: true,




        });



    });

</script>
<?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/slicker.blade.php ENDPATH**/ ?>