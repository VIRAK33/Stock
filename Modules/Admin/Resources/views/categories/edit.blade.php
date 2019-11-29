@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i class="fa fa-star"></i> Create Category</h3>
                </div>
                <div class="col-sm-8">
                    <a href="{{route('category.index')}}" class="btn btn-primary btn-sm float-right">
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
            <form action="{{route('category.update', $category->id)}}" method="POST" >
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group row">
                            <label class="col-sm-2" for='title'>Title <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" required 
                                    value="{{$category->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for='category'>Category</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$category->category}}" name="category" id="category">
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
                </div>
            </form>
        </div>
    </div>
@endsection

