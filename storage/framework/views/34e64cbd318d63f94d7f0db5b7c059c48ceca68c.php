<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="rtl"><head>
    <meta charset="utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
  <meta name="description" content="فروشگاه اینترنتی محصولات بهداشتی و ارایشی" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>   <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Scripts -->
    <link href="/contents/css/main.css?v=1.0.<?= time(); ?>" rel="stylesheet">



    <link href="/contents/fonts/font-awesome.min.css" rel="stylesheet">
    <link href="/contents/fonts/ionicons.min.css" rel="stylesheet">
    <link href="/contents/fonts/material-icons.min.css" rel="stylesheet">
    <link href="/contents/fonts/typicons.min.css" rel="stylesheet">
    <script src="<?php echo e(asset('style/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('style/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('style/bootstrap.min.js')); ?>"></script>


	<script src="<?php echo e(asset('style/wow.js')); ?>"></script>

    <!-- Fonts -->


    <!-- Styles -->
  <!--  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet"> -->


<link href="<?php echo e(asset('style/bootstrap.css')); ?>" rel="stylesheet" type="text/css">

<link href="<?php echo e(asset('style/bootstrap-rtl.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('style/animate.css')); ?>" rel="stylesheet" type="text/css" >

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('style/style.css ')); ?>" />
<link rel="shortcut icon" href="<?php echo e(asset('images/faivIcon.png')); ?>">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <?php echo $__env->yieldContent('profile_assets'); ?>
    <?php echo $__env->yieldContent('css'); ?>
    <?php echo $__env->yieldContent('script'); ?>




</head>
<body>
            <?php echo $__env->yieldContent('content'); ?>




</body>
</html>
<?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>