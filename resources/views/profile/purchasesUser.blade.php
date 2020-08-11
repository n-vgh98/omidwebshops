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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header py-3 text-{{__('generic.text_direction')}}">
                            <p class="text-danger m-0 font-weight-bold">{{__('generic.pershuse')}}</p>
                        </div>
                        <div class="card-body">
                            <div class="panel border shadow">
                                <div class="panel-content">
                                    <table class="table table-responsive table-hover table-striped">
                                        <thead class="text-center">
                                            <tr>
                                                <th>{{__('generic.row')}}</th>
                                                <th>{{__('generic.name_product')}}</th>
                                                <th> {{__('generic.price_unit')}}({{__('generic.vahed_pool')}})</th>
                                                <th>{{__('generic.number')}}</th>
                                                <th> {{__('generic.price_total')}}</th>
                                                <th>{{__('generic.date')}}</th>
                                                <th> {{__('generic.number_transaction')}}</th>
                                                <th>{{__('generic.state_of_buy')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1 @endphp

                                            @isset($purchases)
                                            @foreach($purchases as $sal)
                                                <tr>
                                                    <td>{{$i++ }}</td>
                                                    <td>{{$sal->name}}</td>
                                                    <td>{{number_format(  ($sal->price)-($sal->price * $sal->takhfif/100) )}}</td>
                                                    <td>{{$sal->number}}</td>
                                                    <td>{{number_format( (($sal->price)-($sal->price * $sal->takhfif/100))* $sal->number )}}</td>
                                                    <td>{{$sal->created_at}}</td>
                                                    <td>{{$sal->transId}}</td>
                                                    <td>
                                                        @if($sal->status =='در حال پردازش')
                                                            <span class="bg-danger text-dark p-1 rounded">{{$sal->status}}</span>
                                                            @else
                                                            <span class="bg-success text-dark p-1 rounded">{{$sal->status}}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
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
@section('title',__('generic.pershuse'))

@endsection

