

                    <!-- form start -->
                    <form role="form" class="form-edit-add" action="http://shop-laravel.com//products/save2" method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->

                        <!-- CSRF TOKEN -->
                        <?php echo csrf_field(); ?>



                            <div class="col-md-12 ">

                                <?php echo $__env->make('filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>


                        <div class="panel-footer">
                            <button type="submit" class="btn btn-danger save">ذخیره</button>
                        </div>
                    </form>




<?php /**PATH F:\xampp\htdocs\shop-laravel\resources\views/radion.blade.php ENDPATH**/ ?>