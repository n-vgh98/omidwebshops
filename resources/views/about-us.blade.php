@extends('laayoytss.master')


@section('content')
    @include('frontend.header')
    <div class="container p-5">
        <div class="row justify-content-center text-center">
            <div class="col-8 bg-white">
                <div class="my-3">
                    <p>
                        شرکت ما فعالیت خود را از سال 1383 شروع کرده و یکی از موفق ترین فروشگاه ها در زمینه فروش محصولات ارایشی و بهداشتی می باشد.
                    </p>
                </div>
            </div>
            <div class="col-4 text-center">
                <div class="col-lg-2">
                    <img class="sizeLogo" href="#" src="{{asset('front/jpg/logo.jpg')}}"/>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 25%;"></div>



    @include('frontend.footer')
@endsection

