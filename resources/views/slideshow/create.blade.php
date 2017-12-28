@extends("layouts.setting")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Create Slideshow</strong>&nbsp;&nbsp;
                    <a href="{{url('/slideshow')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                    <form action="{{url('/slideshow/save')}}" class="form-horizontal" enctype="multipart/form-data" method="post" onsubmit="return confirm('You want to save?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="slideshow" class="control-label col-sm-3 lb">Image <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="file" name="slideshow" onchange="loadFile(event)" id="slideshow" accept="image/*" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="slideshow" class="control-label col-sm-3 lb"></label>
                                    <div class="col-sm-8">
                                    <img src="" id="img"/>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="ngo" class="control-label col-sm-3 lb"></label>
                                    <div class="col-sm-8">
                                        <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                        <button class="btn btn-danger btn-flat" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function loadFile(e){
            var output = document.getElementById('img');
            output.width = 150;
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection
@section('js')
   
    <script>
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#slideshow").addClass("current");
        });
    </script>
@endsection