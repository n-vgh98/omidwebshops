@extends('layouts.app')


@section('content')
    @include('header')
@section('title',__('generic.about_us'))
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-6 bg-white">
                <div class="my-3">
                    @if(count($about_us) > 0)
                      {!!   $about_us[0]->getTranslatedAttribute('about_us') !!}
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('ersal')
    @include('footer')
@endsection

