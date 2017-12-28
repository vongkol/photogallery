@extends("layouts.front")
@section('content')
<!-- BEGIN SIDEBAR & CONTENT -->
<div class="row contain-b">
	<div class="col-md-12 col-sm-12">
		<h4>Gallery</h4> <hr>
    </div>
    <div class="row">
        @foreach($gallerys as $gal)
            <div class="col-md-4 col-sm-4 vdoo-width">
                <div class="content-page">
                    <div class="col-md-6">
                        <img src="{{asset('uploads/gallerys/'.$gal->gallery)}}" alt="gallery" width="100%">
                    </div>
                    <div class="col-md-6 col-g">
                        {{$gal->gallery}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-12 col-sm-12">
        <nav>
            {{$gallerys->links()}}
        </nav>
    </div>
</div>
@endsection