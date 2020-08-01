@php
    use TCG\Voyager\Models\Category;
        $avalablefilter->load('translations');
       $avalablefilter->load('translations');
       $products->load('translations');
       //$translateCatagory = Category::all();
      // $translateCatagory->load('translations') ;


@endphp
@extends('laayoytss.master')

@section('content')
    @include('frontend.header')
    <div class="container-fluid" style="direction: rtl">
        <div class="row">
            <div class="empty my-5">
               <?php
                //get translated attribute for breadcrum
                $cat1_translated = Category::where('name',$catagory[0]['cat1'])->get();
                $cat2_translated = Category::where('name',$catagory[0]['cat2'])->get();
                $cat3_translated = Category::where('name',$catagory[0]['cat3'])->get();
                $cat1_translated = $cat1_translated[0]->getTranslatedAttribute('name') ;
                if(count($cat2_translated) > 0)  $cat2_translated = $cat2_translated[0]->getTranslatedAttribute('name') ;
                if(count($cat3_translated) > 0)  $cat3_translated = $cat3_translated[0]->getTranslatedAttribute('name');
                ?>
            </div>
            {{--<div class="col-sm-2 col-4  overflow-hidden" >--}}
                {{--<div class="range my-4 bg-white">--}}

                        {{--<label for="customrangeprice"> {{__('generic.price')}}</label>--}}
                        {{--<div class="position-relative">--}}
                            {{--<span class="position-absolute overflow-hidden rangelable" style="right:80%;top: 40%;font-size: small"> {{__('generic.vahed_pool')}}1</span>--}}
                            {{--<span class="position-absolute rangelable" style="right:0;top: 40%;font-size: small">{{number_format(20000000)}}{{__('generic.vahed_pool')}}</span>--}}

                             {{--<input class="custom-range" type="range" name="priceRange" id="customrangeprice" min="1" max="20000000"--}}
                                    {{--value="--}}
            <?php foreach ($requestold->query() as $key => $value)
                                        {
                                            if($key == 'priceRange')
                                            {
                                             echo $value;
                                            }
                                        }
                                        ?>
                        {{--</div>--}}
                {{--</div>--}}

                {{--<form method="post" >--}}
                    {{--@isset($avalablefilter)--}}
                        {{--@foreach($avalablefilter as $af)--}}
                            {{--<div class=" my-3">--}}
                                {{--<div style="cursor: pointer;" id="filtername{{$loop->iteration}}" onclick="togglefilter({{$loop->iteration}})">--}}
                                    {{--<div class="sidefilter p-2" for="">--}}
                                        {{--{{$af->getTranslatedAttribute('name')}} <span class="fa fa-caret-down float-{{__('voyager::generic.is_rtl') == 'true' ? 'left' : 'right'}}" style="margin-left:1em;color:black"></span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                               {{--<div class="chckboxfilters bg-white " id="chckboxfilters{{$loop->iteration}}" style="display: block">--}}
                                   {{--<input type="hidden" name="{{$af->name.'[]'}}" value="{{$af->name}}">--}}
                                   {{--@foreach($avaliblefiltervalue as $afv)--}}
                                       {{--@if($afv->filter_id == $af->id)--}}
                                           {{--<div class="form-check">--}}
                                               {{--<label class="form-check-label mx-1">--}}
                                                   {{--<input type="checkbox"  class="form-check-input" value="{{$afv->value}}" name="{{$af->slug.'[]'}}"--}}
                                                   {{--<?php--}}
                                                       {{--foreach ($requestold->query() as $key => $value)--}}
                                                       {{--{--}}
                                                           {{--if($key == $af->slug)--}}
                                                           {{--{--}}
                                                               {{--foreach ($value as $v)--}}
                                                                   {{--if($v == $afv->value)--}}
                                                                       {{--echo 'checked';--}}
                                                           {{--}--}}
                                                       {{--}--}}
                                                       {{--?>>--}}
                                                   {{--{{$afv->getTranslatedAttribute('value')}}--}}
                                               {{--</label>--}}
                                           {{--</div>--}}
                                       {{--@endif--}}
                                   {{--@endforeach--}}
                               {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--@endisset--}}
                {{--</form>--}}

                {{--<!---->}}
               {{--<div class="dastebandi my-5">--}}
                   {{--<h4>دسته بندی ها</h4>--}}
                   {{--<div class="list-group">--}}
                       {{--<a href="#" class="list-group-item list-group-item-action text-danger">ارایش صورت</a>--}}
                       {{--<a href="#" class="list-group-item list-group-item-action text-danger">کرم صورت</a>--}}
                       {{--<a href="#" class="list-group-item list-group-item-action text-danger">ضد افتاب صورت</a>--}}
                   {{--</div>--}}
               {{--</div>--}}
                {{---->--}}
            {{--</div>--}}





            {{--new card--}}
            <div class="cantainer-flut">
                <div class="row">
                    {{--<div class="col-lg-1">--}}
                        {{--<!--                        menu filter-->--}}
                        {{--<div id="mySidepanel" class="sidepanel">--}}
                            {{--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>--}}
                            {{--<br/>--}}
                            {{--<h6 class="colorFooter text-center">فیلتر و جست و جوی هوشمند</h6>--}}

                            {{--<form method="post" class="p-2" style="direction: ltr">--}}
                                {{--<div class=" my-3 " style="border: solid; padding: 2%;color: white;">--}}
                                    {{--<fieldset>--}}
                                        {{--<legend style="border-bottom: solid white 1px">برند</legend>--}}
                                        {{--<div>--}}
                                            {{--<input type="checkbox" id="coding" name="interest" value="coding">--}}
                                            {{--<label for="coding">پارس خزر</label>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<input type="checkbox" id="lg" name="interest" value="music">--}}
                                            {{--<label for="lg">lg</label>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<input type="checkbox" id="samsung" name="interest" value="music">--}}
                                            {{--<label for="samsung">samsung</label>--}}
                                        {{--</div>--}}
                                    {{--</fieldset>--}}
                                {{--</div>--}}
                                {{--<div class=" my-3 " style="border: solid; padding: 2%;color: white;">--}}
                                    {{--<fieldset>--}}
                                        {{--<legend style="border-bottom: solid white 1px">رنگ</legend>--}}
                                        {{--<div>--}}
                                            {{--<input type="checkbox" id="yellow" name="interest" value="coding">--}}
                                            {{--<label for="yellow">زرد</label>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<input type="checkbox" id="white" name="interest" value="music">--}}
                                            {{--<label for="white">سفید</label>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<input type="checkbox" id="red" name="interest" value="music">--}}
                                            {{--<label for="red">قرمز</label>--}}
                                        {{--</div>--}}
                                    {{--</fieldset>--}}
                                {{--</div>--}}

                                {{--<button type="button" class="btn btn-primary "><i class="fa fa-search" aria-hidden="true"></i>--}}
                                    {{--جست و--}}
                                    {{--جو--}}
                                {{--</button>--}}

                            {{--</form>--}}
                            {{--<!--                            <a href="#">About</a>-->--}}
                            {{--<!--                            <a href="#">Services</a>-->--}}
                            {{--<!--                            <a href="#">Clients</a>-->--}}
                            {{--<!--                            <a href="#">Contact</a>-->--}}
                        {{--</div>--}}

                        {{--<button class="openbtn" onclick="openNav()"><i class="fa fa-search" aria-hidden="true"></i>--}}
                            {{--فیلتر و جست و جوی هوشمند--}}
                        {{--</button>--}}
                        {{--<!--                        menu filter-->--}}
                    {{--</div>--}}
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10 col-8">
                        @if($products->count()>0)

                            <ul class="breadcrumb justify-content-lg-start">
                                <li class="breadcrumb-item  px-1"><a href="/"><span class="fa fa-home ml-1"></span>{{__('generic.home')}}</a></li>
                                @isset($catagory)
                                    <li class="breadcrumb-item px-1"><a href="/product/catagory/{{$catagory[0]['cat1']}}">{{$cat1_translated}}</a></li>
                                    @if($catagory[0]['cat2'] !=NULL)
                                        <li class="breadcrumb-item   px-1"><a href="/product/catagory/{{$catagory[0]['cat1']}}/catagory/{{$catagory[0]['cat2']}}">{{$cat2_translated}}</a></li>
                                    @endif
                                    @if($catagory[0]['cat3'] !=NULL)
                                        <li class="breadcrumb-item   px-1"><a href="/product/catagory/{{$catagory[0]['cat1']}}/catagory/{{$catagory[0]['cat2']}}/catagory/{{$catagory[0]['cat3']}}">{{$cat3_translated}}</a></li>
                                    @endif
                                @endisset
                            </ul>

                    {{--<div class="col-lg-10">--}}
                        <div class="row">
                            @foreach($products as $pro)
                                <a  href="/detailProduct/{{$pro->id}}"  class="text-decoration-none ">
                                    <div class="col-lg-3 p-2">
                                        <div class="card shadowBaxs">
                                            <img class="card-img-top" src="{{asset('storage/products/'.($pro->productimages()->first())['image']  )}}"
                                                 alt="Card image">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$pro->getTranslatedAttribute('name')}}</h5>
                                                <p class="card-text"> {{__('generic.price')}} : {{number_format($pro->price)}} {{__('generic.vahed_pool')}}</p>
                                                <a href="/detailProduct/{{$pro->id}}" class="btn btn-primary">افزودن به سبد خرید</a>
                                                @if($pro->available <0)
                                                    <div> <span class="text-danger">{{__('generic.not_available')}}</span></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            {{--<div class="col-lg-3 p-2">--}}
                                {{--<div class="card shadowBaxs">--}}
                                    {{--<img class="card-img-top" src="http://omidwebshop.ir/storage/products/mashin1590992069.png"--}}
                                         {{--alt="Card image">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h5 class="card-title">ماشین لباس شویی</h5>--}}
                                        {{--<p class="card-text">قیمت : 13.000.000 تومان</p>--}}
                                        {{--<a href="#" class="btn btn-primary">افزودن به سبد خرید</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-3 p-2">--}}
                                {{--<div class="card shadowBaxs">--}}
                                    {{--<img class="card-img-top" src="http://omidwebshop.ir/storage/products/mashin1590992069.png"--}}
                                         {{--alt="Card image">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h5 class="card-title">ماشین لباس شویی</h5>--}}
                                        {{--<p class="card-text">قیمت : 13.000.000 تومان</p>--}}
                                        {{--<a href="#" class="btn btn-primary">افزودن به سبد خرید</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-3 p-2">--}}
                                {{--<div class="card shadowBaxs">--}}
                                    {{--<img class="card-img-top" src="http://omidwebshop.ir/storage/products/mashin1590992069.png"--}}
                                         {{--alt="Card image">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h5 class="card-title">ماشین لباس شویی</h5>--}}
                                        {{--<p class="card-text">قیمت : 13.000.000 تومان</p>--}}
                                        {{--<a href="#" class="btn btn-primary">افزودن به سبد خرید</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-3 p-2">--}}
                                {{--<div class="card shadowBaxs">--}}
                                    {{--<img class="card-img-top" src="http://omidwebshop.ir/storage/products/mashin1590992069.png"--}}
                                         {{--alt="Card image">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h5 class="card-title">ماشین لباس شویی</h5>--}}
                                        {{--<p class="card-text">قیمت : 13.000.000 تومان</p>--}}
                                        {{--<a href="#" class="btn btn-primary">افزودن به سبد خرید</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-3 p-2">--}}
                                {{--<div class="card shadowBaxs">--}}
                                    {{--<img class="card-img-top" src="http://omidwebshop.ir/storage/products/mashin1590992069.png"--}}
                                         {{--alt="Card image">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h5 class="card-title">ماشین لباس شویی</h5>--}}
                                        {{--<p class="card-text">قیمت : 13.000.000 تومان</p>--}}
                                        {{--<a href="#" class="btn btn-primary">افزودن به سبد خرید</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-3 p-2">--}}
                                {{--<div class="card shadowBaxs">--}}
                                    {{--<img class="card-img-top" src="http://omidwebshop.ir/storage/products/mashin1590992069.png"--}}
                                         {{--alt="Card image">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h5 class="card-title">ماشین لباس شویی</h5>--}}
                                        {{--<p class="card-text">قیمت : 13.000.000 تومان</p>--}}
                                        {{--<a href="#" class="btn btn-primary">افزودن به سبد خرید</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-3 p-2">--}}
                                {{--<div class="card shadowBaxs">--}}
                                    {{--<img class="card-img-top" src="http://omidwebshop.ir/storage/products/mashin1590992069.png"--}}
                                         {{--alt="Card image">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h5 class="card-title">ماشین لباس شویی</h5>--}}
                                        {{--<p class="card-text">قیمت : 13.000.000 تومان</p>--}}
                                        {{--<a href="#" class="btn btn-primary">افزودن به سبد خرید</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>

            {{--end new card--}}













                {{--<div class="d-flex bg-white flex-wrap justify-content-start">--}}
                  {{--@foreach($products as $pro)--}}
                    {{--<div class="m-2">--}}
                        {{--<div class="card rounded-0 productSimiler " >--}}
                            {{--<a  href="/detailProduct/{{$pro->id}}"  class="text-decoration-none ">--}}

                                {{--<div class="text-right card-content "><img class="img-fluid  d-block mx-auto"   src="{{asset('storage/products/'.($pro->productimages()->first())['image']  )}}">--}}
                                    {{--<h5 class="text-center p-1">{{$pro->getTranslatedAttribute('name')}} </h5>--}}
                                    {{--<div class="btn-wrapper text-center">--}}
                                        {{--<span class="text-center text-danger">--}}
                                             {{--{{__('generic.price')}} : {{number_format($pro->price)}} {{__('generic.vahed_pool')}}</span>--}}
                                            {{--@if($pro->available >0)--}}

                                        {{--<div class="text-success">--}}
                                            {{--<img src="{{asset('storage/exists.png')}}">--}}
                                        {{--</div>--}}
                                            {{--@else--}}
                                               {{--<div> <span class="text-danger">{{__('generic.not_available')}}</span></div>--}}
                                                {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
                </div>
        </div>
    </div>
    @include('frontend.footer')
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


        {{--<div class="container" >--}}
            {{--<div class="row justify-content-center" style="direction: ltr !important;">--}}
                {{--<div class="col-6">--}}
                   {{--<div class="jumbotron bg-info mt-5">--}}
                       {{--<p class="text-dark text-center ">محصولی در این دسته بندی وجود ندارد</p>--}}
                   {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--safheye bdune mahsul--}}
        @else
        <div class="container">
            <div class="card text-center" style="height: 250px; width: 800px;margin-right:200px; margin-top: 50px;">
                <div class="card-header">
                    اطلاعیه
                </div>
                <div class="card-body">
                    <h5 class="card-title">محصولی در این دسته بندی وجود ندارد</h5>
                    <p class="card-text">با عرض پوزش از شما کاربر عزیز. در این دسته بندی به زودی محصولات جدید قرار میگیرد.</p>
                </div>
                <div class="card-footer text-muted">
                    2روز پیش
                </div>
            </div>
            <div style="margin-bottom: 20%;"></div>
        </div>
        <div style="direction: ltr; width:135%;">
            @include('frontend.footer')
        </div>


        @endif




    <script type="text/javascript">
        $(document).ready(function () {
            $(':checkbox').change(function () {
                if (this.checked ){
                    var currenturl = "{{url()->current()}}";
                    var currentfullurl="{{url()->full()}}";
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
                    var currenturl = "{{url()->current()}}";
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
                var currenturl = "{{url()->current()}}";
                var currentfullurl="{{url()->full()}}";
                //   window.alert(currenturl);
                if(currenturl == currentfullurl)
                {
                    window.location = currenturl+"?"+this.name +"="+this.value;
                }

                else
                {
                    var hashes=[],hash;
                    var currenturl = "{{url()->current()}}";
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
            // show or hide of checkbox filters

        });
        function togglefilter(id)
        {
           var fil = document.getElementById('chckboxfilters'+id);
            if(fil.style.display == 'block')
                fil.style.display = "none";
            else
                fil.style.display = "block";

        }
        function  search()
        {
       // $('#customrangeprice').e
         //   var range = $('#customrangeprice').val();

         //  cu =  currentUrl +"?range="+range+"&brand="+brand;
         //  window.location = cu;


        }

        @isset($selectedBrand )
            var i='{{$selectedBrand ?? ''}}';
      $('#brandSelect option').filter(function () {
            return $(this).text() == i;
      }).attr('selected',true);
        @endisset
        @isset($OldValueOfrange)
        $('#customrangeprice').val({{$OldValueOfrange}});

        @endisset
    </script>
{{--@section('title', $cat1_translated)--}}
@endsection

