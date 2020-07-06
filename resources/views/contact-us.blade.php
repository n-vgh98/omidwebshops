@extends('layouts.app')


@section('content')
    @include('header')
@section('title',__('generic.contact_us') )
    <div class="container bg-white" >
        <div class="row" >
            <div class="col-12 justify-content-center ">
                {!!  $contact_us[0]->getTranslatedAttribute('contact_us') !!}

            </div>
    </div>

    <div class="container bg-white">

        <div class="row ">
            <h5 class="text-center my-3">{{__('generic.message_user_glad')}}</h5>
           <div class="col-6 ">
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

                   <div class="form-group"><input class="form-control" type="text" name="name" placeholder="{{__('profile.name')}}" /></div>
                   <div class="form-group"><input class="form-control" type="email" name="email" placeholder="{{__('profile.email')}}" /></div>
                   <div class="form-group"><input class="form-control" type="text" name="mobile" placeholder="{{__('profile.mobile')}}" /></div>
                   <div class="form-group"><textarea class="form-control" name="message" placeholder="{{__('generic.write_your_message')}}" rows="8"></textarea></div>
                   <div class="form-group"><button class="btn btn-primary" type="submit">{{__('generic.send_message')}} </button></div>
               </form>
           </div>
        </div>

    </div>

    @include('ersal')
    @include('footer')
@endsection

