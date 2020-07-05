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
?>
<h3 class="text-success">ابتدا فیلتر دلخواه برای اعمال را انتخاب و سپس مقدار ان را مشخص کنید.</h3>
<?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="form-group" style="font-size: large;border-style: solid;border-color:#0c5460;border-width: 1px ">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="filter[]" value='<?php echo  "$filter->id"; ?>'
                    <?php
                        $existfilter = 0 ;
                        foreach ($productfilters as $pf)
                        {
                            if($pf->filterName == $filter->name)
                                {
                                     echo 'checked';
                                     $existfilter = 1 ;
                                            break;
                                }
                        }
                    ?>>
                <strong class="text-danger"><?php echo e($filter->name); ?> : </strong>
            </label>

        </div>
        <?php
            $id = $filter->id;
            $filterval = $filterValues->whereIn('filter_id',[$id]);
            $favoriate = 1 ;
            $favoraitevalue = ' ';
        ?>

                <?php $__currentLoopData = $filterval; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="radio-inline" style="margin-right:20px">

                        <input type="radio" name="<?php echo $filter->id; ?>" value='<?php echo "$fv->value";?>'
                            <?php

                                    foreach ($productfilters as $pf)
                                    {
                                        if($pf->filterValue == $fv->value)
                                            {
                                                 echo 'checked';
                                                 $favoriate = 0 ;
                                                        break;
                                            }
                                        $favoraitevalue = $pf->filterValue;
                                    }

                            ?>>

                        <?php echo e($fv->value); ?>

                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group">
            <label class="radio-inline" style="margin-right:20px">

                <input type="radio" name="<?php echo $filter->id; ?>" value=""  id="<?php echo $filter->id; ?>" <?php if($existfilter== 1 && $favoriate == 1 ) echo 'checked'; ?>>
                دلخواه <input type="text" class="form-control" id="<?php echo 'txtradio'.$filter->id; ?>" onkeyup="addvaluetoradionbutton(<?php echo e($filter->id); ?>)" value="<?php if($existfilter== 1 && $favoriate == 1 )if($favoriate ==1 ) echo $favoraitevalue; else echo ''  ?>" >
            </label>
        </div>



    </div>
    <?php
    $favoraitevalue="";
    $favoriate = 0 ;
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script>
    function addvaluetoradionbutton(textid)
    {
        if( document.getElementById(textid).checked == true )
        {
            var textfilter = document.getElementById('txtradio'+textid).value;
            document.getElementById(textid).value = textfilter;

        }



    }
</script>
<?php /**PATH F:\xampp\htdocs\shop-laravel\vendor\tcg\voyager\src/../resources/views/products/filtersEdit.blade.php ENDPATH**/ ?>