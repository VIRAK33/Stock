@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i class="fa fa-star"></i> Edit News</h3>
                </div>
                <div class="col-sm-8">
                    <a href="{{route('news.index')}}" class="btn btn-primary btn-sm float-right">
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
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <ul>
                       @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                       @endforeach
                   </ul>
                </div>
            @endif
            <form action="{{route('news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group row">
                            <label class="col-sm-2" for='title'>Title <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required 
                                    value="{{$news->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for='position'>Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name="description" required 
                                    value="{{$news->description}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2"> </label>
                            <div class="col-sm-10">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group row">
                            <label class="col-sm-3" for='photo'>Photo <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="photo" name="photo" required 
                                    onchange="preview(event)">
                                <div style="margin-top: 9px">
                                    <img src="" alt="" width="180" id="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function preview(evt)
        {
            let img = document.getElementById('img');
            img.src = URL.createObjectURL(evt.target.files[0]);
        }
    </script>
@endsection
@section('js')
    <script src="{{asset('admin-assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        var roxyFileman = "{{asset('fileman/index.html')}}"; 
        $(function(){
            CKEDITOR.replace( 'profile',{filebrowserBrowseUrl:roxyFileman,
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