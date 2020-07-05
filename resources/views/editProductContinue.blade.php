@extends('voyager::master')
@php
    if(session()->has('locale') )
    {
        App::setLocale(session('locale'));
    }
    $isModelTranslatable = true;
@endphp
@section('page_title',__('product.about_product'))
@section('page_header')

   <h3 class="text-center"> {{__('product.about_product')}}</h3>
   <div class="language-selector-about " style="text-align: {{__('generic.is_rtl') == 'true' ? 'left' : 'right'}}">
       <div class="btn-group btn-group-sm" role="group" data-toggle="">
           @foreach(config('voyager.multilingual.locales') as $lang)
               <label class="btn btn-primary{{ ($lang === config('voyager.multilingual.default')) ? " active focus" : "" }}">
                   <input type="radio" class="hide" name="i18n_selector" id="{{$lang}}" autocomplete="off"{{ ($lang === config('voyager.multilingual.default')) ? ' checked="checked"' : '' }} > {{ strtoupper($lang) }}
               </label>
           @endforeach
       </div>
   </div>
   @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
@endsection

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <form  method="post"    action="{{route('voyager.products.update',$id)}}"   enctype="multipart/form-data" id="createproductform" class="form-edit-add">
                {{ method_field("PUT") }}
                @csrf
                <input type="hidden" name="name" value="{{ $name}}">
                <input type="hidden" name="name_i18n" value="{{$name_i18n}}">
                <input type="hidden" name="price" value="{{$price}}">
                <input type="hidden" name="takhfif" value="{{$takhfif}}">
                <input type="hidden" name="catagory1" value="{{$catagory1}}">
                <input type="hidden" name="catagory2" value="{{$catagory2}}">
                <input type="hidden" name="catagory3" value="{{$catagory3}}">
                <input type="hidden" name="company_i18n" value="{{$company_i18n}}">
                <input type="hidden" name="company" value="{{$company}}">
                <input type="hidden" name="available" value="{{$available}}">
                <input type="hidden" name="featuers_i18n" value="{{$featuers_i18n}}">
                <input type="hidden" name="featuers" value="{{$featuers}}">
                 @if(isset($filter ) )
                        @foreach($filter as $fi)
                            <input type="hidden" name="filter[]" value="{{$fi}}">
                        @endforeach


                    @foreach($filtervalues as $fi => $fval)
                        @foreach($fval as $a => $b)
                           <input type="hidden" name="{{$a}}" value="{{$b}}">
                        @endforeach
                    @endforeach
                @endif
                <div class="col-md-12">
                    <span class="language-label js-language-label badge badge-danger"></span>
                    <input type="hidden"
                           data-i18n="true"
                           name="aboutProduct_i18n"
                           id="aboutProduct_i18n"
                           value="{{ $aboutProduct_i18n }}"
                        >
                        <textarea id="ckeckditor1" name="aboutProduct" class="form-control" >
                                    {{$aboutProduct}}
                        </textarea>
                </div>

            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-primary " name="savecountinue" value="{{__('generic.save')}}">
            </div>
            </form>
        </div>
    </div>
    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i>{{__('product.is_sure')}}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{__('product.delete_sure')}}<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('product.cancel')}}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{__('product.yes_delete')}}</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('style/ckeditor/ckeditor.js')}}"></script>

    <script type="text/javascript">
       // CKEDITOR.replace( 'ckeckditor1' );
        CKEDITOR.replace('aboutProduct', {
            language : '{{__('generic.is_rtl') == 'true' ? 'fa' : 'en'}}' ,
        });

    </script>
@endsection

    <script src="{{asset('style/jquery.min.js')}}"></script>

@section('javascript')
    <script>


        $('document').ready(function () {


            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs


      //      $('.side-body').multilingual({"editing": true});



            // ckeditor

            function  returnLocale() {
                return 	$(":radio").filter(function() {
                    return $(this).parent().hasClass('active');
                }).prop('id');
            }
            function setup() {
                $('.js-language-label').text(returnLocale());
                myObj = {'fa' : '' , 'en' : ''};
                var myJSON = JSON.stringify(myObj);
                $('#aboutProduct_i18n').val(myJSON);
            }
       // setup();
          //  window.alert("text" + $('textarea[name=DSC]').text());
            $(':radio').click(function () {
                if($(this).parent().hasClass('active')) return ;
                    var lang = $(this).attr('id');
                   $(':radio').parent().removeClass('active');
                $(':radio').parent().removeClass('focus');
                   $(this).parent().addClass('active');
                $(this).parent().addClass('focus');
                    dataofckeditor =   CKEDITOR.instances['ckeckditor1'].getData();
                    $('.js-language-label').text(lang);
                    var aboutproductvalue = $('#aboutProduct_i18n').val();
                    var aboutproductvalue = JSON.parse(aboutproductvalue);
                    var myObj;
                if(lang == 'en')
                    {
                        myObj = {'fa' : dataofckeditor , 'en' : aboutproductvalue.en};
                        CKEDITOR.instances.ckeckditor1.setData(aboutproductvalue.en ,function () {
                            this.checkDirty();
                        } );
                    }

                    else
                    {
                        myObj = {'fa' : aboutproductvalue.fa , 'en' : dataofckeditor};
                        CKEDITOR.instances.ckeckditor1.setData(aboutproductvalue.fa ,function () {
                            this.checkDirty();
                        });

                    }
                var jsonString = JSON.stringify(myObj);
                $('#aboutProduct_i18n').val(jsonString);



            });
            $('.form-edit-add').submit(function (e) {
                $(':radio').each(function () {
                    if($(this).parent().hasClass('active') )
                    {
                        var lang = $(this).attr('id');
                        dataofckeditor =   CKEDITOR.instances['ckeckditor1'].getData();
                        var aboutproductvalue = $('#aboutProduct_i18n').val();
                        var aboutproductvalue = JSON.parse(aboutproductvalue);
                        var myObj;
                        if(lang == 'fa')
                        {
                            myObj = {'fa' : dataofckeditor , 'en' : aboutproductvalue.en};

                        }

                        else
                        {
                            myObj = {'fa' : aboutproductvalue.fa , 'en' : dataofckeditor};

                        }
                        var jsonString = JSON.stringify(myObj);
                        $('#aboutProduct_i18n').val(jsonString);



                    }
                });
                $('.form-control').val(myObj.fa);

            });
        });

    </script>
@stop




