<?php
//$filter = \App\Filter::all();
//$filter->load('translations');
$productfilters->load('translations');
$sameproducts->load('translations');
?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('contents/library/slick/slick.css')); ?>"/>
    <!-- Add the new slick-theme.css if you want the default styling  -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('contents/library/slick/slick-theme.css')); ?>"/>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title',__("footer.tilte_us")); ?>
    <div class="container bg-white">
        <div class="row mt-2">
            <div class="col-12 ">
                <div class="row">
                    <div class="col-10 mt-2 text-center mt-1">
                        <h6><?php echo e($product->getTranslatedAttribute('name')); ?></h6>
                        <hr>
                    </div>
                    <div class="col-2 mt-2">
                        <a href="">
                            <?php if(isset($brand)): ?>
                           <img src="<?php echo e(asset('storage/'.$brand->imageBrand)); ?>" class="img-fluid" alt="برند محصول" >
                                <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-5 ">
               <div class="mx-auto">
                   <img class="img-fluid d-block mx-auto" src="<?php echo e(asset('storage/products/'.$product->productimages()->first()['image'])); ?> "  align="کرم درست و صورت"id="orginalimagezoomed" data-zoom-image="<?php echo e(asset('storage/products/large/'.$product->productimages()->first()['image'])); ?>"/>
               </div>
                <div class="d-flex justify-content-center flex-wrap my-2" id="thumbnailimageblock">

                    <?php $__currentLoopData = $product->productimages()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div >
                           <a href="#" data-image="<?php echo e(asset('storage/products/'.$proimg->image)); ?>" data-zoom-image="<?php echo e(asset('storage/products/large/'.$proimg->image)); ?>" >
                               <img src="<?php echo e(asset('storage/products/'.$proimg->image)); ?>" width="60px" height="60px"  style="border:2px solid white;" id="orginalimagezoomed"/>
                           </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="col-md-3 ">
                <div>
                   <?php echo e(__('generic.country')); ?>:<?php echo e($product->country ?$product->getTranslatedAttribute('country') : ' ----'); ?>

                </div>
                <div><?php echo e(__('generic.company')); ?> :
                    <?php echo e($product->getTranslatedAttribute('company')); ?>


                </div>
            </div>

            <div class="col-md-4  p-2">
             <div class="border border-secondary">
                 <h4><?php echo e(__('generic.featuers')); ?> <?php echo e(__('generic.product')); ?></h4>
                 <ul class="" style="list-style-type: disc;<?php if(__('generic.is_rtl') == 'true'): ?> margin-right: 20px <?php else: ?> margin-left: 20px <?php endif; ?> " >

                     <?php
                         if($product->featuers){
                              $features = explode("\n",$product->getTranslatedAttribute('featuers') );

                             foreach ($features as $f)
                                 echo "<li>$f</li>";
                          }
                     ?>
                 </ul>
             </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h6 class="text-center"><?php echo e(__('generic.price')); ?> :<small class="tymon-delete"><del class="text-danger"><?php echo e(number_format( $product->price )); ?></del></small>  <?php echo e(number_format(  $product->price -(($product->price * $product->takhfif)/100)  )); ?> <?php echo e(__('generic.vahed_pool')); ?> </h6>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12 text-center">
                <a <?php if($product->available > 0 ): ?> href="/add/cart/<?php echo e($product->id); ?>" <?php else: ?> href ="" <?php endif; ?> class="btn btn-danger mb-2" >
                    <span class="fa fa-shopping-basket"></span>
                    <?php echo e(__('generic.add_to_card')); ?></a>
            </div>
        </div>
    </div>


<ul class="nav nav-tabs mt-4">
    <li class="nav-item ">
        <a class="nav-link bg-light p-3 active" href="#takmili" data-toggle="tab"><?php echo e(__('generic.extera_information')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link p-3" data-toggle="tab" href="#aboutproduct"><?php echo e(__('generic.about')); ?> <?php echo e(__('generic.product')); ?></a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-3" data-toggle="tab" href="#nazarat"> <?php echo e(__('generic.comment_users')); ?></a>
    </li>
</ul>

<!-- tab pan -->
<div class="tab-content bg-white mx-5">
    <div class="tab-pane active " id="takmili">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                <?php $__currentLoopData = $productfilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profilter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $filterName = \App\Filter::where('name',$profilter->filterName)->get();
                       $f = $filterName[0]->getTranslatedAttribute('name');
                       $filtervalue = \App\Filtervalue::where('value',$profilter->filterValue)->get();
                       if(count($filtervalue) > 0)
                            $fv = $filtervalue[0]->getTranslatedAttribute('value') ;
                       else
                           $fv = $profilter->filterValue;

                    ?>
                    <tr>
                        <td><?php echo e($f); ?></td>
                        <td><?php echo e($fv); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane  " id="aboutproduct">
        <div class="card">

            <div class="card-body">
                <p>
                    <?php echo $product->getTranslatedAttribute('aboutProduct'); ?>

                </p>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="nazarat">
        <div class="container">

            <form method="post" action="/addComment/<?php echo e($product->id); ?>" onsubmit="return showMessage()">
                <?php echo csrf_field(); ?>
                <h4 class="text-center pt-2"> <?php echo e(__('generic.comment_users')); ?></h4>
                <h6 class="text-center"><?php echo e(__('generic.write_your_comment')); ?></h6>

                <?php if(\Illuminate\Support\Facades\Auth::check()): ?>
                    <div class="form-group mt-5"><textarea class="form-control mr-4" name="message" placeholder="<?php echo e(__('generic.write_comment')); ?>" required></textarea></div>
                    <div class="form-group "><input  class="btn btn-primary" value="<?php echo e(__('generic.send_comment')); ?>" type="submit" ></div>
            </form>
            <?php else: ?>
                <div class="jumbotron">
                    <p><?php echo e(__('generic.login_to_write_comment')); ?></p>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><?php echo e(__('generic.login')); ?></a>
                </div>
            <?php endif; ?>


            <hr>
            <?php if($product->comments->count()==0): ?>
                <p><?php echo e(__('generic.no_comment_registerd')); ?></p>
            <?php endif; ?>
            <form>
                <?php $__currentLoopData = $product->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($comment->status == 1): ?>
                        <div class="karbar_nazar my-2">
                            <h4><?php echo e($comment->name); ?></h4>
                            <h6><?php echo e($comment->comment); ?></h6>
                            <input type="submit" name="replay_comment" value="<?php echo e(__('generic.replay')); ?>" class="btn btn-outline-primary ">
                        </div>
                        <hr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </div>
    </div>

<div class="card mt-3">
    <div class="card-header aboutProductCard"> <?php echo e(__('generic.same_products')); ?> </div>
    <div class="card-body ">
        <!--
        <div class="row bazaar product-slider">
            <div class="col-lg-3 ">
                <div class="card rounded-0 productSimiler " >
                    <a href="#" class="text-decoration-none ">

                        <div class="text-right card-content "><img class="img-fluid  d-block mx-auto"  src="/images/mashillebas.PNG">
                            <h5 class="text-center p-1"> رژگونه کاپریس </h5>
                            <div class="btn-wrapper text-center">
                             <span class="text-center"> 53,500 تومان</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        -->



        <div class="d-flex bg-white  justify-content-around sameproducts">
            <?php $__currentLoopData = $sameproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="m-2 ">
                    <div class="card rounded-0   " >
                        <a  href="/detailProduct/<?php echo e($pro->id); ?>"  class="text-decoration-none ">

                            <div class="text-right card-content ">
                                <img class="img-fluid  d-block mx-auto"   src="<?php echo e(asset('storage/products/'.($pro->productimages()->first())['image']  )); ?>">
                                <h5 class="text-center p-1"><?php echo e($pro->getTranslatedAttribute('name')); ?> </h5>
                                <div class="btn-wrapper text-center">
                                        <span class="text-center text-danger">
                                             <?php echo e(__('generic.price')); ?> : <?php echo e(number_format($pro->price)); ?> <?php echo e(__('generic.vahed_pool')); ?></span>
                                    <?php if($pro->available >0): ?>

                                        <div class="text-success">
                                            <img src="<?php echo e(asset('storage/exists.png')); ?>">
                                        </div>
                                    <?php else: ?>
                                        <div> <span class="text-danger"><?php echo e(__('generic.not_available')); ?></span></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</div>
<!--   tab of detail product     -->

    <script type="text/javascript" src="<?php echo e(asset('contents/library/slick/slick.min.js')); ?>"></script>
<?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script type="text/javascript">
            function  showMessage()
            {
                window.alert('<?php echo e(__('generic.tank_for_comment')); ?>');
            }

            // zoom image in detail product
            function mouseenterimage() {
               var demisition = $('#imageProduct').getBoundingClientRect();
               console.log('top is :'+demisition.top + 'left corner is :' + demisition.top);
            }
            function mouseLeaveImage() {
                $('#imageProduct').css('width',"auto");
            }
$(document).ready(function () {
    $('#thumbnailimageblock a').click(function (event) {
        event.preventDefault();
        var h = $(this).attr("href");
        $('#orginalimagezoomed').attr("src",h);

    });
  //  $("#orginalimagezoomed").elevateZoom();



//initiate the plugin and pass the id of the div containing gallery images
    $("#orginalimagezoomed").elevateZoom({gallery:'thumbnailimageblock', cursor: "crosshair", galleryActiveClass: 'active', imageCrossfade: true,zoomWindowPosition:10 });

//pass the images to Fancybox
    $("#orginalimagezoomed").bind("click", function(e) {
        var ez =   $('#orginalimagezoomed').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });
    $('.sameproducts').slick({
        slidesToShow: <?php  if(count($sameproducts) >3 ) echo "3" ; else echo "1"?>,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots : true ,
        arrows: true,
        adaptiveHeight : true ,
        rtl : <?php if(__('generic.is_rtl') == 'true'): ?> true , <?php else: ?> false , <?php endif; ?>
        mobileFirst : true ,

    });



});
        </script>
        <script src="<?php echo e(asset('style/jquery.elevateZoom-3.0.8.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/detailProduct.blade.php ENDPATH**/ ?>