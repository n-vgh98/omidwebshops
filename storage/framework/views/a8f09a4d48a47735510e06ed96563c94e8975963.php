<?php $__env->startSection('title', $catagory[0]['cat1'] ?? ''); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="empty my-5">

            </div>
            <div class="col-10">
                <?php if($products->count()>0): ?>

                <div class="d-flex bg-white flex-wrap">
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="m-2">
                        <div class="card rounded-0 productSimiler " >
                            <a  href="/detailProduct/<?php echo e($pro->id); ?>"  class="text-decoration-none ">

                                <div class="text-right card-content "><img class="img-fluid  d-block mx-auto"   src="<?php echo e(asset('storage/products/'.($pro->productimages()->first())['image']  )); ?>">
                                    <h5 class="text-center p-1"><?php echo e($pro->name); ?> </h5>
                                    <div class="btn-wrapper text-center">
                                        <span class="text-center text-danger">
                                             قیمت : <?php echo e(number_format($pro->price)); ?> تومان</span>
                                            <?php if($pro->available >0): ?>

                                        <div class="text-success">
                                            <img src="<?php echo e(asset('storage/exists.png')); ?>">
                                        </div>
                                            <?php else: ?>
                                               <div> <span class="text-danger">ناموجود</span></div>
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
    </div>
    <!--
    <div class="mt-3 bg-white">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">قبلی</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">بعدی</a></li>
        </ul>
    </div>
    -->
    <?php else: ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                   <div class="jumbotron bg-info mt-5">
                       <p class="text-dark text-center ">محصولی  وجود ندارد</p>
                   </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php echo $__env->make('ersal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $(':checkbox').change(function () {
                if (this.checked ){
                    var currenturl = "<?php echo e(url()->current()); ?>";
                    var currentfullurl="<?php echo e(url()->full()); ?>";
                 //   window.alert(currenturl);
                    if(currenturl == currentfullurl)
                    {
                        window.location = currenturl+"?"+this.name +"="+this.value;
                    }

                    else
                    {
                        currentfullurl = '<?php echo urldecode(url()->full())?>';
                        window.location = currentfullurl+"&"+this.name +"="+this.value;
                    }

                }
                else
                {
                    var hashes=[],hash;
                    var currenturl = "<?php echo e(url()->current()); ?>";
                    currenturl = currenturl+"?";
                    console.log("current url is : " + currenturl);
                    var hashes = window.location.href.slice(window.location.href.indexOf('?')+1).split('&');

                    console.log("lent of curl item is : " + hashes.length);
                    for(var i=0 ; i< hashes.length ; i++)
                    {
                        hash = hashes[i].split('=');
                        if(decodeURI(hash[1]) != this.value)
                        {
                            currenturl +=hashes[i];
                            if(i != hashes.length-1)
                                currenturl+="&";
                            console.log("in iterate " + i +"is : " + hash[1] + "and this value is :" + this.value);
                        }

                        console.log("current url in "+ i+" is:" +currenturl);


                    }
                    window.location = currenturl;
                   // console.log("current url in "+ i+" is:" +currenturl);
                }

            });

            // change range of price controll
            $('#customrangeprice').change(function () {
                var range = $('#customrangeprice').val();
                var currenturl = "<?php echo e(url()->current()); ?>";
                var currentfullurl="<?php echo e(url()->full()); ?>";
                //   window.alert(currenturl);
                if(currenturl == currentfullurl)
                {
                    window.location = currenturl+"?"+this.name +"="+this.value;
                }

                else
                {
                    var hashes=[],hash;
                    var currenturl = "<?php echo e(url()->current()); ?>";
                    currenturl = currenturl+"?";

                    var hashes = window.location.href.slice(window.location.href.indexOf('?')+1).split('&');
                    console.log("lent of rang is :" +hashes.length);
                    for(var i=0 ; i< hashes.length ; i++) {
                        hash = hashes[i].split('=');
                        if (hash[0] != this.name) {
                            currenturl += hashes[i];
                            if (i != hashes.length - 1 && hash[0]!='')
                                currenturl += "&";

                        }
                    }
                   // currentfullurl = '<?php echo urldecode(url()->full())?>';
                    window.location = currenturl+"&"+this.name +"="+this.value;
                }
            });
        });
        function  search()
        {
       // $('#customrangeprice').e
         //   var range = $('#customrangeprice').val();

         //  cu =  currentUrl +"?range="+range+"&brand="+brand;
         //  window.location = cu;


        }

        <?php if(isset($selectedBrand )): ?>
            var i='<?php echo e($selectedBrand ?? ''); ?>';
      $('#brandSelect option').filter(function () {
            return $(this).text() == i;
      }).attr('selected',true);
        <?php endif; ?>
        <?php if(isset($OldValueOfrange)): ?>
        $('#customrangeprice').val(<?php echo e($OldValueOfrange); ?>);

        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/search.blade.php ENDPATH**/ ?>