@extends('layouts.app')

@section('content')
@include('header')
@include('slider')
@include('main')
@include('ersal')
@include('footer')
@section('title',__('generic.title'))
@endsection
