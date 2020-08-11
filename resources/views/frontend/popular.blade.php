@php
    use TCG\Voyager\Models\Category;
        $avalablefilter->load('translations');
       $avalablefilter->load('translations');
       $products->load('translations');
       //$translateCatagory = Category::all();
      // $translateCatagory->load('translations') ;


@endphp
@extends('laayoytss.master')

@section('content')
    @include('frontend.header')
    {{--new card--}}
    <div class="cantainer-flut">
        <div class="row">
<!--filters-->
            <div class="col-lg-1">
                <!--                        menu filter-->
                <div id="mySidepanel" class="sidepanel">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <br/>
                    <h6 class="colorFooter text-center">فیلتر و جست و جوی هوشمند</h6>

                    <form method="post" class="p-2" style="direction: ltr">
                        @isset($avalablefilter)
                            @foreach($avalablefilter as $af)
                        <div class=" my-3 " style="border: solid; padding: 2%;color: white;">
                            <fieldset>
                                <legend style="border-bottom: solid white 1px">{{$af->getTranslatedAttribute('name')}} </legend>
                                <div>
                                    <input type="hidden" name="{{$af->name.'[]'}}" value="{{$af->name}}">
                                    @foreach($avaliblefiltervalue as $afv)
                                    @if($afv->filter_id == $af->id)
                                    <input type="checkbox" id="coding" name="{{$af->slug.'[]'}}" value="{{$afv->value}}">
                                            <?php
                                                foreach ($requestold->query() as $key => $value)
                                                {
                                                if($key == $af->slug)
                                                {
                                                foreach ($value as $v)
                                                if($v == $afv->value)
                                                echo 'checked';
                                                }
                                                }
                                            ?>
                                    <label for="coding"> {{$afv->getTranslatedAttribute('value')}} </label>
                                        @endif
                                        @endforeach
                                </div>

                            </fieldset>
                        </div>
                            @endforeach
                        @endisset

                        <button type="button" class="btn btn-primary "><i class="fa fa-search" aria-hidden="true"></i>
                            جست و
                            جو
                        </button>

                    </form>
                </div>

                <button class="openbtn" onclick="openNav()"><i class="fa fa-search" aria-hidden="true"></i>
                    فیلتر و جست و جوی هوشمند
                </button>
                <!--                        menu filter-->
            </div>
{{--end filters--}}
{{--carts--}}
            <div class="col-lg-10" style=" direction: rtl;">
                <div class="row">
                    @if($products->count()>0)

                        <ul class="breadcrumb justify-content-lg-start">
                            <li class="breadcrumb-item  px-1"><a href="/"><span
                                            class="fa fa-home ml-1"></span>{{__('generic.home')}}</a></li>
                            @isset($catagory)
                                <li class="breadcrumb-item px-1"><a
                                            href="/product/catagory/{{$catagory[0]['cat1']}}">{{$cat1_translated}}</a>
                                </li>
                                @if($catagory[0]['cat2'] !=NULL)
                                    <li class="breadcrumb-item   px-1"><a
                                                href="/product/catagory/{{$catagory[0]['cat1']}}/catagory/{{$catagory[0]['cat2']}}">{{$cat2_translated}}</a>
                                    </li>
                                @endif
                                @if($catagory[0]['cat3'] !=NULL)
                                    <li class="breadcrumb-item   px-1"><a
                                                href="/product/catagory/{{$catagory[0]['cat1']}}/catagory/{{$catagory[0]['cat2']}}/catagory/{{$catagory[0]['cat3']}}">{{$cat3_translated}}</a>
                                    </li>
                                @endif
                            @endisset
                        </ul>
                </div>
                <div class="row">
                    @foreach($products as $pro)
                        <a href="/detailProduct/{{$pro->id}}" class="text-decoration-none ">
                            <div class="col-lg-3 p-2">
                                <div class="card shadowBaxs">
                                    <img class="card-img-top"
                                         src="{{asset('storage/products/'.($pro->productimages()->first())['image']  )}}"
                                         alt="Card image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$pro->getTranslatedAttribute('name')}}</h5>
                                        <p class="card-text"> {{__('generic.price')}}
                                            : {{number_format($pro->price)}} {{__('generic.vahed_pool')}}</p>
                                        <a href="/detailProduct/{{$pro->id}}" class="btn btn-primary">افزودن به سبد
                                            خرید</a>
                                        @if($pro->available <0)
                                            <div><span class="text-danger">{{__('generic.not_available')}}</span></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                {{--safheye bdune mahsul--}}
                @else
                    <ul class="breadcrumb justify-content-lg-start">
                        <li class="breadcrumb-item  px-1"><a href="/"><span
                                        class="fa fa-home ml-1"></span>{{__('generic.home')}}</a></li>
                        @isset($catagory)
                            <li class="breadcrumb-item px-1"><a
                                        href="/product/catagory/{{$catagory[0]['cat1']}}">{{$cat1_translated}}</a>
                            </li>
                            @if($catagory[0]['cat2'] !=NULL)
                                <li class="breadcrumb-item   px-1"><a
                                            href="/product/catagory/{{$catagory[0]['cat1']}}/catagory/{{$catagory[0]['cat2']}}">{{$cat2_translated}}</a>
                                </li>
                            @endif
                            @if($catagory[0]['cat3'] !=NULL)
                                <li class="breadcrumb-item   px-1"><a
                                            href="/product/catagory/{{$catagory[0]['cat1']}}/catagory/{{$catagory[0]['cat2']}}/catagory/{{$catagory[0]['cat3']}}">{{$cat3_translated}}</a>
                                </li>
                            @endif
                        @endisset
                    </ul>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card text-center" style="height: 250px; width: 800px;margin-right:200px; margin-top: 50px;">
                                <div class="card-header">
                                    اطلاعیه
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">محصولی در این دسته بندی وجود ندارد</h5>
                                    <p class="card-text">با عرض پوزش از شما کاربر عزیز. در این دسته بندی به زودی محصولات جدید قرار
                                        میگیرد.</p>
                                </div>
                                <div class="card-footer text-muted">
                                    2روز پیش
                                </div>
                            </div>
                            <div style="margin-bottom: 20%;"></div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
    {{--end cards--}}

    @include('frontend.footer')



    <script type="text/javascript">

        /* Set the width of the sidebar to 250px (show it) */
        function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
            document.getElementById("mySidepanel").style.marginTop = "5%";
            document.getElementById("mySidepanel").style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
            document.getElementById("mySidepanel").style.borderRadius = "15px";
        }

        /* Set the width of the sidebar to 0 (hide it) */
        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }

        // filterha
        // filterha
        // filterha

        //MMMOBILEEEEEE
        //MMMOBILEEEEEE

        function MBtoggleToggler(elm, MBinputID) {
            const MBinput = document.getElementById(MBinputID);
            elm.classList.toggle('MBoption-box-toggled');
            elm.parentElement.classList.toggle('MBs-toggler-toggled');
            if (elm.classList.contains('MBoption-box-toggled')) {
                MBinput.value = 'option2';
            } else {
                MBinput.value = 'option1';
            }
        }

        //MMMOBILEEEEEE
        //MMMOBILEEEEEE
        //MMMOBILEEEEEE

        //PPPCCC
        //PPPCCC
        //PPPCCC
        //PPPCCC
        // محصولات و خدمات
        let listMenu = document.getElementById("listMenu");
        let btnMahsolat = document.getElementById("btnMahsolat");
        let showORhidden = false;
        showControl = () => {
            showORhidden = !showORhidden;
            console.log(showORhidden);
            if (showORhidden === true) {
                console.log("block");
                listMenu.style.display = "block";
                btnMahsolat.style.border = "darkblue";
                btnMahsolat.style.backgroundColor = "darkblue";
            } else {
                console.log("none");
                listMenu.style.display = "none";
                btnMahsolat.style.border = "#4a6f97";
                btnMahsolat.style.backgroundColor = "#4a6f97";
            }
        }
        // محصولات و خدمات
        //انتقال ایتم منو اول به زیرمجموعه هاش
        let showControlItem1 = false;
        let showControlItem2 = false;
        let showControlItem3 = false;
        let showControlItem4 = false;
        let showControlItem5 = false;

        function hiddenItem1() {

            if (showControlItem1 === true) {
                document.getElementById("Items1").style.display = "none";
                document.getElementById("Items2").style.display = "none";
                document.getElementById("Items3").style.display = "none";
                document.getElementById("Items4").style.display = "none";
                document.getElementById("Items5").style.display = "none";
            } else {
                document.getElementById("Items1").style.display = "block";//اونی که می خوایم نمایش بدهد
                document.getElementById("Items2").style.display = "none";
                document.getElementById("Items3").style.display = "none";
                document.getElementById("Items4").style.display = "none";
                document.getElementById("Items5").style.display = "none";
            }
            showControlItem2 = showControlItem1;
            showControlItem3 = showControlItem1;
            showControlItem4 = showControlItem1;
            showControlItem5 = showControlItem1;
            showControlItem1 = !showControlItem1;
            //باید حتما اونی که می خواد تغییر کند اخر قرار بگیرد

        }

        function hiddenItem2() {

            if (showControlItem2 === true) {
                document.getElementById("Items1").style.display = "none";
                document.getElementById("Items2").style.display = "none";
                document.getElementById("Items3").style.display = "none";
                document.getElementById("Items4").style.display = "none";
                document.getElementById("Items5").style.display = "none";
            } else {
                document.getElementById("Items2").style.display = "block";//اونی که می خوایم نمایش بدهد
                document.getElementById("Items1").style.display = "none";
                document.getElementById("Items4").style.display = "none";
                document.getElementById("Items5").style.display = "none";
                document.getElementById("Items3").style.display = "none";
            }
            showControlItem3 = showControlItem2;
            showControlItem4 = showControlItem2;
            showControlItem1 = showControlItem2;
            showControlItem5 = showControlItem2;
            showControlItem2 = !showControlItem2;
            //باید حتما اونی که می خواد تغییر کند اخر قرار بگیرد

        }

        function hiddenItem3() {

            if (showControlItem3 === true) {
                document.getElementById("Items1").style.display = "none";
                document.getElementById("Items2").style.display = "none";
                document.getElementById("Items3").style.display = "none";
                document.getElementById("Items4").style.display = "none";
                document.getElementById("Items5").style.display = "none";
            } else {
                document.getElementById("Items1").style.display = "none";
                document.getElementById("Items2").style.display = "none";
                document.getElementById("Items4").style.display = "none";
                document.getElementById("Items5").style.display = "none";
                document.getElementById("Items3").style.display = "block";//اونی که می خوایم نمایش بدهد
            }
            showControlItem4 = showControlItem3;
            showControlItem1 = showControlItem3;
            showControlItem2 = showControlItem3;
            showControlItem5 = showControlItem3;
            showControlItem3 = !showControlItem3;//باید حتما اونی که می خواد تغییر کند اخر قرار بگیرد

        }

        function hiddenItem4() {
            if (showControlItem4 === true) {
                document.getElementById("Items1").style.display = "none";
                document.getElementById("Items2").style.display = "none";
                document.getElementById("Items3").style.display = "none";
                document.getElementById("Items4").style.display = "none";
                document.getElementById("Items5").style.display = "none";

            } else {
                document.getElementById("Items1").style.display = "none";
                document.getElementById("Items2").style.display = "none";
                document.getElementById("Items3").style.display = "none";
                document.getElementById("Items4").style.display = "block";//اونی که می خوایم نمایش بدهد
                document.getElementById("Items5").style.display = "none";
            }
            showControlItem1 = showControlItem4;
            showControlItem2 = showControlItem4;
            showControlItem3 = showControlItem4;
            showControlItem5 = showControlItem4;
            showControlItem4 = !showControlItem4;//باید حتما اونی که می خواد تغییر کند اخر قرار بگیرد
        }

        function hiddenItem5() {
            if (showControlItem5 === true) {
                document.getElementById("Items1").style.display = "none";
                document.getElementById("Items2").style.display = "none";
                document.getElementById("Items3").style.display = "none";
                document.getElementById("Items4").style.display = "none";
                document.getElementById("Items5").style.display = "none";
            } else {
                document.getElementById("Items1").style.display = "none";
                document.getElementById("Items2").style.display = "none";
                document.getElementById("Items3").style.display = "none";
                document.getElementById("Items4").style.display = "none";
                document.getElementById("Items5").style.display = "block";//اونی که می خوایم نمایش بدهد
            }
            showControlItem1 = showControlItem5;
            showControlItem2 = showControlItem5;
            showControlItem3 = showControlItem5;
            showControlItem4 = showControlItem5;
            showControlItem5 = !showControlItem5;//باید حتما اونی که می خواد تغییر کند اخر قرار بگیرد
        }

        //انتقال ایتم منو اول به زیرمجموعه هاش


        function toggleToggler(elm, inputID) {
            const input = document.getElementById(inputID);
            elm.classList.toggle('option-box-toggled');
            elm.parentElement.classList.toggle('s-toggler-toggled');
            if (elm.classList.contains('option-box-toggled')) {
                input.value = 'option2';
            } else {
                input.value = 'option';
            }
        }

        //PPPCCC
        //PPPCCC
        //PPPCCC
        //PPPCCC


        $(document).ready(function () {
            $(':checkbox').change(function () {
                if (this.checked) {
                    var currenturl = "{{url()->current()}}";
                    var currentfullurl = "{{url()->full()}}";
                    //   window.alert(currenturl);
                    if (currenturl == currentfullurl) {
                        window.location = currenturl + "?" + this.name + "=" + this.value;
                    }

                    else {
                        currentfullurl = '<?php echo urldecode(url()->full())?>';
                        window.location = currentfullurl + "&" + this.name + "=" + this.value;
                    }

                }
                else {
                    var hashes = [], hash;
                    var currenturl = "{{url()->current()}}";
                    currenturl = currenturl + "?";
                    console.log("current url is : " + currenturl);
                    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

                    console.log("lent of curl item is : " + hashes.length);
                    for (var i = 0; i < hashes.length; i++) {
                        hash = hashes[i].split('=');
                        if (decodeURI(hash[1]) != this.value) {
                            currenturl += hashes[i];
                            if (i != hashes.length - 1)
                                currenturl += "&";
                            console.log("in iterate " + i + "is : " + hash[1] + "and this value is :" + this.value);
                        }

                        console.log("current url in " + i + " is:" + currenturl);


                    }
                    window.location = currenturl;
                    // console.log("current url in "+ i+" is:" +currenturl);
                }

            });

            // change range of price controll
            $('#customrangeprice').change(function () {
                var range = $('#customrangeprice').val();
                var currenturl = "{{url()->current()}}";
                var currentfullurl = "{{url()->full()}}";
                //   window.alert(currenturl);
                if (currenturl == currentfullurl) {
                    window.location = currenturl + "?" + this.name + "=" + this.value;
                }

                else {
                    var hashes = [], hash;
                    var currenturl = "{{url()->current()}}";
                    currenturl = currenturl + "?";

                    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                    console.log("lent of rang is :" + hashes.length);
                    for (var i = 0; i < hashes.length; i++) {
                        hash = hashes[i].split('=');
                        if (hash[0] != this.name) {
                            currenturl += hashes[i];
                            if (i != hashes.length - 1 && hash[0] != '')
                                currenturl += "&";

                        }
                    }
                    // currentfullurl = '<?php echo urldecode(url()->full())?>';
                    window.location = currenturl + "&" + this.name + "=" + this.value;
                }
            });
            // show or hide of checkbox filters

        });

        function togglefilter(id) {
            var fil = document.getElementById('chckboxfilters' + id);
            if (fil.style.display == 'block')
                fil.style.display = "none";
            else
                fil.style.display = "block";

        }

        function search() {
            // $('#customrangeprice').e
            //   var range = $('#customrangeprice').val();

            //  cu =  currentUrl +"?range="+range+"&brand="+brand;
            //  window.location = cu;


        }

                @isset($selectedBrand )
        var i = '{{$selectedBrand ?? ''}}';
        $('#brandSelect option').filter(function () {
            return $(this).text() == i;
        }).attr('selected', true);
        @endisset
        @isset($OldValueOfrange)
        $('#customrangeprice').val({{$OldValueOfrange}});

        @endisset
    </script>
    {{--@section('title', $cat1_translated)--}}
@endsection

