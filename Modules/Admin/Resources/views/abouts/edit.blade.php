@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i class="fa fa-question"></i> Edit About</h3>
                </div>
                <div class="col-sm-8">
                    <a href="{{url('admin/about')}}" class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-reply"></i> Back
                    </a>
                </div>
            </div>
            <hr>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>
                        {{session('success')}}
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>
                        {{session('error')}}
                    </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{url('admin/about/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-1">Title </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required 
                                    value="{{$about->title}}" name='title'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1">Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="photo" onchange="preview(event)">
                                <div style="margin-top: 9px">
                                    <img src="{{asset($about->featured_photo)}}" alt="" width="72" id="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Description</h3>
                        <textarea name="description" id="description" cols="30" rows="10" 
                            class="form-control">{{$about->description}}</textarea>
                        <p></p>
                        <p>
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        var roxyFileman = "{{asset('fileman/index.html')}}"; 
        $(function(){
            CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman,
                                        filebrowserImageBrowseUrl:roxyFileman+'?type=image',
                                        removeDialogTabs: 'link:upload;image:upload'}); 
        });
        function preview(evt)
        {
            let img = document.getElementById('img');
            img.src = URL.createObjectURL(evt.target.files[0]);
        }
    </script>
@endsection
