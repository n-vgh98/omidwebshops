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


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link href="{{asset('omidwebbb/css/css1.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
<header class="header">
    <h1 id="demo">Mouse over me</h1>

</header>


<nav>
    <ul class="ulSupMenu">
        <li class="liSupMenu" id="dropdown" onMouseOver="mouseOver(this)" onMouseOut="mouseOut(this)"><a  href="#" >محصولات و خدمات</a></li>
        <li class="liSupMenu"><a href="#">تماس با ما</a></li>
        <li class="liSupMenu"><a href="#">درباره ما</a></li>
    </ul>
    <!--
    <button class="li1"><a id="dropdown" href="#" >محصولات و خدمات</a></button>
        <button class="li1"><a href="#">تماس با ما</a></button>
        <button class="li1"><a href="#">درباره ما</a></button>
    -->
</nav>

<nav class="dropdown-content5" id="submenuId" onMouseOver="mouseOver(this)" onMouseOut="mouseOut(this)">
    <nav class="nav2SubMenu">

             <ul class="ul2SubMenu">
                 @foreach($root as $item)
                 <li class="li2SubMenu" onMouseOver="mouseOver2(this)" onMouseOut="mouseOut2(this)">

                    <a @if($item->name == __('generic.home')) href="/"
                       @else href="/product/catagory/{{$item->name}}" @endif >
                        {{ $item->getTranslatedAttribute('name') }}
                    </a>
                </li>
                 @endforeach
             </ul>
    </nav>
    <nav class="nav3SubMenu" id="nav3SubMenuId">
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
        <ul class="ul2SubMenu">
            @foreach($cat1 as $itemcat1)
            <li class="li2SubMenu" onMouseOver="mouseOver2(this);mouseOver3(this)" onMouseOut="mouseOut2(this);mouseOut3(this)">
                <a href="/product/catagory/{{$item->name}}/catagory/{{$itemcat1->name}}"
                   style="text-decoration: none">
                   {{$itemcat1->name}}</a>
            </li>
            @endforeach
        </ul>

        @endif
    </nav>
    <nav class="nav3SubMenu" id="nav4SubMenuId">
        @php
            $id = $itemcat1->id;
          $cat2 = $catagories->filter(function ($value,$key) use($id){
                           return $value->parent_id == $id;
                                      });
        @endphp

        <ul class="ul2SubMenu">
            @foreach($cat2 as $cat2)
            <li class="li2SubMenu" onMouseOver="mouseOver2(this);mouseOver3(this)" onMouseOut="mouseOut2(this);mouseOut3(this)">
                <a href="/product/catagory/{{$item->name}}/catagory/{{$itemcat1->name}}/catagory/{{$cat2->name}}">{{$cat2->name}}</a>
            </li>
            @endforeach
        </ul>

    </nav>

</nav>
<script>
    function mouseOver() {
        document.getElementById("submenuId").style.display = "block";
    }

    function mouseOut() {
        document.getElementById("submenuId").style.display = "none";
    }
    function mouseOver2() {
        document.getElementById("nav3SubMenuId").style.display = "none";
        document.getElementById("nav3SubMenuId").style.display = "block";
    }

    function mouseOut2() {
        document.getElementById("nav3SubMenuId").style.display = "none";
    }
    function mouseOver3() {
        document.getElementById("nav4SubMenuId").style.display = "none";
        document.getElementById("nav4SubMenuId").style.display = "block";
    }

    function mouseOut3() {
        document.getElementById("nav4SubMenuId").style.display = "none";
    }
</script>








</body>
</html>
