<?php
    if(session()->has('locale') )
    {
        App::setLocale(session('locale'));
    }
    $isModelTranslatable = true;
?>
<?php $__env->startSection('page_title',__('product.about_product')); ?>
<?php $__env->startSection('page_header'); ?>

   <h3 class="text-center"> <?php echo e(__('product.about_product')); ?></h3>
   <div class="language-selector-about " style="text-align: <?php echo e(__('generic.is_rtl') == 'true' ? 'left' : 'right'); ?>">
       <div class="btn-group btn-group-sm" role="group" data-toggle="">
           <?php $__currentLoopData = config('voyager.multilingual.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <label class="btn btn-primary<?php echo e(($lang === config('voyager.multilingual.default')) ? " active focus" : ""); ?>">
                   <input type="radio" class="hide" name="i18n_selector" id="<?php echo e($lang); ?>" autocomplete="off"<?php echo e(($lang === config('voyager.multilingual.default')) ? ' checked="checked"' : ''); ?> > <?php echo e(strtoupper($lang)); ?>

               </label>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
   </div>
   <?php if($errors->any()): ?>
       <div class="alert alert-danger">
           <ul>
               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><?php echo e($error); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </ul>
       </div>
   <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <form  method="post" action="/admin/products"   enctype="multipart/form-data" id="createproductform" class="form-edit-add">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="name" value="<?php echo e($name); ?>">
                <input type="hidden" name="name_i18n" value="<?php echo e($name_i18n); ?>">
                <?php $__currentLoopData = $path_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="image[]" value="<?php echo e($i); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="price" value="<?php echo e($price); ?>">
                <input type="hidden" name="takhfif" value="<?php echo e($takhfif); ?>">
                <input type="hidden" name="catagory1" value="<?php echo e($catagory1); ?>">
                <input type="hidden" name="catagory2" value="<?php echo e($catagory2); ?>">
                <input type="hidden" name="catagory3" value="<?php echo e($catagory3); ?>">
                <input type="hidden" name="company_i18n" value="<?php echo e($company_i18n); ?>">
                <input type="hidden" name="company" value="<?php echo e($company); ?>">
                <input type="hidden" name="available" value="<?php echo e($available); ?>">
                <input type="hidden" name="featuers_i18n" value="<?php echo e($featuers_i18n); ?>">
                <input type="hidden" name="featuers" value="<?php echo e($featuers); ?>">
                <?php if(isset($path_mostpopular)): ?>
                    <input type="hidden" name="chkmostpopular" value="<?php echo e($chkmostpopular); ?>">
                    <input type="hidden" name="mostpopular" value="<?php echo e($path_mostpopular); ?>">
                <?php endif; ?>
                 <?php if(isset($filter ) ): ?>
                        <?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="filter[]" value="<?php echo e($fi); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <?php $__currentLoopData = $filtervalues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fi => $fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $fval; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <input type="hidden" name="<?php echo e($a); ?>" value="<?php echo e($b); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="col-md-12">
                    <span class="language-label js-language-label badge badge-danger"></span>
                    <input type="hidden"
                           data-i18n="true"
                           name="aboutProduct_i18n"
                           id="aboutProduct_i18n"
                           <?php if(!empty(session()->getOldInput('aboutProduct_i18n') )): ?>
                           value="<?php echo e(session()->getOldInput('aboutProduct_i18n')); ?>"
                           <?php else: ?>
                           value="<?php echo e(get_field_translations(New \App\Product(), 'aboutProduct')); ?>"
                        <?php endif; ?>>
                        <textarea id="ckeckditor1" name="aboutProduct" class="form-control" >
                                    <?php echo e(session('aboutproducts')); ?>

                        </textarea>
                </div>

            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-primary " name="savecountinue" value="<?php echo e(__('generic.save')); ?>">
            </div>
            </form>
        </div>
    </div>
    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i><?php echo e(__('product.is_sure')); ?></h4>
                </div>

                <div class="modal-body">
                    <h4><?php echo e(__('product.delete_sure')); ?><span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('product.cancel')); ?></button>
                    <button type="button" class="btn btn-danger" id="confirm_delete"><?php echo e(__('product.yes_delete')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('style/ckeditor/ckeditor.js')); ?>"></script>

    <script type="text/javascript">
       // CKEDITOR.replace( 'ckeckditor1' );
        CKEDITOR.replace('aboutProduct', {
            language : '<?php echo e(__('generic.is_rtl') == 'true' ? 'fa' : 'en'); ?>' ,
        });

    </script>
<?php $__env->stopSection(); ?>

    <script src="<?php echo e(asset('style/jquery.min.js')); ?>"></script>

<?php $__env->startSection('javascript'); ?>
    <script>


        $('document').ready(function () {


            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs


      //      $('.side-body').multilingual({"editing": true});



            // ckeditor

            function  returnLocale() {
                return 	$(":radio").filter(function() {
                    return $(this).parent().hasClass('active');
                }).prop('id');
            }
            function setup() {
                $('.js-language-label').text(returnLocale());
                myObj = {'fa' : '' , 'en' : ''};
                var myJSON = JSON.stringify(myObj);
                $('#aboutProduct_i18n').val(myJSON);
            }
        setup();
          //  window.alert("text" + $('textarea[name=DSC]').text());
            $(':radio').click(function () {
                if($(this).parent().hasClass('active')) return ;
                    var lang = $(this).attr('id');
                   $(':radio').parent().removeClass('active');
                $(':radio').parent().removeClass('focus');
                   $(this).parent().addClass('active');
                $(this).parent().addClass('focus');
                    dataofckeditor =   CKEDITOR.instances['ckeckditor1'].getData();
                    $('.js-language-label').text(lang);
                    var aboutproductvalue = $('#aboutProduct_i18n').val();
                    var aboutproductvalue = JSON.parse(aboutproductvalue);
                    var myObj;
                if(lang == 'en')
                    {
                        myObj = {'fa' : dataofckeditor , 'en' : aboutproductvalue.en};
                        CKEDITOR.instances.ckeckditor1.setData(aboutproductvalue.en ,function () {
                            this.checkDirty();
                        } );
                    }

                    else
                    {
                        myObj = {'fa' : aboutproductvalue.fa , 'en' : dataofckeditor};
                        CKEDITOR.instances.ckeckditor1.setData(aboutproductvalue.fa ,function () {
                            this.checkDirty();
                        });

                    }
                var jsonString = JSON.stringify(myObj);
                $('#aboutProduct_i18n').val(jsonString);



            });
            $('.form-edit-add').submit(function (e) {
                $(':radio').each(function () {
                    if($(this).parent().hasClass('active') )
                    {
                        var lang = $(this).attr('id');
                        dataofckeditor =   CKEDITOR.instances['ckeckditor1'].getData();
                        var aboutproductvalue = $('#aboutProduct_i18n').val();
                        var aboutproductvalue = JSON.parse(aboutproductvalue);
                        var myObj;
                        if(lang == 'fa')
                        {
                            myObj = {'fa' : dataofckeditor , 'en' : aboutproductvalue.en};

                        }

                        else
                        {
                            myObj = {'fa' : aboutproductvalue.fa , 'en' : dataofckeditor};

                        }
                        var jsonString = JSON.stringify(myObj);
                        $('#aboutProduct_i18n').val(jsonString);



                    }
                });
                $('.form-control').val(myObj.fa);

            });
        });

    </script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/createProductContinue.blade.php ENDPATH**/ ?>