<div class="image-slider" style="height:450px;width: 100%; margin: 0;">
    <img class="mySlides" src="imgs/banner1.jpg" alt="Movie banner" style="width:100%;height:100%">
    <img class="mySlides" src="imgs/banner2.jpg" alt="Movie banner" style="width:100%;height:100%">
    <img class="mySlides" src="imgs/banner3.jpg" alt="Movie banner" style="width:100%;height:100%">
    <img class="mySlides" src="imgs/banner4.jpg" alt="Movie banner" style="width:100%;height:100%">
    <img class="mySlides" src="imgs/banner5.jpg" alt="Movie banner" style="width:100%;height:100%">
</div>
<script>
    var myIndex = 0;
    autoimgslider();

    function autoimgslider() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(autoimgslider, 5000);
    }
</script>


<style>
    .mySlides {
        object-fit: cover;
        object-position: center;
        animation: fadeIn ease 2s;
        -webkit-animation: fadeIn ease 2s;
        -moz-animation: fadeIn ease 2s;
        -o-animation: fadeIn ease 2s;
    }
    @keyframes fadeIn {
        0% {
            opacity:0;
        }
        100% {
            opacity:1;
        }
    }

    @-moz-keyframes fadeIn {
        0% {
            opacity:0;
        }
        100% {
            opacity:1;
        }
    }

    @-webkit-keyframes fadeIn {
        0% {
            opacity:0;
        }
        100% {
            opacity:1;
        }
    }

    @-o-keyframes fadeIn {
        0% {
            opacity:0;
        }
        100% {
            opacity:1;
        }
    }
</style>