
<?php

$mostpopulars = App\Mostpopular::orderBy('Order','Asc')->take(8)->get();
$offer_of_days = App\OfferOfDay::orderBy('Order','Asc')->take(2)->get();
$newests = App\Product::orderBy('Order','desc')->take(12)->get();
$i = 0;
$newests->load('translations');
?>


    <!--    khadamat-->
    <div class="container-fluid">
        <div class="row colorLOGIN matginKHadamat">
            <div class="col-lg-2"></div>
            <div class="col-lg-2 text-center khadamatPading">
                <img class="khadamatcss" src="{{asset('front/pic/khadamat3.svg')}}">
                <h6 class="fontSizeKHadamat">ضمانت اصل بودن کالا</h6>
            </div>
            <div class="col-lg-2 text-center khadamatPading">
                <img class="khadamatcss" src="{{asset('front/pic/khadamat4.svg')}}">
                <h6 class="fontSizeKHadamat">گارانتی کالا</h6>
            </div>
            <div class="col-lg-2 text-center khadamatPading">
                <img class="khadamatcss" src="{{asset('front/pic/khadamat2.svg')}}">
                <h6 class="fontSizeKHadamat">پرداخت در محل</h6>
            </div>
            <div class="col-lg-2 text-center khadamatPading">
                <img class="khadamatcss" src="{{asset('front/pic/khadamat1.svg')}}">
                <h6 class="fontSizeKHadamat">ارسال سریع</h6>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <!--    khadamat-->

    <!--forosh-->
    <div class="container-fluid">

        {{--most populur--}}

        <div class="row colorLOGIN marginTOPbaner">
            @if(count($offer_of_days) > 0)
            <div class="col-lg-6 pt-3 pb-3">
                <a href="/detailProduct/{{$offer_of_days[0]->product_id}}">
                    <img class="sizeBaner" src="{{asset('storage/'.$offer_of_days[0]->image)}}">
                    {{--<button class="btn btn-primary btn-sm active" type="button">{{__('generic.view')}}</button>--}}
                </a>
            </div>
            @endif
            @if(count($offer_of_days) > 1)
            <div class="col-lg-6 pt-3 pb-3">
                <a href="/detailProduct/{{$offer_of_days[1]->product_id}}">
                    <img class="sizeBaner" src="{{asset('storage/'.$offer_of_days[1]->image)}}">
                    {{--<button class="btn btn-primary btn-sm active" type="button">--}}{{--{{__('generic.view')}}</button>--}}
                </a>
            </div>
            @endif
        </div>
        {{--@foreach($mostpopulars as $mp)--}}
            {{--@php $i++;
            if($i ==2) break; @endphp--}}
        {{--@endforeach--}}
{{--end most populur--}}

        <div class="row shadowBaxs porforoshtarinha mr-0 ml-0">
            <div class="col-lg-12 p-0">
                <div class="d-block colorCreate khodePorfroshtarinha"> <h5>{{__('generic.newest')}} </h5> </div>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner mt-2 mb-2">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        @for($i=0 ; $i < 6 ;$i++)
                                            @if($i < count($newests) )
                                                <div class="col-lg-2 paddingScrolers">
                                                    <a  href="/detailProduct/{{$newests[$i]->id}}"  class="text-decoration-none ">
                                                        <div class="card" style="width: 100% !important;">
                                                            <img class="card-img-top" src="{{asset('storage/products/'.($newests[$i]->productimages()->first())['image']  )}}" alt="Card image">
                                                            <div class="card-body">
                                                                <p class="card-title cardTagP">{{$newests[$i]->name}}</p>
                                                                <p>   {{__('generic.price')}} : {{number_format($newests[$i]->price)}} {{__('generic.vahed_pool')}} </p>
                                                                <a href="/sabadKharid" class="btn btn-primary d-block"><i class="fa fa-shopping-cart"
                                                                                                               aria-hidden="true"></i></a>

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endfor
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
                                        @for($i=6 ; $i < 12 ;$i++)
                                            <div class="col-lg-2 paddingScrolers">
                                                @if($i < count($newests) )
                                                <a href="/detailProduct/{{$newests[$i]->id}}" class="text-decoration-none ">
                                                    <div class="card" style="width: 100% !important;">
                                                        <img class="card-img-top" src="{{asset('storage/products/'.($newests[$i]->productimages()->first())['image']  )}}" alt="Card image">
                                                        <div class="card-body">
                                                            <p class="card-title cardTagP">{{$newests[$i]->getTranslatedAttribute('name')}}</p>
                                                            <p>   {{__('generic.price')}} : {{number_format($newests[$i]->price)}} {{__('generic.vahed_pool')}}</p>
                                                            <a href="/sabadKharid" class="btn btn-primary d-block">
                                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                            @if($newests[$i]->available < 0)
                                                                <div> <span class="text-danger">{{__('generic.not_available')}}</span></div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </a>
                                                    @endif
                                            </div>
                                        @endfor
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

    {{--@include('frontend.footer')--}}
{{--@endsection--}}
