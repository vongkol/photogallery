@extends("layouts.setting")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Gallery List</strong>&nbsp;&nbsp;
                    <a href="{{url('/upload-gallery/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                <form action="{{url('/upload-gallery/search')}}" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category" class="control-label col-sm-4 lb"><b>Filter by Category</b></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="category" name="category">
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-info btn-flat" value="Search" name="Search">
                            </div>
                        </div><br>
                </form>
                </select>
                    <table class="tbl table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gallery</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $pagex = @$_GET['page'];
                                if(!$pagex)
                                    $pagex = 1;
                                $i = 25 * ($pagex - 1) + 1;
                            ?>
                            @foreach($gallerys as $gal)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{asset('uploads/gallerys/'.$gal->category_id.'/'.$gal->gallery)}}" alt="gallery" width="72" id="preview"></td>
                                    <td>{{$gal->description}}</td>
                                    <td>{{$gal->name}}</td>
                                    <td>
                                        <a class="btn btn-danger btn-flat" href="{{url('/upload-gallery/delete/'.$gal->id)}}" onclick="return confirm('You want to delete?')"
                                        title="Delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                      {{ $gallerys->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $("#siderbar li a").removeClass("current");
        $("#upload").addClass("current");
    })
</script>
@endsection