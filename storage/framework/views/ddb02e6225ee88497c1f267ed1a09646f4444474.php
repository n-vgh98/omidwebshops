<?php
use TCG\Voyager\Models\Category;
$catagories = Category::all();

$root = $catagories->filter(function ($value,$key){
    return $value->parent_id == null;
});
$root = $root->sortBy('order');


//dd($root);
?>

<?php
if(session()->has('locale') )
{
    App::setLocale(session('locale'));
}
$root->load('translations');
$catagories->load('translations');
?>
<div class="languag   <?php if(__('generic.is_rtl') == 'true') echo 'ltr' ;else echo 'rtl' ?>">
    <a href="<?php echo e(url('fa')); ?> " class="p-1" style="background-color: #1cc88a">Fa</a><a  class="p-1" style="background-color: #dc3545" href="<?php echo e(url('en')); ?> ">En</a>
</div>
<div class="container-fluid">
    <div class="row">
        <div  class="col-2">
            <div class="">
            <a href="/" title="لوگو" >
                <img src="<?php echo e(asset('images/shortcutIcon.png')); ?>" alt="<?php echo e(__('generic.logo')); ?>"  class="img-fluid my-auto"/>
                </a>
            </div>
        </div>
        <div class="col-6">
            <div class="searchBox  mt-4  mr-auto ">
                <form class="form-inline" action="<?php echo e(url('search')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input class="form-control p-2 ml-2 rounded " type="search" placeholder="<?php echo e(__('generic.search')); ?>" size="40" onFocus="" name="valueSearch">
                    <input type="submit" class="btn btn-primary" name="btnSearch" value="<?php echo e(__('generic.search')); ?>">
                </form>
             </div>
        </div>

        <div class="col-4">
            <div class="d-flex justify-content-around align-items-center p-1 m-1">
                <div>
                    <?php if(\Illuminate\Support\Facades\Auth::check()): ?>

                        

                        <div class="dropdown  profile" role="presentation">

                                <a class="dropdown-toggle no-arrow" data-toggle="dropdown" aria-expanded="true" href="#">
                                    <span class="d-none d-lg-inline  text-secondary small"><?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?></span>
                                    <img class="border rounded-circle img-profile" width="60px0" height="60px" src="<?php echo e(asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)); ?>">
                                </a>
                                <div class="dropdown-menu shadow   dropdown-menu-animated  border-secondary " role="menu" style="z-index: 111111111" id="profileBlock">
                                    <a class="dropdown-item text-right" role="presentation" href="<?php echo e(url('profile')); ?>">
                                        <i class="fas fa-user fa-sm fa-fw  text-gray-400"></i>&nbsp;<?php echo e(__('generic.profile')); ?>

                                    </a>
                                    <a class="dropdown-item text-right" role="presentation" href="<?php echo e(url('/')); ?>">
                                        <i class="fas fa-home  fa-sm fa-fw  text-gray-400"></i>&nbsp;<?php echo e(__('generic.home')); ?>

                                    </a>
                                    <a class="dropdown-item text-right" role="presentation" href="<?php echo e(url('sabadKharid')); ?>"><i class="fas fa-shopping-basket fa-sm fa-fw text-gray-400"></i>&nbsp; <?php echo e(__('generic.bag_cart')); ?></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-right text-danger" role="presentation" href="<?php echo e(route('logout')); ?>"><i class="fas fa-sign-out-alt fa-sm fa-fw  text-gray-400"></i>&nbsp;<?php echo e(__('generic.exit')); ?></a>
                                </div>
                        </div>
                        
                    <?php else: ?>
                     <a  class="btn btn-outline-primary text-dark ml-auto " value="ورود" name="btnLogin" href="<?php echo e(route('login')); ?>"><?php echo e(__('generic.login')); ?></a>
                   <?php endif; ?>
                </div>
                <div class="divider" style="padding: 13px;"></div>
                <a href="/sabadKharid">
                 <div class="d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
                            <span class="d-xl-flex justify-content-xl-center align-items-xl-center"><span
                                    class="badge badge-pill badge-success "
                                    style="z-index: 5;"><?php echo e((session('numCart')) ?? '0'); ?></span><i
                                    class="icon ion-ios-cart-outline"
                                    style="font-size: 60px;color: rgb(0,0,0);width: 60px;"></i></span><span
                        class="text-danger"> <?php echo e(__('generic.bag_cart')); ?></span>
                  </div>
                </a>
            </div>

        </div>
    </div>
</div>

 <nav class="navbar navbar-expand-md navbar-light sticky-top">

	  <!-- Toggler/collapsibe Button -->
	<button  type="button" class="navbar-toggler"  data-toggle="collapse" data-target="#menu1">
    	<span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="menu1">

     	<!-- navbar -->
        <ul class="navbar-nav nav-pills">
            <?php

            ?>
            <?php $__currentLoopData = $root; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        	<li class="nav-item dropdown position-static">
            	<a class="nav-link"  <?php if($item->name == __('generic.home')): ?> href="/" <?php else: ?> href="/product/catagory/<?php echo e($item->name); ?>" <?php endif; ?> id="menu1dropdown">
                  
                   <?php echo e($item->getTranslatedAttribute('name')); ?>

                </a>
                <?php
                    $id = $item->id;

                    $cat1 = $catagories->filter(function ($value,$key) use($id){
                                   return $value->parent_id == $id;
                    });
                    $countItemCate1 = $cat1->count() ;
                    if($countItemCate1 == 0)
                        $col = 12;
                    else
                          $col = (12 / $countItemCate1);
                ?>
                <?php if($countItemCate1 > 0): ?>


                        <div class="dropdown-menu w-100 dropdown-menu-right mt-n2" >
                            <div class="container-fluid">
                                <div class="row ">
                            <?php $__currentLoopData = $cat1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemcat1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<div class="col-<?php echo e($col); ?> p-1">
                            	<a href="/product/catagory/<?php echo e($item->name); ?>/catagory/<?php echo e($itemcat1->name); ?>" style="text-decoration: none"><h6 class="dropdown-header text-center"><?php echo e($itemcat1->name); ?></h6></a>
                                <div class="dropdown-divider"></div>
                                <?php
                                    $id = $itemcat1->id;
                                  $cat2 = $catagories->filter(function ($value,$key) use($id){
                                                   return $value->parent_id == $id;
                                                              });
                                  ?>
                                <?php $__currentLoopData = $cat2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            	  <a class="dropdown-item  text-center"  href="/product/catagory/<?php echo e($item->name); ?>/catagory/<?php echo e($itemcat1->name); ?>/catagory/<?php echo e($cat2->name); ?>"><?php echo e($cat2->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                             </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </div>
                       </div>
                    </div>
                <?php endif; ?>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item">
                <a class="nav-link" href="/contact-us"><?php echo e(__('generic.contact_us')); ?></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/about-us"><?php echo e(__('generic.about_us')); ?></a>
            </li>
        </ul>
     </div>
</nav>














  <script type="text/javascript">


// code of button for go to top of page site
var speed=250;
var offset = 150;
var duration = 500;
$(window).scroll(function(){
	if ($(this).scrollTop()<offset)
	{
		$('.btndowntoup').fadeOut(duration);
	}
	else
	{
		$('.btndowntoup').fadeIn(duration);
	}
	});
	$('btndowntoup').on('click',function(){

		$('html,body').animate({scrollTop:0},speed);
		return false;
		});


new WOW().init();
 </script>
<?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/header.blade.php ENDPATH**/ ?>