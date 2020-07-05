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
<h3 class="text-success">{{__('product.filter_help')}}</h3>
@foreach($filters as $filter)
    <div class="form-group " style="font-size: large;border-style: solid;border-color:#0c5460;border-width: 1px;">
        <div class="checkbox mx-5" >
            <label>
                <input type="checkbox" name="filter[]" value='<?php echo  "$filter->id"; ?>'
                    @php
                        $existfilter = 0 ;
                        foreach ($productfilters as $pf)
                        {
                            if($pf->filterName == $filter->name)
                                {
                                     echo 'checked';
                                     $existfilter = 1 ;

                                }
                        }
                    @endphp>
                <strong class="text-danger">{{$filter->getTranslatedAttribute('name')}} : </strong>
            </label>
        </div>
        @php
            $id = $filter->id;
            $filterval = $filterValues->whereIn('filter_id',[$id]);
            $favoriate = 1 ;
            $favoraitevalue = ' ';
        @endphp

                @foreach($filterval as $fv)
                    <label class="radio-inline" style="margin-right:20px">

                        <input type="radio" name="<?php echo $filter->id; ?>" value='<?php echo "$fv->value";?>'
                            @php

                                    foreach ($productfilters as $pf)
                                    {
                                        if($pf->filterValue == $fv->value )
                                            {
                                                 echo 'checked';
                                                 $favoriate = 0 ;

                                            }
                                        if( $favoriate == 0)
                                            continue;

                                    }
                                    if($favoriate == 1)
                                        {

                                           $favoraitevalue = $productfilters->where('filterName' ,$filter->name);
                                           foreach ($favoraitevalue as $r)

                                             $favoraitevalue = $r->filterValue;

                                        }

                            @endphp>

                        {{$fv->value}}
                    </label>
                @endforeach
        <div class="form-group">
            <label class="radio-inline" style="margin-right:20px">

                <input type="radio" name="<?php echo $filter->id; ?>" value=""  id="<?php echo $filter->id; ?>" @php if($existfilter== 1 && $favoriate == 1 ) echo 'checked'; @endphp>
                {{__('product.favoriate')}} <input type="text" class="form-control" id="<?php echo 'txtradio'.$filter->id; ?>" onkeyup="addvaluetoradionbutton({{$filter->id}})" value="@php if($existfilter== 1 && $favoriate == 1 ) echo $favoraitevalue; else echo ''  @endphp" >
            </label>
        </div>



    </div>
    @php
    $favoraitevalue="";
    $favoriate = 0 ;
      $existfilter = 0 ;
    @endphp
@endforeach
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
