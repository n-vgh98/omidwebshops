<?php
$sliders = App\Slider::all();
$count = $sliders->count();
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





        <div class="col-lg-3 cardPishnahadRoz">
            <div class="container-float ">
                <div class="row shadowBaxs  m-0">
                    <h5 class="col-lg-12 colorLOGIN m-0 pishnahadROOz">محبوب ترین ها </h5>

                    <div id="carouselExampleSlidesOnly" class="carousel slide witheCartPishnahadeROZ"
                         data-ride="carousel">
                        <div class="carousel-inner cardRadius1">
                            <div class="carousel-item active">
                                <div class="card" style="width: 100% !important;">
                                    <img class="card-img-top" src="{{asset('front/pic/cart1.jpg')}}" alt="Card image">
                                    <div class="card-body">
                                        <h6 class="card-title">پنکه رومیزی دمنده مدل Haleh</h6>
                                        <a href="#" class="btn btn-primary">افزودن به سبد خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card" style="width: 100% !important;">
                                    <img class="card-img-top" src="{{asset('front/pic/cart1.jpg')}}" alt="Card image">
                                    <div class="card-body">
                                        <h6 class="card-title">پنکه رومیزی دمنده مدل Haleh</h6>
                                        <a href="#" class="btn btn-primary">افزودن به سبد خرید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card" style="width: 100% !important;">
                                    <img class="card-img-top" src="{{asset('front/pic/cart1.jpg')}}" alt="Card image">
                                    <div class="card-body">
                                        <h6 class="card-title">پنکه رومیزی دمنده مدل Haleh</h6>
                                        <a href="#" class="btn btn-primary">افزودن به سبد خرید</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
