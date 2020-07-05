
<nav class="navbar navbar-dark align-items-start sidebar  sidebar-dark accordion bg-gradient-primary p-0 ">
            <div class="container-fluid d-flex flex-column justify-content-start p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span><?php echo e(__('generic.profile')); ?></span></div>
</a>
<hr class="divider my-0">
<ul class="nav navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item" role="presentation"><a class="nav-link  text-<?php echo e(__('generic.text_direction')); ?>" href="<?php echo e(url('profile')); ?>"><i class="fa fa-user"></i><span class="mr-1"><?php echo e(__('profile.information_account')); ?></span></a></li>

    <li class="nav-item" role="presentation"><a class="nav-link  text-<?php echo e(__('generic.text_direction')); ?>" href="<?php echo e(url('address')); ?>"><i class="fa fa-user"></i><span class="mr-1"><?php echo e(__('generic.detail_address')); ?></span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link text-<?php echo e(__('generic.text_direction')); ?>" href="<?php echo e(url('purchasesUser')); ?>"><i class="fa fa-shopping-cart"></i><span class="mr-1"><?php echo e(__('profile.your_pershuse')); ?></span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link text-<?php echo e(__('generic.text_direction')); ?>" href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i><span class="mr-1"><?php echo e(__('generic.home')); ?></span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link text-<?php echo e(__('generic.text_direction')); ?>" href="#"><i class="fa fa-home"></i><span class="mr-1"><?php echo e(__('profile.suitable_Product_for_you')); ?></span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link text-<?php echo e(__('generic.text_direction')); ?>" href="<?php echo e(url('message_user')); ?>"><i class="fas fa-comments"></i><span class="mr-1"><?php echo e(__('generic.messages')); ?></span></a></li>
    <li class="nav-item" role="presentation"><a class="nav-link text-<?php echo e(__('generic.text_direction')); ?>" href="<?php echo e(url('logout')); ?>"><i class="fas fa-sign-out-alt"></i><span class="mr-1"><?php echo e(__('generic.exit')); ?></span></a></li>
</ul>

</div>
</nav>

<script>
    $(document).ready(function(){
        var url = window.location.href;

        $('ul li a').each(function(){
            if($(this).attr('href') == url)
            {
                $('li a').removeClass("active");
                $(this).addClass("active");
            }

        });
    });
</script>
<?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/profile/sidebar.blade.php ENDPATH**/ ?>