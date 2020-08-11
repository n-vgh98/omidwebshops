@php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
@endphp
@extends('laayoytss.master')

@section('profile_assets')
<link href="{{ asset('style/profile/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('style/profile/script.min.js')}}"></script>
@endsection
@section('content')
    @include('frontend.header')

<div  class="mt-3">
    <div id="wrapper">
       @include('profile.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <div class="container-fluid">

                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <img class="rounded-circle mb-3 mt-4" src="{{asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}" width="160" height="160">
                                    <form method="post" action="{{url('userAvatarFile')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" name="userAvatarImage">

                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class=" btn btn-danger" name="saveAvatar" value="{{__('generic.save')}} ">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">

                            <div class="row">
                                <div class="col">
                                    <div class="card shadow">
                                        <div class="card-header py-3 text-right">
                                            <p class="text-primary m-0 font-weight-bold"></p>
                                        </div>
                                        <div class="card-body">
                                            @error('password')
                                            <div class="alert alert-danger text-right">{{ $message }}</div>
                                            @enderror
                                            <form method="post" action="{{url('changeUserPassword')}}">
                                                @csrf
                                                <div class="form-group text-{{__('generic.text_direction')}} "><label for="password"><strong>{{__('generic.new_password')}}</strong></label><input class="form-control" id="password" type="password"  name="password"></div>
                                                <div class="form-group text-{{__('generic.text_direction')}} "><label for="password-confirmation"><strong>{{__('generic.confirm_new_password')}}</strong></label><input class="form-control" id="password-confirmation" type="password" name="password_confirmation"></div>

                                                <div class="form-group"><button class="btn btn-danger btn-sm" type="submit" name="btnChangePassword">{{__('generic.change_password')}}</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-header py-3">
                                        <p class="text-primary text-{{__('generic.text_direction')}} m-0 font-weight-bold">{{__('profile.personal_information')}}</p>
                                    </div>
                                    <div class="card-body bg-white">
                                        @if($errors->any())
                                        <div class="alert alert-danger text-{{__('generic.text_direction')}}">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                    @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form method="post" action="{{url('/changeOherAttributes')}}">
                                            @csrf

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-{{__('generic.text_direction')}}"><label for="first_name"><strong>{{__('profile.name')}}</strong></label><input class="form-control" type="text" placeholder="" name="name" value= "{{Auth::user()->name}}"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-{{__('generic.text_direction')}}"><label for="last_name"><strong>{{__('generic.mobile')}}</strong></label><input class="form-control" type="tel" placeholder="" name="mobile" value= "{{Auth::user()->mobile}}"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-{{__('generic.text_direction')}}"><label for="first_name"><strong>{{__('profile.age')}}</strong></label><input class="form-control" type="text" placeholder="" name="age"  value= "{{Auth::user()->age}}"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-{{__('generic.text_direction')}}"><label for="kodemelli"><strong>{{__('generic.kode_melli')}}</strong></label><input class="form-control" type="text" placeholder="" name="kodemelli"  value= "{{Auth::user()->kodemelli}}"></div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-{{__('generic.text_direction')}}"><label for="first_name"><strong>{{__('profile.work')}}</strong></label><input class="form-control" type="text" placeholder="" name="shoghl" value= "{{Auth::user()->shoghl}}"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-{{__('generic.text_direction')}}"><label for="last_name"><strong>{{__('profile.dgree')}}</strong></label><input class="form-control" type="text" placeholder="" name="tahsilat" value= "{{Auth::user()->tahsilat}}"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group text-{{__('generic.text_direction')}}"><label for="first_name"><strong>{{__('profile.gener')}}</strong></label></div>
                                                    <div class="form-group text-{{__('generic.text_direction')}} ">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label text-{{__('generic.text_direction')}}">
                                                                <input type="radio" class="form-check-input mx-1 text-{{__('generic.text_direction')}}" name="gener" value="مرد" @php  if(Auth::user()->gener == 'مرد') echo 'checked'; @endphp  >{{__('profile.male')}}
                                                                <input type="radio" class="form-check-input mx-1" name="gener" value="زن" @php  if(Auth::user()->gener == 'زن') echo 'checked'; @endphp>{{__('profile.female')}}
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-danger btn-sm" type="submit" name="saveUserCahnge">{{__('generic.save')}}</button></div>
                                        </form>
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


@include('frontend.footer')
@section('title',__('generic.profile'))

@endsection
