@extends("layouts.setting")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Slideshow List</strong>&nbsp;&nbsp;
                    <a href="{{url('/slideshow/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                </select>
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $pagex = @$_GET['page'];
                                if(!$pagex)
                                    $pagex = 1;
                                $i = 12 * ($pagex - 1) + 1;
                            ?>
                            @foreach($slideshows as $sli)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{asset('uploads/slideshows/'.$sli->image)}}" alt="gallery" width="72" id="preview"></td>
                                    <td>
                                        <a class="btn btn-flat btn-danger" href="{{url('/slideshow/delete/'.$sli->id)}}" onclick="return confirm('You want to delete?')"
                                        title="Delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $("#siderbar li a").removeClass("current");
        $("#slideshow").addClass("current");
    })
</script>
@endsection