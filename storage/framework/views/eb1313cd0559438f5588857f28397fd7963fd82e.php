<?php
use App\Brand;
use App\Filter;
use App\Filtervalue;
use App\Product;
use App\Productfilter;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Category;
$catagories = Category::all();
$filters = Filter::all();
$filterValues = Filtervalue::all();
$catagories->load('translations');
$filters->load('translations');
$filterValues->load('translations');
?>
<h3 class="text-success"><?php echo e(__('product.filter_help')); ?></h3>

    <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="container-fluid"  style="font-size: large;border-style: solid;border-color:#0c5460;border-width: 7px ">

                <div class=" row" >
                    <div class="col-sm-12">
                       <div class="checkbox">
                        <label ><input type="checkbox" name="filter[]" value='<?php echo  "$filter->id"; ?>' ><strong class="text-danger"><?php echo e($filter->getTranslatedAttribute('name')); ?> : </strong></label>
                    </div>
                    <?php
                        $id = $filter->id;
                        $filterval = $filterValues->whereIn('filter_id',[$id]);

                    ?>

                    <?php $__currentLoopData = $filterval; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="radio-inline" style="margin-right:20px">

                            <input type="radio" name="<?php echo $filter->id; ?>" value='<?php echo "$fv->value";?>' <?php if($loop->first): ?> checked <?php endif; ?>>
                            <?php echo e($fv->getTranslatedAttribute('value')); ?>

                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                             <div class="form-group">
                                 <label class="radio-inline" style="margin-right:20px">

                                     <input type="radio" name="<?php echo $filter->id; ?>" value=""  id="<?php echo $filter->id; ?>">
                                     <?php echo e(__('product.favoriate')); ?> <input type="text" class="form-control" id="<?php echo 'txtradio'.$filter->id; ?>" onkeyup="addvaluetoradionbutton(<?php echo e($filter->id); ?>)" >
                                 </label>
                             </div>

                </div>

                </div>

        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script>
    function addvaluetoradionbutton(textid)
    {
       if( document.getElementById(textid).checked == true )
           {
               var textfilter = document.getElementById('txtradio'+textid).value;
               document.getElementById(textid).value = textfilter;
              // window.alert( document.getElementById(textid).value);
           }



    }
</script>

<?php /**PATH F:\xampp\htdocs\shop-laravel2lang\resources\views/filters.blade.php ENDPATH**/ ?>