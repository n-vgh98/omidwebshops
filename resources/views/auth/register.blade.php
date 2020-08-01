@extends('laayoytss.master')

@section('content')
@include('frontend.header')
@section('title',__('generic.reigister_in_site'))


<div style="direction: rtl">
    <div class="container" style="padding: 20px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center;font-size: 25px;">{{__('generic.register_new_user')}}</div>
                    <p style="font-size:small;text-align: right;margin-right: 2%;color: red;padding-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}: 5px">*{{__('generic.required_item')}}</p>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.name')}}<span class="required">*</span> </label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.age')}}</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" min="10" max="120" class="form-control" name="age">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="genere" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.gener')}}</label>
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input mx-1" name="gener" value="{{__('profile.male')}}" checked >{{__('profile.male')}}
                                        </label>

                                    </div>

                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input mx-1" name="gener" value="{{__('profile.female')}}">{{__('profile.female')}}
                                        </label>

                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="shoghl" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.work')}}</label>

                                <div class="col-md-6">
                                    <input id="shoghl" type="text" class="form-control" name="shoghl">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tahsilat" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.dgree')}}</label>

                                <div class="col-md-6">
                                    <input id="tahsilat" type="text" class="form-control" name="tahsilat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mahalZendegi" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.address')}}</label>

                                <div class="col-md-6">
                                    <input id="mahalZendegi" type="text" class="form-control" name="mahalZendegi">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="mahalTavalod" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.address')}}</label>

                                <div class="col-md-6">
                                    <input id="mahalTavalod" type="text" class="form-control" name="mahalTavalod">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.mobile')}}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="tel" class="form-control" name="mobile">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.email')}}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.password')}}<span class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-{{__('generic.is_rtl') == 'true' ? 'right' : 'left'}}">{{__('profile.repeat_password')}}<span class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                {{--<div class="col-md-3"></div>--}}
                                <div class="col-md-6 offset-md-4 text" style="margin-right: 33%;">
                                    <button type="submit" class="btn btn-primary w-100 text-center">
                                      {{__('profile.register')}}
                                    </button>
                                </div>
                                {{--<div class="col-md-3"></div>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.footer')
@endsection
