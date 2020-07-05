@extends('layouts.app')


@section('content')
    @include('header')


    @if($errors)
        @foreach($errors->all() as $error)
            <div class="bg-danger"> {{$error}}</div>
        @endforeach
    @endif
    @if(session('pardakht'))
      <div class="container mt-2">
          <div class="row">
              <div class="col-8 offset-2">
                  <div class="text-dark text-center border border-0  shadow ">
                      {!! (session('pardakht')) !!}
                      {{-- session()->forget('pardakht') --}}
                  </div>
              </div>
          </div>
      </div>
    @endif
      <div class="container bg-white shadow">
          <div class="row p-2" style="background-color: rgba(91,142,141,0.45)">
              <div class="col-md-4  offset-md-2">
                  <span>{{__('generic.name_reciver')}} : </span><span>{{session('namegirandeh')}}</span>
              </div>
              <div class="col-md-4">
                  <span>{{__('generic.mobile')}} : </span><span>{{session('mobile')}}</span>
              </div>
          </div>
          <div class="row p-2">
              <div class="col-md-4 offset-md-2 ">
                  <span>{{__('generic.number')}}  : </span><span>{{session('number')}}</span>
              </div>
              <div class="col-md-4">
                  <span> {{__('generic.total_for_pay')}}  : </span><span>{{session('mablagh')}}</span>
              </div>
          </div>
          <div class="row p-2"  style="background-color: rgba(91,142,141,0.45)">
              <div class="col-md-4 offset-md-2">
                  <span>{{__('generic.way_of_pay')}} : </span><span>{{__('generic.interneti')}}</span>
              </div>
              <div class="col-md-4">
                  <span> {{__('generic.state_of_buy')}} : </span><span>{{__('generic.processing')}}</span>
              </div>
          </div>
          <div class="row p-2">
              <div class="col-md-8 offset-md-2">
                  <span> {{__('generic.address')}}  : </span><span>{{session('address')}}</span>
              </div>
          </div>
      </div>
    <div class="container">
        <div class="mt-3">
            <h4>{{__('generic.detail_pay')}}</h4>
        </div>
    </div>
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-8">
                <table class="table table-responsive table-hover table-striped">
                    <thead class="text-center">
                    <tr>
                        <th>{{__('generic.row')}}</th>
                        <th>{{__('generic.name_gate_pay')}}</th>
                        <th>{{__('generic.number_transaction')}}</th>
                        <th>{{__('generic.date')}}</th>
                        <th>{{__('generic.price')}}({{__('generic.vahed_pool')}})</th>
                        <th>{{__('generic.status')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(session('result'))

                            <tr>
                                <td>1</td>
                                <td>{{__('generic.pay_ir')}}</td>
                                <td>{{session('result')->transId}}</td>
                                <td>{{now()}}</td>
                                <td>{{number_format(session('result')->amount /10)}}</td>
                                <td>{{__('generic.success_pay')}}</td>

                            </tr>

                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group">
            <a class="btn btn-dark " href="/"> {{__('generic.home')}}</a>
        </div>
    </div>




    @include('ersal')
    @include('footer')
@section('title',__('generic.bag_buy'))
@endsection

