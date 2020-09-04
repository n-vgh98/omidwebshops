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
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('omidwebbb/style.css')}}">

</head>
<body>
<nav class="nav-area p-0 m-0">
    <ul>
        <li class="p-0 m-0"><a class="p-0 m-0" href="javascript:void(0)">محصولات و خدمات</a>
            <ul>
                @foreach($root as $item)
                    <li>
                        <a @if($item->name == __('generic.home')) href="/"
                           @else href="/product/catagory/{{$item->name}}" @endif>
                            {{ $item->getTranslatedAttribute('name') }}
                        </a>
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
                            <ul>
                                @foreach($cat1 as $itemcat1)
                                    <li><a href="/product/catagory/{{$item->name}}/catagory/{{$itemcat1->name}}">{{$itemcat1->name}}</a>
                                        @php
                                            $id = $itemcat1->id;
                                          $cat2 = $catagories->filter(function ($value,$key) use($id){
                                                           return $value->parent_id == $id;
                                                                      });
                                        @endphp
                                        <ul>
                                            @foreach($cat2 as $cat2)
                                            <li><a href="/product/catagory/{{$item->name}}/catagory/{{$itemcat1->name}}/catagory/{{$cat2->name}}">{{$cat2->name}}</a></li>
                                           @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                       </li>
                @endforeach

            </ul>
         </li>
    </ul>
</nav>
</body>
</html>
<script type="text/javascript">


    // code of button for go to top of page site
    var speed = 250;
    var offset = 150;
    var duration = 500;
    $(window).scroll(function () {
        if ($(this).scrollTop() < offset) {
            $('.btndowntoup').fadeOut(duration);
        } else {
            $('.btndowntoup').fadeIn(duration);
        }
    });
    $('btndowntoup').on('click', function () {

        $('html,body').animate({scrollTop: 0}, speed);
        return false;
    });


    new WOW().init();
</script>