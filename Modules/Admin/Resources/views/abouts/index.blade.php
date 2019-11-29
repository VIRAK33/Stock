@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i class="fa fa-question"></i> About</h3>
                </div>
                <div class="col-sm-8">
                    <a href="{{url('admin/about/edit/'.$about->id)}}" class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-edit"></i> Edit
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
          
            <form>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group row">
                            <label class="col-sm-2">Title </label>
                            <div class="col-sm-10">
                                : {{$about->title}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3">Photo</label>
                            <div class="col-sm-9">
                                <img src="{{asset($about->featured_photo)}}" alt="" width="120" id="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Description</h3>
                        {!! $about->description !!}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

