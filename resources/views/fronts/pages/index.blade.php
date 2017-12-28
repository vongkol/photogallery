@extends("layouts.front")
@section('content')
<div class="row contain-b">
<div class="row contain-b">
    <div class="slideshow-container">
        <div class="col-md-12 slideshow ">
            <img src="{{asset('front/img/slide1.jpg')}}" class="mySlides" style="width:100%;"/>
            <img src="{{asset('front/img/slide2.jpg')}}" class="mySlides" style="width:100%;"/>
        </div>
    </div>
    <div class="main">
        <!-- TABS -->
        <div class="col-md-12 ">
        
        <br>
            <h4>Document description</h4>
            <hr>
        </div>
        
        <div class="col-md-12 col-sm-12">
            <p class="margin-bottom-10">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.</p>
        </div>
        </div>
    </div>
</div>
<br>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
@endsection