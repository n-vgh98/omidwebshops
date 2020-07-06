<?php
    if(session()->has('locale') )
    {
        App::setLocale(session('locale'));
    }
    $isModelTranslatable = true;
?>
<?php $__env->startSection('page_title',__('product.add_new_product')); ?>
<?php $__env->startSection('page_header'); ?>
   <h3 class="text-center"><?php echo e(__('product.add_new_product')); ?></h3>
   <?php echo $__env->make('voyager::multilingual.language-selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form  method="post" action="/admin/productsContinue"   enctype="multipart/form-data"  class="form-edit-add">
                        <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
                        <?php echo csrf_field(); ?>

                        <div class="panel-body">

                            <div class="form-group  col-md-12 ">

                                <label class="control-label" for="name"><?php echo e(__('product.name_product')); ?></label>

                                <span class="language-label js-language-label badge badge-danger"></span>
                                <input type="hidden"
                                       data-i18n="true"
                                       name="name_i18n"
                                       id="name_i18n"
                                       <?php if(!empty(session()->getOldInput('name_i18n') )): ?>
                                       value="<?php echo e(session()->getOldInput('name_i18n')); ?>"
                                       <?php else: ?>
                                       value="<?php echo e(get_field_translations(New \App\Product(), 'name')); ?>"
                                    <?php endif; ?>>
                                <input required="" type="text" class="form-control" name="name" placeholder=" <?php echo e(__('product.name_product')); ?>" value="">
                            </div>
                            <!-- GET THE DISPLAY OPTIONS -->

                            <div class="form-group  col-md-12 "  >
                                <div id="wrapper">
                               

                                    <span style="font-size: small" class="bg-info"><?php echo e(__('product.help_select_image')); ?></span>
                                    <div>
                                        <input type="button" class="btn btn-secondary" name="btnuploadimage" id="btnuploadimage1" value="<?php echo e(__('product.select').' ' .__('product.master_image')); ?>">
                                        <span id="tasvir1" class="bg-success" style="margin-right:8px"></span>
                                        <span id="del1"  style="margin-right:8px"></span>
                                    </div>
                                    <div>
                                        <input type="button" class="btn btn-secondary" name="btnuploadimage" id="btnuploadimage2" value="<?php echo e(__('product.select').' ' .__('product.image')); ?> 2">
                                        <span id="tasvir2" class="bg-success" style="margin-right:8px"></span>
                                        <span id="del2"  style="margin-right:8px"></span>
                                    </div>
                                    <div>
                                        <input type="button" class="btn btn-secondary" name="btnuploadimage" id="btnuploadimage3" value="<?php echo e(__('product.select').' ' .__('product.image')); ?> 3">
                                        <span id="tasvir3" class="bg-success" style="margin-right:8px"></span>
                                        <span id="del3"  style="margin-right:8px"></span>
                                    </div>
                                    <div>
                                        <input type="button" class="btn btn-secondary" name="btnuploadimage" id="btnuploadimage4" value="<?php echo e(__('product.select').' ' .__('product.image')); ?> 4">
                                        <span id="tasvir4" class="bg-success" style="margin-right:8px"></span>
                                        <span id="del4"  style="margin-right:8px"></span>
                                    </div>


                                    <input  type="file" id="fileuploadimage1" name="image[]" accept="image/*"  style="display:none" >
                                    <input  type="file" id="fileuploadimage2" name="image[]" accept="image/*"  style="display:none" >
                                    <input  type="file" id="fileuploadimage3" name="image[]" accept="image/*"  style="display:none" >
                                    <input  type="file" id="fileuploadimage4" name="image[]" accept="image/*"  style="display:none" >
                                </div>
                            </div>
                            <!-- GET THE DISPLAY OPTIONS -->

                            <div class="form-group  col-md-12 ">

                                <label class="control-label" for="name"><?php echo e(__('generic.price')); ?>(<?php echo e(__('generic.vahed_pool')); ?>)</label>
                                <input required="" type="text" class="form-control" name="price" placeholder="<?php echo e(__('generic.price')); ?>" value="" id="price" onkeyup="separateNum(this.value,this);">
                            </div>
                            <!-- GET THE DISPLAY OPTIONS -->

                            <div class="form-group  col-md-12 ">

                                <label class="control-label" for="name"><?php echo e(__('generic.discount')); ?> <?php echo e(__('generic.discount')); ?></label>
                                <input  type="text" class="form-control" name="takhfif" placeholder="<?php echo e(__('product.persent')); ?> <?php echo e(__('generic.discount')); ?>" value="">
                            </div>


                            <div class="form-group  col-md-12 ">

                                <label class="control-label" for="name"><?php echo e(__('product.catagory1')); ?></label>
                                <select class="form-control select2 select2-hidden-accessible" name="catagory1" id="catagory1"  tabindex="-1" aria-hidden="true">

                                    <?php $__currentLoopData = $catagory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($cat1->parent_id ==null): ?>
                                            <option value="<?php echo e($cat1->id); ?>" ><?php echo e($cat1->getTranslatedAttribute('name')); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!-- GET THE DISPLAY OPTIONS -->

                            <div class="form-group  col-md-12 ">

                                <label class="control-label" for="name"><?php echo e(__('product.catagory2')); ?></label>

                                <select id="catagory2" class="form-control select2 select2-hidden-accessible" name="catagory2"  tabindex="-1" aria-hidden="true">
                                   <?php
                                        $objid = $catagory->first();
                                        $id = $objid->id;
                                        $parentid = $objid->parent_id;
                                        $first=true;
                                   ?>
                                    <?php $__currentLoopData = $catagory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($cat2->parent_id ==$id): ?>
                                            <?php if($first) $id3 = $cat2->id;$first=false; ?>
                                            <option value="<?php echo e($cat2->id); ?>"><?php echo e($cat2->getTranslatedAttribute('name')); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!-- GET THE DISPLAY OPTIONS -->

                            <div class="form-group  col-md-12 ">

                                <label class="control-label" for="name"><?php echo e(__('product.catagory3')); ?></label>


                                <select id="catagory3" class="form-control select2 select2-hidden-accessible" name="catagory3"  tabindex="-1" aria-hidden="true">

                                    <?php $__currentLoopData = $catagory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($cat3->parent_id ==$id3): ?>
                                            <option value="<?php echo e($cat3->id); ?>"><?php echo e($cat3->getTranslatedAttribute('name')); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>



                            <div class="form-group  col-md-12 ">

                                <span class="language-label js-language-label badge badge-danger"></span>
                                <input type="hidden"
                                       data-i18n="true"
                                       name="company_i18n"
                                       id="company_i18n"
                                       <?php if(!empty(session()->getOldInput('company_i18n') )): ?>
                                       value="<?php echo e(session()->getOldInput('company_i18n')); ?>"
                                       <?php else: ?>
                                       value="<?php echo e(get_field_translations(New \App\Product(), 'company')); ?>"
                                    <?php endif; ?>>
                                <label class="control-label" for="name"><?php echo e(__('generic.company')); ?></label>

                                <input  type="text" class="form-control" name="company" placeholder="<?php echo e(__('generic.company')); ?>" value="">
                            </div>
                            <!--
                            <div class="form-group  col-md-12 ">

                                <label class="control-label" for="name">درباره محصول</label>
                                <input  type="text" class="form-control" name="aboutProduct" placeholder="درباره محصول" value="">
                            </div>
                            -->
                            <!-- GET THE DISPLAY OPTIONS -->

                            <div class="form-group  col-md-12 ">

                                <label class="control-label" for="name"><?php echo e(__('generic.number')); ?> <?php echo e(__('product.available')); ?></label>
                                <input type="text" class="form-control" name="available" placeholder="<?php echo e(__('generic.number')); ?> <?php echo e(__('product.available')); ?>" value="" required>
                            </div>

                            <div class="form-group  col-md-12 ">
                                <span class="language-label js-language-label badge badge-danger"></span>
                                <input type="hidden"
                                       data-i18n="true"
                                       name="featuers_i18n"
                                       id="featuers_i18n"
                                       <?php if(!empty(session()->getOldInput('featuers_i18n') )): ?>
                                       value="<?php echo e(session()->getOldInput('featuers_i18n')); ?>"
                                       <?php else: ?>
                                       value="<?php echo e(get_field_translations(New \App\Product(), 'featuers')); ?>"
                                    <?php endif; ?>>
                                <label class="control-label" for="name"><?php echo e(__('generic.featuers')); ?><span class="bg-info">(<?php echo e(__('product.comment_features')); ?>)</span></label>
                                <textarea name="featuers" class="form-control" rows="6"></textarea>
                            </div>

                            <!--  add to mostpopular products -->
                            <div class="form-group  col-md-12 ">

                                <div class="checkbox">
                                    <label ><input type="checkbox" name="chkmostpopular"  id="chkmostpopular"><strong class="text-danger"><?php echo e(__('product.select_mostpopular_product')); ?></strong></label>
                                    <div>
                                        <input type="button" class="btn btn-secondary" name="btnmostpopular" id="btnmostpopular" value="<?php echo e(__('product.select_image_for_mostpopular')); ?>" style="display: none">
                                        <span id="tasvirmostpopular" class="bg-success" style="margin-right:8px"></span>
                                        <span id="delmostpopular"  style="margin-right:8px"></span>
                                    </div>
                                    <input  type="file" id="filemostpopular" name="mostpopular" accept="image/*"  style="display:none" >
                                </div>
                            </div>
                            <!-- GET filters -->

                            <div class="col-md-12 form-group ">

                               <?php echo $__env->make('filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save px-3"><?php echo e(__('product.next')); ?></button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="http://shop-laravel.com/admin/upload" target="form_target" method="post" enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="products">
                        <input type="hidden" name="_token" value="TNDGbpgBmbqTyrK3ebEe9mwKGENURqthAsZm5uYd">
                    </form>
                </div>
            </div>
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

<?php $__env->stopSection(); ?>
<script src="<?php echo e(asset('style/jquery.min.js')); ?>"></script>
<script type="text/javascript">
    var params = {};
    var $file;

    function deleteHandler(tag, isMulti) {
        return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   'products',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '<?php echo e(csrf_token()); ?>'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
        };
    }
    $(document).ready(function(){
       // $("#fileuploadimage").fileinput();
        $('input[name ="image"] ').val('');
        var storedFiles = []
        $('#catagory2').change(function () {
            var selectedindexcatagory2 = $(this).val();
            console.log("selected index catgory2 is "+selectedindexcatagory2);
            var cat2 =<?php echo $catagory ;?>;
            var option = "";
            if(selectedindexcatagory2) {
                console.log("selected index catgory2 is not null");
                for (var x in cat2)
                    if (cat2[x]['parent_id'] == selectedindexcatagory2)
                        option += "<option value=" + cat2[x]['id'] + ">" + cat2[x]['name'] + "</option>";
            }
            console.log("option is :" +option);
            if(option == "")
            {
                console.log("option is empty");
                $('#catagory3').find('option').remove();
            }
            else
            $('#catagory3').html(option);


        });
        $('#catagory1').change(function () {
             var selectedindexcatagory1 = $(this).val();
            console.log("cat 3 is "+selectedindexcatagory1);
              var cat1 =<?php echo $catagory ;?>;
              var option = "";
              for(var x in cat1)
                  if(cat1[x]['parent_id'] == selectedindexcatagory1)
                      option += "<option value="+cat1[x]['id']+">"+cat1[x]['name']+"</option>";
            $('#catagory2').html(option);
            $('#catagory2').trigger('change');

        });
        // show window of select file whene click button of انتخاب تصویر
        $('#btnuploadimage1').click(function () {
            $('#fileuploadimage1').click();
              // var file1 =$(this).file[0].name;
        });
        $('#fileuploadimage1').change(function () {
              //  window.alert(this.files[0].name);

                var file =this.files[0].name;
              //  var f = this.files[0];
              //  storedFiles.push(f);
             //  window.alert(this.files[0].name);
            //   $('#tasavir').val(storedFiles);


                var close = "<button type='button' name='clos'  id='deletetasvir1' style='border:1px;border-style:solid;border-radius: 50%;margin-right: 8px;background-color: red' title='حذف'>&times;</button>";
                $('#tasvir1').append(file);
                $('#del1').append(close);



        });

        $('#btnuploadimage2').click(function () {
            $('#fileuploadimage2').click();
            // var file1 =$(this).file[0].name;
        });
        $('#fileuploadimage2').change(function () {
            //  window.alert(this.files[0].name);

            var file =this.files[0].name;
            //  var f = this.files[0];
            //  storedFiles.push(f);
            //  window.alert(this.files[0].name);
            //   $('#tasavir').val(storedFiles);
            var close = "<button type='button' name='clos'  id='deletetasvir2' style='border:1px;border-style:solid;border-radius: 50%;margin-right: 8px;background-color: red' title='حذف'>&times;</button>";
            $('#tasvir2').append(file);
            $('#del2').append(close);



        });

        $('#btnuploadimage3').click(function () {
            $('#fileuploadimage3').click();
            // var file1 =$(this).file[0].name;
        });
        $('#fileuploadimage3').change(function () {
            //  window.alert(this.files[0].name);

            var file =this.files[0].name;
            //  var f = this.files[0];
            //  storedFiles.push(f);
            //  window.alert(this.files[0].name);
            //   $('#tasavir').val(storedFiles);
            var close = "<button type='button' name='clos'  id='deletetasvir3' style='border:1px;border-style:solid;border-radius: 50%;margin-right: 8px;background-color: red' title='حذف'>&times;</button>";
            $('#tasvir3').append(file);
            $('#del3').append(close);



        });

        $('#btnuploadimage4').click(function () {
            $('#fileuploadimage4').click();
            // var file1 =$(this).file[0].name;
        });
        $('#fileuploadimage4').change(function () {
            //  window.alert(this.files[0].name);

            var file =this.files[0].name;
            //  var f = this.files[0];
            //  storedFiles.push(f);
            //  window.alert(this.files[0].name);
            //   $('#tasavir').val(storedFiles);
            var close = "<button type='button' name='clos'  id='deletetasvir4' style='border:1px;border-style:solid;border-radius: 50%;margin-right: 8px;background-color: red' title='حذف'>&times;</button>";
            $('#tasvir4').append(file);
            $('#del4').append(close);



        });
        $('#del1').on('click','#deletetasvir1',function () {

            $('#fileuploadimage1').val('');
            $('#tasvir1').html('');
            $('#deletetasvir1').remove();
        });
        $('#del2').on('click','#deletetasvir2',function () {

            $('#fileuploadimage2').val('');
            $('#tasvir2').html('');
            $('#deletetasvir2').remove();
        });
        $('#del3').on('click','#deletetasvir3',function () {

            $('#fileuploadimage3').val('');
            $('#tasvir3').html('');
            $('#deletetasvir3').remove();
        });
        $('#del4').on('click','#deletetasvir4',function () {

            $('#fileuploadimage4').val('');
            $('#tasvir4').html('');
            $('#deletetasvir4').remove();
        });
        $('#createproductform').on('submit',function () {
            var price = $('#price').val();
            price = price.replace(/,\s?/g, "");
           $('#price').val(price);
        });

        $('#btnmostpopular').click(function () {
            $('#filemostpopular').click();
            // var file1 =$(this).file[0].name;
        });
        $('#filemostpopular').change(function () {
            //  window.alert(this.files[0].name);

            var file =this.files[0].name;
            //  var f = this.files[0];
            //  storedFiles.push(f);
            //  window.alert(this.files[0].name);
            //   $('#tasavir').val(storedFiles);
            var close = "<button type='button' name='clos'  id='deletetasvirmostpopular' style='border:1px;border-style:solid;border-radius: 50%;margin-right: 8px;background-color: red' title='حذف'>&times;</button>";
            $('#tasvirmostpopular').append(file);
            $('#delmostpopular').append(close);



        });
        $('#delmostpopular').on('click','#deletetasvirmostpopular',function () {

            $('#filemostpopular').val('');
            $('#tasvirmostpopular').html('');
            $('#delmostpopular').remove();
        });

        if( $('#chkmostpopular').prop('checked') ==true)
        {
            $('#btnmostpopular').css('display','inline-block');
        }


        $('#chkmostpopular').change(function () {
                if(this.checked)
                {
                    $('#btnmostpopular').css('display','inline-block');
                }
                else
                {
                    $('#btnmostpopular').css('display','none');
                }

        });
        $('.toggleswitch').bootstrapToggle();

        //Init datepicker for date fields if data-datepicker attribute defined
        //or if browser does not handle date inputs
        $('.form-group input[type=date]').each(function (idx, elt) {
            if (elt.hasAttribute('data-datepicker')) {
                elt.type = 'text';
                $(elt).datetimepicker($(elt).data('datepicker'));
            } else if (elt.type != 'date') {
                elt.type = 'text';
                $(elt).datetimepicker({
                    format: 'L',
                    extraFormats: [ 'YYYY-MM-DD' ]
                }).datetimepicker($(elt).data('datepicker'));
            }
        });

        <?php if($isModelTranslatable): ?>
        $('.side-body').multilingual({"editing": true});
        <?php endif; ?>

        $('.side-body input[data-slug-origin]').each(function(i, el) {
            $(el).slugify();
        });

        $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
        $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
        $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
        $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

        $('#confirm_delete').on('click', function(){
            $.post('<?php echo e(route('voyager.'.'products'.'.media.remove')); ?>', params, function (response) {
                if ( response
                    && response.data
                    && response.data.status
                    && response.data.status == 200 ) {

                    toastr.success(response.data.message);
                    $file.parent().fadeOut(300, function() { $(this).remove(); })
                } else {
                    toastr.error("Error removing file.");
                }
            });

            $('#confirm_delete_modal').modal('hide');
        });
        $('[data-toggle="tooltip"]').tooltip();


    });
    function separateNum(value, input) {
        /* seprate number input 3 number */


        var nStr = value + '';
        nStr = nStr.replace(/\,/g, "");
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        if (input !== undefined) {

            input.value = x1 + x2;
        } else {
            return x1 + x2;
        }
    }



</script>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/createProduct.blade.php ENDPATH**/ ?>