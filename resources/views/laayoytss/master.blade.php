<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/css/index.css')}}">
    {{--<link rel="stylesheet" href="{{asset('front/new omid web shop/css/Froshgah.css')}}"/>--}}
    <link rel="stylesheet" href="{{asset('front/fontawesome-free-5.13.1-web/css/all.css')}}"/>
    <!--    <link rel="stylesheet"href="fontawesome-free-5.13.1-web/js/all.js"/>-->
    <link rel="shortcut icon" href="{{asset('images/faivIcon.png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <title>LOI Shoppping</title>
</head>

<body class="bgsafheAsli">



<!--page asli-->
@yield('content')
<!--forosh-->



<!--page asli-->


</body>

<script>
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


</script>

</html>