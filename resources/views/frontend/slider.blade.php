<?php
$sliders = App\Slider::all();
$count = $sliders->count();
$mostpopulars = App\Mostpopular::orderBy('Order','Asc')->take(5)->get();
$i = 0;
?>
<div class="container-fluid">
    <div class="row">
        {{--<div class="col-lg-9">--}}
            {{--<div id="carouselExampleControls" class="carousel slide cardPishnahadRoz shadowBaxs" data-ride="carousel">--}}

                {{--<div class="carousel-inner">--}}
                    {{--@foreach($sliders as $slide)--}}
                    {{--<div class="carousel-item brdrRdius active  @php if($loop->first) echo "active";  @endphp ">--}}

                        {{--<img class="d-block w-100 brdrRdius" src="{{asset('storage/'.$slide->imageAddress)}}" alt="First slide">--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--<div class="carousel-item brdrRdius">--}}
                        {{--<img class="d-block w-100 brdrRdius" src="{{asset('front/pic/1.jpg')}}" alt="Second slide">--}}
                    {{--</div>--}}
                    {{--<div class="carousel-item brdrRdius">--}}
                        {{--<img class="d-block w-100 brdrRdius" src="{{asset('front/pic/1.jpg')}}" alt="Third slide">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">--}}
                    {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Previous</span>--}}
                {{--</a>--}}
                {{--<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">--}}
                    {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Next</span>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}


        <div class="col-9">
            <div id="carouselExampleControls" class="carousel slide cardPishnahadRoz shadowBaxs " data-ride="carousel" >

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    @for($i= 0 ;$i < $count ; $i++)
                        <li data-target="#demo" data-slide-to="{{$i}}" @php if($i==0) echo "class=active";  @endphp ></li>
                    @endfor
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    @foreach($sliders as $slide)

                        <div class="carousel-item brdrRdius  @php if($loop->first) echo "active";  @endphp " >
                            <img src="{{asset('storage/'.$slide->imageAddress)}}"  alt="Los Angeles" class="d-block w-100 brdrRdius image">

                        </div>
                    @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                </a>

            </div>
        </div>

<!--    --><?php

//$newests = App\Product::orderBy('Order','desc')->take(12)->get();
//$i = 0;
//$newests->load('translations');
//?>



        <div class="col-lg-3 cardPishnahadRoz">
            <div class="container-float ">
                <div class="row shadowBaxs  m-0">
                    <h5 class="col-lg-12 colorLOGIN m-0 pishnahadROOz">محبوب ترین ها </h5>

                    <div id="carouselExampleSlidesOnly" class="carousel slide witheCartPishnahadeROZ"
                         data-ride="carousel">

                        <div class="carousel-inner cardRadius1">

                            <div class="carousel-item active">

                                <div class="card" style="width: 100% !important;">
                                    @for($i=0 ; $i < 1 ;$i++)
                                        @if( count($mostpopulars) > $i)
                                    <a  href="/detailProduct/{{$mostpopulars[$i]->product_id}}"  class="text-decoration-none ">
                                    <img class="card-img-top" src="{{asset('storage/'.$mostpopulars[$i]->image)}}" alt="Card image">
                                    <div class="card-body">
                                        <h6 class="card-title">{{$mostpopulars[$i]->name}}</h6>
                                        <p>   {{__('generic.price')}} : {{number_format($mostpopulars[$i]->price)}} {{__('generic.vahed_pool')}} </p>
                                        <a href="/detailProduct/{{$mostpopulars[$i]->product_id}}" class="btn btn-primary">مشاهده</a>
                                    </div>
                                    </a>
                                    @endif
                                        @endfor
                                </div>

                            </div>
                            <div class="carousel-item">
                                <div class="card" style="width: 100% !important;">
                                    @for($i=1 ; $i < 2 ;$i++)
                                        @if (count($mostpopulars) > $i )
                                        <a  href="/detailProduct/{{$mostpopulars[$i]->product_id}}"  class="text-decoration-none ">
                                            <img class="card-img-top" src="{{asset('storage/'.$mostpopulars[$i]->image)}}" alt="Card image">
                                            <div class="card-body">
                                                <h6 class="card-title">{{$mostpopulars[$i]->name}}</h6>
                                                <p>   {{__('generic.price')}} : {{number_format($mostpopulars[$i]->price)}} {{__('generic.vahed_pool')}} </p>
                                                <a href="/detailProduct/{{$mostpopulars[$i]->product_id}}" class="btn btn-primary">مشاهده</a>
                                            </div>
                                        </a>
                                        @endif
                                        @endfor
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card" style="width: 100% !important;">
                                    @for($i=2 ; $i <3 ;$i++)
                                        @if (count($mostpopulars) > $i )
                                            <a  href="/detailProduct/{{$mostpopulars[$i]->product_id}}"  class="text-decoration-none ">
                                                <img class="card-img-top" src="{{asset('storage/'.$mostpopulars[$i]->image)}}" alt="Card image">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{$mostpopulars[$i]->name}}</h6>
                                                    <p>   {{__('generic.price')}} : {{number_format($mostpopulars[$i]->price)}} {{__('generic.vahed_pool')}} </p>
                                                    <a href="/detailProduct/{{$mostpopulars[$i]->product_id}}" class="btn btn-primary">مشاهده</a>
                                                </div>
                                            </a>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card" style="width: 100% !important;">
                                    @for($i=3 ; $i <4 ;$i++)
                                        @if (count($mostpopulars) > $i )
                                        <a  href="/detailProduct/{{$mostpopulars[$i]->product_id}}"  class="text-decoration-none ">
                                            <img class="card-img-top" src="{{asset('storage/'.$mostpopulars[$i]->image)}}" alt="Card image">
                                            <div class="card-body">
                                                <h6 class="card-title">{{$mostpopulars[$i]->name}}</h6>
                                                <p>   {{__('generic.price')}} : {{number_format($mostpopulars[$i]->price)}} {{__('generic.vahed_pool')}} </p>
                                                <a href="/detailProduct/{{$mostpopulars[$i]->product_id}}" class="btn btn-primary">مشاهده</a>
                                            </div>
                                        </a>
                                        @endif
                                    @endfor
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
