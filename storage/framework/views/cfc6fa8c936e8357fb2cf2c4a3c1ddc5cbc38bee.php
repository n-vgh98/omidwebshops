<?php $__env->startSection('css'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title','ویرایش محصول'); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">

       ویرایش محصول
    </h1>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                          class="form-edit-add"
                          action="<?php echo e(route('voyager.products.update',$id)); ?>"
                          method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <?php echo e(method_field("PUT")); ?>


                    <!-- CSRF TOKEN -->
                        <?php echo e(csrf_field()); ?>


                        <div class="panel-body">

                            <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">نام محصول</label>
                                    <input required="" type="text" class="form-control" name="name" placeholder="نام محصول" value="<?php echo e($data->name); ?>">
                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="container"  id="wrapper"  style="margin-top: 5px ;">
                                    <div class="row">
                                        <legend>تصاویر محصول</legend>
                                        <?php $__currentLoopData = $data->productimages()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-3" style="text-align: center">
                                                <div>
                                                    <img src="<?php echo e(asset('storage/products/'.$img->image)); ?>" width="60px" height="60px" id="image<?php echo e($loop->iteration); ?>">
                                                </div>
                                                <div>
                                                    <button type='button' name='clos' class="btn btn-danger"   id='deletetasvir<?php echo e($loop->iteration); ?>' style='border:1px;border-style:solid;margin-right: 3px;background-color: red;margin-top: 2px;margin-bottom: 2px' title='حذف'>حذف </button>
                                                </div>
                                                <div>
                                                    <input  type="file" id="fileuploadimage<?php echo e($loop->iteration); ?>" name="image[]" accept="image/*"  style="display:none" >
                                                    <input type="hidden" name="oldimage<?php echo e($loop->iteration); ?>" id="oldimage<?php echo e($loop->iteration); ?>" value="1">
                                                    <input type="hidden" name="oldimageid<?php echo e($loop->iteration); ?>" id="oldimageid<?php echo e($loop->iteration); ?>" value="<?php echo e($img->id); ?>">
                                                    <input type="button" class="btn btn-secondary" name="btnuploadimage" id="btnuploadimage<?php echo e($loop->iteration); ?>" value="تغییر تصویر <?php echo e($loop->iteration); ?>">
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $countofimage = $data->productimages()->count();
                                        ?>
                                        <?php for($i=$countofimage+1;$i <= 4 ; $i++): ?>
                                            <div class="col-sm-3" style="text-align: center">
                                                <div>
                                                    <img src="" width="60px"; height="60px" id="image<?php echo e($i); ?>">
                                                </div>
                                                <div>
                                                    <button type='button' name='clos'   id='deletetasvir<?php echo e($i); ?>' style='border:1px;border-style:solid;margin-right: 3px;background-color: red;margin-bottom: 2px;margin-top: 2px' title='حذف'>حذف </button>
                                                </div>
                                                <div>
                                                    <input type="button" class="btn btn-secondary" name="btnuploadimage" id="btnuploadimage<?php echo e($i); ?>" value="انتخاب تصویر <?php echo e($i); ?>">
                                                    <input  type="file" id="fileuploadimage<?php echo e($i); ?>" name="image[]" accept="image/*"  style="display:none" value="">
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>


                                <!-- GET THE DISPLAY OPTIONS -->
                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">قیمت ( تومان )</label>
                                    <input required="" type="text" class="form-control" name="price" placeholder="قیمت ( تومان )" value="<?php echo e($data->price); ?>">
                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">درصد تخفیف</label>
                                    <input  type="text" class="form-control" name="takhfif" placeholder="درصد تخفیف" value="<?php echo e($data->takhfif); ?>">


                                </div>

                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">دسته بندی سطح 1</label>



                                    <select class="form-control select2 select2-hidden-accessible" name="catagory1" id="catagory1"  tabindex="-1" aria-hidden="true">

                                        <?php $__currentLoopData = $catagory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($cat1->parent_id ==null): ?>
                                                <option value="<?php echo e($cat1->id); ?>" <?php if($cat1->name == $data->catagory1){echo 'selected';$id= $cat1->id;} ?>>
                                                    <?php echo e($cat1->name); ?> </option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">دسته بندی سطح 2</label>
                                    <select id="catagory2" class="form-control select2 select2-hidden-accessible" name="catagory2"  tabindex="-1" aria-hidden="true">
                                        <?php
                                            $objid = $catagory->first();
                                            //$id = $objid->id;
                                            $parentid = $objid->parent_id;
                                            $first=true;
                                        ?>
                                        <?php $__currentLoopData = $catagory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($cat2->parent_id ==$id): ?>
                                                <?php if($first) $id3  = $cat2->id;$first=false; ?>
                                                <option value="<?php echo e($cat2->id); ?>" <?php if($cat2->name == $data->catagory2) echo 'selected' ?>><?php echo e($cat2->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">دسته بندی سطح 3</label>


                                        <select id="catagory3" class="form-control select2 select2-hidden-accessible" name="catagory3"  tabindex="-1" aria-hidden="true">

                                            <?php $__currentLoopData = $catagory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($cat3->parent_id ==$id3 ?? ''): ?>
                                                    <option value="<?php echo e($cat3->id); ?>" <?php if($cat3->name == $data->catagory3) echo 'selected' ?>><?php echo e($cat3->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                </div>


                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">شرکت</label>
                                    <input  type="text" class="form-control" name="company" placeholder="شرکت" value="<?php echo e($data->company); ?>">


                                </div>
                                <!-- hidden aboutproduct save for next -->
                                <input type="hidden" name="aboutproduct" value="<?php echo e($data->aboutProduct); ?>">
                                <!-- GET THE DISPLAY OPTIONS -->


                                <!-- GET THE DISPLAY OPTIONS -->
                                <!--
                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">درباره محصول</label>
                                    <input  type="text" class="form-control" name="aboutProduct" placeholder="درباره محصول" value="<?php echo e($data->aboutProduct); ?>">


                                </div>
                                -->



                                <!-- GET THE DISPLAY OPTIONS -->

                                <!-- GET THE DISPLAY OPTIONS -->





                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">تعدا موجود</label>
                                    <input type="text" class="form-control" name="available" placeholder="تعدا موجود" value="<?php echo e($data->available); ?>">


                                </div>

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">ویژگی ها(هر ویژگی را در یک خط وارد کنید.)</label>
                                    <textarea name="featuers" class="form-control" rows="6"><?php echo e($data->featuers); ?></textarea>
                                </div>
                                <!-- GET filters -->

                                <div class="col-md-12 ">

                                     <?php echo $__env->make('voyager::products.filtersEdit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                        </div><!-- panel-body -->


                        <div class="panel-footer">
                            <?php $__env->startSection('submit-buttons'); ?>
                                <button type="submit" class="btn btn-primary save">مرحله بعد</button>
                            <?php $__env->stopSection(); ?>
                            <?php echo $__env->yieldContent('submit-buttons'); ?>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="<?php echo e(route('voyager.upload')); ?>" target="form_target" method="post"
                          enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                               onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="<?php echo e('products'); ?>">
                        <?php echo e(csrf_field()); ?>

                    </form>

                </div>
            </div>
        </div>


    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> <?php echo e(__('voyager::generic.are_you_sure')); ?></h4>
                </div>

                <div class="modal-body">
                    <h4><?php echo e(__('voyager::generic.are_you_sure_delete')); ?> '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                    <button type="button" class="btn btn-danger" id="confirm_delete"><?php echo e(__('voyager::generic.delete_confirm')); ?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
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

        $('document').ready(function () {
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
                if(this.files && this.files[0])
                {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image1').attr("src",e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#oldimage1').val("2");
                }
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
                if(this.files && this.files[0])
                {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image2').attr("src",e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#oldimage2').val("2");
                }
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
                if(this.files && this.files[0])
                {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image3').attr("src",e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#oldimage3').val("2");
                }



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
                if(this.files && this.files[0])
                {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image4').attr("src",e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#oldimage4').val("2");
                }



            });
            $('#deletetasvir1').on('click',function () {

                $('#fileuploadimage1').val('');
                $('#image1').attr("src",'');
                $('#oldimage1').val("2");


            });
            $('#deletetasvir2').on('click',function () {

                $('#fileuploadimage2').val('');
                $('#image2').attr("src",'');
                $('#oldimage2').val("2");

            });
            $('#deletetasvir3').on('click',function () {

                $('#fileuploadimage3').val('');
                $('#image3').attr("src",'');
                $('#oldimage3').val("2");

            });
            $('#deletetasvir4').on('click',function () {

                $('#fileuploadimage4').val('');
                $('#image4').attr("src",'');
                $('#oldimage4').val("2");

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel\vendor\tcg\voyager\src/../resources/views/products/edit-add.blade.php ENDPATH**/ ?>