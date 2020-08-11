@extends('laayoytss.master')
@section('content')
@include('frontend.header')
@section('title',__('generic.fqa'))
<div class="container bg-white border" style="direction: rtl; text-align: initial; padding-top: 5%;">
    <div class="row">
        <div class="col-12">
            <div class="fqa">
                <h2 class="title text-center">
                    <span class="text-primary ">{{__('generic.fqa')}}</span>
                </h2>
                @if(count($fqa) > 0)
                   @foreach($fqa as  $f)
                       <div class="p-5 text-center">
                           {!! $f->getTranslatedAttribute('question') !!}
                       </div>
                    <div>
                        {!! $f->getTranslatedAttribute('replay') !!}
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
    @include('frontend.footer')
@endsection

