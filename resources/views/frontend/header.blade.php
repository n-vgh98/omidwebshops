<?php
use TCG\Voyager\Models\Category;
$catagories = Category::all();

$root = $catagories->filter(function ($value, $key) {
    return $value->parent_id == null;
});
$root = $root->sortBy('order');


//dd($root);
?>
{{--  set language --}}
<?php
if (session()->has('locale')) {
    App::setLocale(session('locale'));
}
$root->load('translations');
$catagories->load('translations');
?>

<!--header mobile-->
<div class="container d-block d-lg-none">
    <div class="row" style="display: block !important;">
        <div class="col-xs-12 MBborerBotte">
            <div class="row " style="display: block !important;">
                <div class="MBs-toggler d-block">
                    <p>فارسی</p>
                    <p>English</p>
                    <input type="hidden" name="MBoption-choose" id="MBtoggleInput">
                    <div onclick="MBtoggleToggler(this,'MBtoggleInput')" class="MBoption-box"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-lg-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="row MBrowSabtenam">
                    <div class="col-md-1"></div>
                    <button type="button" class="col-md-4 btn MBsearchHeader MBbackgcolorblueSabtenam">ثبت نام</button>
                    <div class="col-md-2"></div>
                    <button type="button" class="col-md-4 btn MBsearchHeader MBbackgcolorbluelogin">
                        <i class="fas fa-sign-in-alt"></i>
                    </button>
                    <div class="col-md-1"></div>
                </div>
                <div class="row MBrowSabadKHarid">
                    <button type="button" class="col-md-12 btn MBsabadKHarid MBbackgcolorblueSabtenam">سبد خرید</button>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <img class="MBertefaLofo" src="http://omidwebshop.ir/front/jpg/logo.jpg"/>
            </div>
        </div>
        <!--        //menu and search-->
        <div class="row MBbackgcolorbluelogin MBrowMENU">
            <div class="col-md-10">
                <div class="row" style="direction: rtl;">
                    <div class="col-md-1"></div>
                    <div class="col-md-8 p-0 m-0 text-left MBpading">
                        <input type="search" class="MBsearchhh1" placeholder="  جست و جو...">
                    </div>
                    <div class="col-md-2 p-0 m-0 text-right MBpading">
                        <button type="button" class="btn MBsearchhh2"><i class="fas fa-search"></i></button>
                    </div>

                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="col-md-2 ">
                <!-- The overlay -->
                <div id="myNav" class="overlay">

                    <!-- Button to close the overlay navigation -->
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                    <!-- Overlay content -->
                    <div class="overlay-content">
                        <a href="#">About</a>
                        <a href="#">Services</a>
                        <a href="#">Clients</a>
                        <a href="#">Contact</a>
                    </div>

                </div>

                <!-- Use any element to open/show the overlay navigation menu -->
                <span class="MBspanMenu" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </div>
        </div>
        <!--        //menu and search-->
    </div>
</div>
<!--header mobile-->


<!-- header   pc  -->
<div class="container-fluid bgElemanWhite">
    <div class="row PaddingTopMenu paddingHeader1">
        <div class="col-xl-4 col-lg-5 p-0">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-7 s-toggler <?php if (__('generic.is_rtl') == 'true') echo 'ltr'; else echo 'rtl' ?> ">
                    <p><a href="{{url('fa')}}" style="color: white;">فارسی</a></p>
                    <p><a href="{{url('en')}}" style="color: white;">English</a></p>
                    <input type="hidden" name="option-choose" id="toggleInput">
                    <div onclick="toggleToggler(this,'toggleInput')" class="option-box"></div>
                </div>
            </div>
            <div class="row faseleSabadkharidBeBala">
                <div class="col-lg-1"></div>
                <div class="col-lg-4 p-0">
                    <a href="/sabadKharid">
                        <button type="button" class="btn m-0 sizeSabadKharid"><i class="fas fa-cart-arrow-down"></i>
                            <span class="badge badge-pill badge-success "
                                  style="z-index: 5;">{{(session('numCart')) ?? '0'}}</span>
                            <i class="icon ion-ios-cart-outline"
                               style="font-size: 60px;color: rgb(0,0,0);width: 60px;"></i>
                            <span style="color: white;"> {{__('generic.bag_cart')}}
                        </span>
                        </button>
                    </a>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4 text-right p-0">
                    <div>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            {{-- --------------------  drop down menu  --}}
                            <div class="dropdown  profile dropdownLogin" role="presentation" >
                                <a class="dropdown-toggle no-arrow" data-toggle="dropdown" aria-expanded="true"
                                   href="#">
                                    <span
                                        class="d-none d-lg-inline  text-secondary small"
                                        style="color: white!important; font-weight: bold;">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                    <img class="border rounded-circle img-profile dropdown2Login"
                                         style="Border-radius:0px 7px 0px 7px!important;"
                                         src="{{asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}">
                                </a>
                                <div class="dropdown-menu shadow   dropdown-menu-animated  border-secondary "
                                     role="menu" style="z-index: 111111111" id="profileBlock">
                                    <a class="dropdown-item text-right" role="presentation" href="{{url('profile')}}">
                                        <i class="fas fa-user fa-sm fa-fw  text-gray-400"></i>&nbsp;{{__('generic.profile')}}
                                    </a>
                                    <a class="dropdown-item text-right" role="presentation" href="{{url('/')}}">
                                        <i class="fas fa-home  fa-sm fa-fw  text-gray-400"></i>&nbsp;{{__('generic.home')}}
                                    </a>
                                    <a class="dropdown-item text-right" role="presentation"
                                       href="{{url('sabadKharid')}}"><i
                                            class="fas fa-shopping-basket fa-sm fa-fw text-gray-400"></i>&nbsp; {{__('generic.bag_cart')}}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-right text-danger" role="presentation"
                                       href="{{route('logout')}}"><i
                                            class="fas fa-sign-out-alt fa-sm fa-fw  text-gray-400"></i>&nbsp;{{__('generic.exit')}}
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <button type="button" class="col-lg-6 btn colorLOGIN sizLogin1">
                                    <a href="{{route('login')}}" style="color: white;">
                                        {{__('generic.login')}}
                                    </a>
                                </button>
                                <div class="col-lg-6 text-left p-0" id="divVorod">
                                    <button type="button" class="btn colorCreate sizLogin2">
                                        <a href="{{route('register')}}" style="color: white;">ثبت نام</a>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-5 align-items-center mt-auto mb-auto">
            <div class="row p-0">
                <form class="form-inline text-right" action="{{url('search')}}" method="post">
                    @csrf
                    <button class="col-lg-2 buttnSearch hSearch hhSearch">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    <input class="col-lg-10 form-control mt-auto btnSearch hSearch hhhSearch" type="search"
                           placeholder="{{__('generic.search')}} "
                           style="border-radius: 0px 45px 45px 0px !important;"
                           name="valueSearch" aria-label="Search">
                    {{--<input type="submit" class="btn btn-primary" name="btnSearch" value="{{__('generic.search')}}">--}}

                </form>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 text-center">
            <img class="sizeLogo" href="#" src="{{asset('front/jpg/logo.jpg')}}"/>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row rtlElement bgMenu">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-1"></div>

                <div class="col-xl-2 col-lg-3 p-0 text-center">
                    <!--                        <button type="button" class="btnmenu" id="btnMahsolat" onclick="showControl()">-->
                    <!--                            <h6>محصولات و خدمات</h6>-->
                    <!--                        </button>-->

                    <div class="dropdown divLiE">
                        <a href="javascript:void(0)" class="dropbtn">محصولات و خدمات</a>
                        <div class="dropdown-content shadowBaxs andazeTagAHa"
                             style="background-image:url('{{asset('front/pic/3.jpg')}}');background-size: cover;background-repeat: no-repeat;">
                            @foreach($root as $item)

                                <a @if($item->name == __('generic.home')) href="/"
                                   @else href="/product/catagory/{{$item->name}}" @endif >{{ $item->getTranslatedAttribute('name') }}</a>
                                {{--                            <a href="#">تجهیزات حمام و دستشویی</a>--}}
                                {{--                            <a href="#">تهیه ی و نگهداری نوشیدنی</a>--}}
                                @php
                                    $id = $item->id;

                                    $cat1 = $catagories->filter(function ($value,$key) use($id){
                                                   return $value->parent_id == $id;
                                    });
                                    $countItemCate1 = $cat1->count() ;
                                    if($countItemCate1 == 0)
                                        $col = 12;
                                    else
                                          $col = (12 / $countItemCate1);
                                @endphp
                                @if($countItemCate1 > 0)


                                    <div class="dropdown-menu w-100 dropdown-menu-right mt-n2">
                                        <div class="container-fluid">
                                            <div class="row ">
                                                @foreach($cat1 as $itemcat1)
                                                    <div class="col-{{$col}} p-1">
                                                        <a href="/product/catagory/{{$item->name}}/catagory/{{$itemcat1->name}}"
                                                           style="text-decoration: none"><h6
                                                                class="dropdown-header text-center">{{$itemcat1->name}}</h6>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        @php
                                                            $id = $itemcat1->id;
                                                          $cat2 = $catagories->filter(function ($value,$key) use($id){
                                                                           return $value->parent_id == $id;
                                                                                      });
                                                        @endphp
                                                        @foreach($cat2 as $cat2)
                                                            <a class="dropdown-item  text-center"
                                                               href="/product/catagory/{{$item->name}}/catagory/{{$itemcat1->name}}/catagory/{{$cat2->name}}">{{$cat2->name}}</a>
                                                        @endforeach

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-2 p-0 text-center">
                    <button type="button" class="btnmenu ">
                        <a class="nav-link" href="/contact-us"
                           style="color: white;padding-top: 0;">{{__('generic.contact_us')}}</a>
                    </button>
                </div>
                <div class="col-2 p-0 text-center">
                    <button type="button" class="btnmenu ">
                        <a class="nav-link" href="/about-us"
                           style="color: white;padding-top: 0;">{{__('generic.about_us')}}</a>
                    </button>
                </div>
                <div class="col-lg-4"></div>
            </div>

        </div>

    </div>
</div>

<!--    menu-->
{{--<div class="container hiddenitem " id="listMenu">--}}
{{--    <div class="row rtlElement boxshadowLIST withePIC borderMENU" id="borderList" style=" display: block;background-image:url('front/pic/3.jpg'); ">--}}
{{--        --}}
{{--        --}}
{{--        --}}
{{--        --}}
{{--        @foreach($root as $item)--}}
{{--        <div class="col-lg-3 text-right bgList p-0 pt-2">--}}
{{--            <a class="colorList m-0" @if($item->name == __('generic.home')) href="/" @else href="/product/catagory/{{$item->name}}" @endif>--}}
{{--                <h6 class=" h6colorList " onclick="hiddenItem1()">{{ $item->getTranslatedAttribute('name') }}</h6>--}}
{{--            </a>--}}
{{--            <br/>--}}
{{--            @php--}}
{{--                $id = $item->id;--}}

{{--                $cat1 = $catagories->filter(function ($value,$key) use($id){--}}
{{--                               return $value->parent_id == $id;--}}
{{--                });--}}
{{--                $countItemCate1 = $cat1->count() ;--}}
{{--                if($countItemCate1 == 0)--}}
{{--                    $col = 12;--}}
{{--                else--}}
{{--                      $col = (12 / $countItemCate1);--}}
{{--            @endphp--}}
{{--        </div>--}}
{{--            @if($countItemCate1 > 0)--}}
{{--                <div class="col-lg-9 p-0">--}}
{{--                    <div class="row" id="Items1" style="display: none">--}}
{{--                         <div class="row">--}}
{{--                             @foreach($cat1 as $itemcat1)--}}
{{--                                  <div class="col-lg-4 m-0 p-2 menu2Border">--}}
{{--                                     <a href="/product/catagory/{{$item->name}}/catagory/{{$itemcat1->name}}" class=" m-0 ">--}}
{{--                                         <h6 class="h6colorList2">{{$itemcat1->name}}</h6>--}}
{{--                                     </a>--}}
{{--                                     <br/>--}}
{{--                                        @php--}}
{{--                                        $id = $itemcat1->id;--}}
{{--                                        $cat2 = $catagories->filter(function ($value,$key) use($id){--}}
{{--                                        return $value->parent_id == $id;--}}
{{--                                        });--}}
{{--                                        @endphp--}}
{{--                                  </div>--}}
{{--                                      @foreach($cat2 as $cat2)--}}
{{--                                         <div class="col-lg-4 m-0 p-2 menu2Border ">--}}
{{--                                             <a class=" m-0 " href="/product/catagory/{{$item->name}}/catagory/{{$itemcat1->name}}/catagory/{{$cat2->name}}">--}}
{{--                                                <h6 class="h6colorList2">{{$cat2->name}}</h6>--}}
{{--                                             </a>--}}
{{--                                              <br/>--}}
{{--                                         </div>--}}
{{--                                      @endforeach--}}
{{--                             @endforeach--}}
{{--                         </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                @endif--}}

{{--@endforeach--}}
{{--    </div>--}}
{{--</div>--}}


{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endif--}}

{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}
{{--<a href="#" class="colorList m-0 "><h6 class=" h6colorList " onclick="hiddenItem2()">تجهیزات حمام و--}}
{{--دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class="colorList m-0 "><h6 class=" h6colorList " onclick="hiddenItem3()">تهیه ی و نگهداری--}}
{{--نوشیدنی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class="colorList m-0 "><h6 class=" h6colorList " onclick="hiddenItem4()">آماده سازی غذا</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class="colorList m-0 "><h6 class=" h6colorList " onclick="hiddenItem5()">لوازم منزل</h6></a>--}}

{{--<div class="col-lg-9 p-0">--}}
{{--<div class="row" id="Items1" style="display: none">--}}
{{--<div class="row">--}}
{{--<div class="col-lg-4 m-0 p-2 menu2Border ">--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}

{{--</div>--}}
{{--</div>--}}


{{--<div class="{{$col}}-lg-4 m-0 p-2 menu2Border ">--}}
{{----}}
{{----}}
{{----}}
{{--</div>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endif                        --}}{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}

{{--@foreach($cat2 as $cat2)--}}
{{--<div class="col-lg-4 m-0 p-2 menu2Border ">--}}
{{--<a class=" m-0 " href="/product/catagory/{{$item->name}}/catagory/{{$itemcat1->name}}/catagory/{{$cat2->name}}">--}}
{{--<h6 class="h6colorList2">{{$cat2->name}}</h6>--}}
{{--</a>--}}
{{--<br/>--}}
{{--@endforeach--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم بزرگ آشپزخانه</h6></a>--}}
{{--<br/>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</div>--}}

{{--</div>--}}


{{--<div class="row " id="Items2" style="display: none">--}}
{{--<div class="row">--}}
{{--<div class="col-lg-4 m-0 p-2 menu2Border">--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--</div>--}}
{{--<div class="col-lg-4 m-0 p-2 menu2Border">--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--</div>--}}
{{--<div class="col-lg-4 m-0 p-2 menu2Border">--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تجهیزات حمام و دستشویی</h6></a>--}}
{{--<br/>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--<div class="row " id="Items3" style="display: none">--}}
{{--<div class="col-lg-4 m-2 menu2Border">--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تهیه ی و نگهداری نوشیدنی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تهیه ی و نگهداری نوشیدنی</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">تهیه ی و نگهداری نوشیدنی</h6></a>--}}
{{--<br/>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row " id="Items4" style="display: none">--}}
{{--<div class="col-lg-4 m-2 menu2Border">--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">آماده سازی غذا</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">آماده سازی غذا</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">آماده سازی غذا</h6></a>--}}
{{--<br/>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row " id="Items5" style="display: none">--}}
{{--<div class="col-lg-4 m-2 menu2Border">--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم منزل</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم منزل</h6></a>--}}
{{--<br/>--}}
{{--<a href="#" class=" m-0 "><h6 class="h6colorList2">لوازم منزل</h6></a>--}}
{{--<br/>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}

{{--</div>--}}
{{--</div>--}}

<!--    menu-->


<!-- header   pc  -->
