@extends("layouts.front")
@section('content')
<!-- BEGIN SIDEBAR & CONTENT -->
<div class="row contain-b">
	<div class="col-md-12 col-sm-12">
		<h4>Gallery</h4> <hr>
    </div>
        @foreach($gallerys as $gal)
            <div class="col-md-4 col-sm-4">
                <div class="col-md-6 vdoo-width">
                    <img src="{{asset('uploads/gallerys/'.$gal->category_id.'/'.$gal->gallery)}}" alt="gallery" class="max-height img-thumbnail">
                </div>
                <div class="col-md-6 col-g">
                    {{$gal->description}}
                </div>
            </div>
        @endforeach
    <div class="col-md-12 col-sm-12"><br><br>
        <nav class="text-center"> 
            {{$gallerys->links()}}
        </nav>
    </div>
</div>
<style>
    img {height: auto;
max-width: 100%;
vertical-align: middle;
border: 0;}
</style>
@endsection