@php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
@endphp
@extends('layouts.app')

@section('profile_assets')
<link href="{{ asset('style/profile/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('style/profile/script.min.js')}}"></script>
@endsection
@section('content')
@include('header')

<div  class="mt-3">
    <div id="wrapper">
       @include('profile.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <div class="container-fluid">

                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <div class="card mb-3">
                                <div class="card-header text-{{__('generic.text_direction')}}">{{(__('generic.messages'))}}</div>
                                <div class="card-body text-{{__('generic.text_direction')}} shadow">
                                    @foreach($messages as $message)
                                      <div class="row my-3">
                                          <div class="col-6">
                                              {{__('generic.message')}} :  {{$message->message}}
                                          </div>
                                          <div class="col-6">
                                              {{__('generic.replay')}} : {{$message->pasokh}}
                                          </div>

                                      </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">


                        </div>
                    </div>

                </div>


                   <div class="container">

                    <div class="row bg-white">
                        <h5 class="text-center my-3">{{__('generic.message_user_glad')}}</h5>
                        <div class="col-6 ">
                            <form method="post" action="{{url('/sendMessage')}}">
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

                                <div class="form-group"><input class="form-control" type="hidden" name="name" value="{{Auth::user()->name}}"  /></div>
                                <div class="form-group"><input class="form-control" type="hidden"  name="email" value="{{Auth::user()->email}}" /></div>
                                <div class="form-group"><input class="form-control" type="hidden" name="mobile" value="{{Auth::user()->mobile}}"  /></div>
                                <div class="form-group"><textarea class="form-control" name="message" placeholder="{{__('generic.write_your_message')}}" rows="8"></textarea></div>
                                <div class="form-group"><button class="btn btn-primary" type="submit">{{__('generic.send_message')}} </button></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


@include('ersal')
@include('footer')
@section('title',__('generic.messages'))

@endsection
