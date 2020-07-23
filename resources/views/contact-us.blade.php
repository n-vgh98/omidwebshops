@extends('laayoytss.master')

@section('content')
    @include('frontend.header')

    <div class="text-center" style="direction: rtl">

        <div class="container">
            <div class="row ">
                <div class="col-12 justify-content-center bg-white">
                    <h5 class="text-center mt-2">
                        کاربر گرامی، پیش از ارسال ایمیل یا تماس تلفنی بخش <a href="/fqa"> سؤالات متداول</a> را مطالعه فرمایید.
                    </h5>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row bg-white" >
                <h5 class="text-center my-5" style="margin-right: 250px;">از دیدن پیام شما خوشحال خواهیم شد و در اسرع وقت پاسخگو خواهیم بود</h5>
               <div class="col-6" style="margin-right: 250px;">
                   <form method="post" action="/sendMessage">
                       @csrf

                       @if($errors->any())
                           <div class="alert alert-danger">
                               <ul>
                                   @foreach($errors->all() as $error)
                                       <li>{{$error}}</li>
                                   @endforeach
                               </ul>
                           </div>
                       @endif
                       @if(session('result'))
                           <div class="bg-success text-center my-2">
                               {!! session('result') !!}
                           </div>

                       @endif

                       <div class="form-group"><input class="form-control" type="text" name="name" placeholder=" نام و نام خانوادگی" /></div>
                       <div class="form-group"><input class="form-control" type="email" name="email" placeholder="ایمیل" /></div>
                       <div class="form-group"><input class="form-control" type="text" name="mobile" placeholder="شماره تلفن" /></div>
                       <div class="form-group"><textarea class="form-control" name="message" placeholder="پیام خود را بنویسید" rows="8"></textarea></div>
                       <div class="form-group" style="margin-right: 470px"><button class="btn btn-primary" type="submit">ارسال </button></div>
                   </form>
               </div>
            </div>

        </div>

        <div class="container">
            <div class="row ">
                <div class="col-12 justify-content-center bg-white">
                    <p style="direction: rtl">
                        تلفن تماس : 0917568785555
                    </p>
                    <p>
                        زمان پاسخگویی  :شنبه تا چهارشنبه (9:00 الی 18:00) ـ پنج شنبه (9:00 الی 17:00)
                    </p>
                    <p>
                        آدرس : شیراز،  شهرک گلستان،  کد پستی 1493637119
                    </p>
                    <p>
                        پست الکترونیک :info@omidwebshop.ir
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.footer')
@endsection

