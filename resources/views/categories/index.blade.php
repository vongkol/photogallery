@extends("layouts.setting")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Category List</strong>&nbsp;&nbsp;
                    <a href="{{url('/category/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
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
                            @foreach($categories as $cat)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>
                                        <a class="btn btn-flat btn-success" href="{{url('/category/edit/'.$cat->id)}}" title="Edit">Edit</a>
                                        <a class="btn btn-flat btn-danger" href="{{url('/category/delete/'.$cat->id)}}" onclick="return confirm('You want to delete?')"
                                        title="Delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$categories->links()}}
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
        $("#category").addClass("current");
    })
</script>
@endsection