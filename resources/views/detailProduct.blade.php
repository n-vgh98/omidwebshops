<?php
//$filter = \App\Filter::all();
//$filter->load('translations');
$productfilters->load('translations');
$sameproducts->load('translations');
?>
@extends('laayoytss.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('contents/library/slick/slick.css')}}"/>
    <!-- Add the new slick-theme.css if you want the default styling  -->
    <link rel="stylesheet" type="text/css" href="{{asset('contents/library/slick/slick-theme.css')}}"/>

@endsection


@section('content')
    @include('frontend.header')
@section('title',__("footer.tilte_us"))

<div class="container text-right" style="direction: rtl;">
    <div class="container-fluid bg-white">
        <div class="row mt-2">
            <div class="col-12 ">
                <div class="row">
                    <div class="col-10 mt-2 text-center mt-1">
                        <h6>{{$product->getTranslatedAttribute('name')}}</h6>
                        <hr>
                    </div>
                    <div class="col-2 mt-2">
                        <a href="">
                            @isset($brand)
                                <img src="{{asset('storage/'.$brand->imageBrand)}}" class="img-fluid" alt="برند محصول">
                            @endisset
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-5 ">
                <div class="mx-auto">
                    <img class="img-fluid d-block mx-auto"
                         src="{{asset('storage/products/'.$product->productimages()->first()['image'])}} "
                         align="کرم درست و صورت" id="orginalimagezoomed"
                         data-zoom-image="{{asset('storage/products/large/'.$product->productimages()->first()['image'])}}"/>
                </div>
                <div class="d-flex justify-content-center flex-wrap my-2" id="thumbnailimageblock">

                    @foreach($product->productimages()->get() as $proimg)
                        <div>
                            <a href="#" data-image="{{asset('storage/products/'.$proimg->image)}}"
                               data-zoom-image="{{asset('storage/products/large/'.$proimg->image)}}">
                                <img src="{{asset('storage/products/'.$proimg->image)}}" width="60px" height="60px"
                                     style="border:2px solid white;" id="orginalimagezoomed"/>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{--<div class="col-md-3 ">--}}
            {{--<div>--}}
            {{--{{__('generic.country')}}:{{$product->country ?$product->getTranslatedAttribute('country') : ' ----' }}--}}
            {{--</div>--}}
            {{--<div>{{__('generic.company')}} :--}}
            {{--{{$product->getTranslatedAttribute('company')}}--}}

            {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-7  p-2 boxshadowLIST">
                <div class="border border-secondary">
                    <h4>{{__('generic.featuers')}} {{ __('generic.product')}}</h4>
                    <ul class=""
                        style="list-style-type: disc;@if(__('generic.is_rtl') == 'true') margin-right: 20px @else margin-left: 20px @endif ">

                        @php
                            if($product->featuers){
                                 $features = explode("\n",$product->getTranslatedAttribute('featuers') );

                                foreach ($features as $f)
                                    echo "<li>$f</li>";
                             }
                        @endphp
                    </ul>
                </div>

            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h6 class="text-center">{{__('generic.price')}} :
                    <small class="tymon-delete">
                        <del class="text-danger">{{number_format( $product->price )}}</del>
                    </small> {{number_format(  $product->price -(($product->price * $product->takhfif)/100)  )}} {{__('generic.vahed_pool')}}
                </h6>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12 text-center">
                <a @if($product->available > 0 ) href="/add/cart/{{$product->id}}" @else href=""
                   @endif class="btn btn-danger mb-2">
                    <span class="fa fa-shopping-basket"></span>
                    {{__('generic.add_to_card')}}</a>
            </div>
        </div>
    </div>


    <ul class="nav nav-tabs mt-4">
        <li class="nav-item ">
            <a class="nav-link bg-light p-3 active" href="#takmili"
               data-toggle="tab">{{__('generic.extera_information')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link p-3" data-toggle="tab"
               href="#aboutproduct">{{__('generic.about')}} {{__('generic.product')}}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link p-3" data-toggle="tab" href="#nazarat"> {{__('generic.comment_users')}}</a>
        </li>
    </ul>


</div>
<!-- tab pan -->
<div class="tab-content bg-white mx-5" style="direction: rtl;">
    <div class="tab-pane active " id="takmili">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                @foreach($productfilters as $profilter)
                    @php
                        $filterName = \App\Filter::where('name',$profilter->filterName)->get();
                       $f = $filterName[0]->getTranslatedAttribute('name');
                       $filtervalue = \App\Filtervalue::where('value',$profilter->filterValue)->get();
                       if(count($filtervalue) > 0)
                            $fv = $filtervalue[0]->getTranslatedAttribute('value') ;
                       else
                           $fv = $profilter->filterValue;

                    @endphp
                    <tr>
                        <td>{{$f}}</td>
                        <td>{{$fv}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane  " id="aboutproduct">
        <div class="card">

            <div class="card-body text-right" style="direction: rtl;">
                <p style="text-align: right!important;">
                    {!!  $product->getTranslatedAttribute('aboutProduct') !!}
                </p>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="nazarat">
        <div class="container">

            <form method="post" action="/addComment/{{$product->id}}" onsubmit="return showMessage()">
                @csrf
                <h4 class="text-center pt-2"> {{__('generic.comment_users')}}</h4>
                <h6 class="text-center">{{__('generic.write_your_comment')}}</h6>

                @if(\Illuminate\Support\Facades\Auth::check())
                    <div class="form-group mt-5"><textarea class="form-control" name="message"
                                                           placeholder="{{__('generic.write_comment')}}"
                                                           required></textarea></div>
                    <div class="form-group "><input class="btn btn-primary" value="{{__('generic.send_comment')}}"
                                                    type="submit"></div>
            </form>
            @else
                <div class="jumbotron">
                    <p>{{__('generic.login_to_write_comment')}}</p>
                    <a href="{{route('login')}}" class="btn btn-primary">{{__('generic.login')}}</a>
                </div>
            @endif


            <hr>
            @if($product->comments->count()==0)
                <p>{{__('generic.no_comment_registerd')}}</p>
            @endif
            <form>
                @foreach($product->comments as $comment)
                    @if($comment->status == 1)
                        <div class="karbar_nazar my-2">
                            <h4>{{$comment->name}}</h4>
                            <h6>{{$comment->comment}}</h6>
                            <input type="submit" name="replay_comment" value="{{__('generic.replay')}}"
                                   class="btn btn-outline-primary ">
                        </div>
                        <hr>
                    @endif
                @endforeach
            </form>
        </div>
    </div>

    {{--<div class="card mt-3 text-right">--}}
    {{--<div class="card-header aboutProductCard"> {{__('generic.same_products')}} </div>--}}
    {{--<div class="card-body ">--}}
    <?php


        $pro= App\Product::orderBy('order','Asc')->take(18)->get();
        $pro->id= App\Product::orderBy('order','Asc')->get('id');
    //    ?>

    {{--new--}}
    {{--<div class="d-flex bg-white  justify-content-around sameproducts">--}}
    @foreach($sameproducts as $pro)
    @endforeach
    <div class="row shadowBaxs porforoshtarinha mr-0 ml-0">
        <div class="col-lg-12 p-0">
            <div class="d-block colorCreate khodePorfroshtarinha"><h5>{{__('generic.same_products')}} </h5></div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner mt-2 mb-2">

                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="row">
                                    {{--@foreach($sameproducts as $pro)--}}
                                    @for($i=0 ; $i < 6 ;$i++)
                                        <div class="col-lg-2 paddingScrolers">
                                            <a href="/detailProduct/{{$pro->id}}" class="text-decoration-none ">
                                                <div class="card" style="width: 100% !important;">
                                                    <img class="card-img-top"
                                                         src="{{asset('storage/products/'.($pro->productimages()->first())['image']  )}}"
                                                         alt="Card image">
                                                    <div class="card-body">
                                                        <p class="card-title cardTagP">{{$pro->getTranslatedAttribute('name')}}</p>
                                                        <p>   {{__('generic.price')}}
                                                            : {{number_format($pro->price)}} {{__('generic.vahed_pool')}}</p>
                                                        <a href="/sabadKharid" class="btn btn-primary d-block"><i
                                                                    class="fa fa-shopping-cart"
                                                                    aria-hidden="true"></i></a>
                                                        @if($pro->available == 0)
                                                            <div>
                                                                <span class="text-danger">{{__('generic.not_available')}}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endfor
                                    {{--@endforeach--}}
                                </div>

                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">

                                <div class="row">
                                    {{--@foreach($sameproducts as $pro)--}}
                                    @for($i=6 ; $i < 12 ;$i++)
                                        <div class="col-lg-2 paddingScrolers">
                                            <a href="/detailProduct/{{$pro->id}}" class="text-decoration-none ">
                                                <div class="card" style="width: 100% !important;">
                                                    <img class="card-img-top"
                                                         src="{{asset('storage/products/'.($pro->productimages()->first())['image']  )}}"
                                                         alt="Card image">
                                                    <div class="card-body">
                                                        <p class="card-title cardTagP">{{$pro->getTranslatedAttribute('name')}}</p>
                                                        <p>   {{__('generic.price')}}
                                                            : {{number_format($pro->price)}} {{__('generic.vahed_pool')}}</p>
                                                        <a href="/sabadKharid" class="btn btn-primary d-block">
                                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                        </a>
                                                        @if($pro->available == 0)
                                                            <div>
                                                                <span class="text-danger">{{__('generic.not_available')}}</span>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endfor
                                    {{--@endforeach--}}
                                </div>

                            </div>
                            <div class="col-lg-1"></div>
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{--end new--}}


<script type="text/javascript" src="{{asset('contents/library/slick/slick.min.js')}}"></script>
@include('frontend.footer')

<script type="text/javascript">
    function showMessage() {
        window.alert('{{__('generic.tank_for_comment')}}');
    }

    // zoom image in detail product
    function mouseenterimage() {
        var demisition = $('#imageProduct').getBoundingClientRect();
        console.log('top is :' + demisition.top + 'left corner is :' + demisition.top);
    }

    function mouseLeaveImage() {
        $('#imageProduct').css('width', "auto");
    }

    $(document).ready(function () {
        $('#thumbnailimageblock a').click(function (event) {
            event.preventDefault();
            var h = $(this).attr("href");
            $('#orginalimagezoomed').attr("src", h);

        });
        //  $("#orginalimagezoomed").elevateZoom();


//initiate the plugin and pass the id of the div containing gallery images
        $("#orginalimagezoomed").elevateZoom({
            gallery: 'thumbnailimageblock',
            cursor: "crosshair",
            galleryActiveClass: 'active',
            imageCrossfade: true,
            zoomWindowPosition: 10
        });

//pass the images to Fancybox
        $("#orginalimagezoomed").bind("click", function (e) {
            var ez = $('#orginalimagezoomed').data('elevateZoom');
            $.fancybox(ez.getGalleryList());
            return false;
        });
        $('.sameproducts').slick({
            {{--slidesToShow: <?php  if(count($sameproducts) >3 ) echo "3" ; else echo "1"?>",--}}
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            arrows: true,
            adaptiveHeight: true,
            rtl: @if(__('generic.is_rtl') == 'true') true, @else false, @endif
            mobileFirst: true,

        });


    });
</script>
<script src="{{asset('style/jquery.elevateZoom-3.0.8.min.js')}}"></script>

@endsection

