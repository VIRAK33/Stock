@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i class="fa fa-star"></i> Portfolios</h3>
                </div>
                <div class="col-sm-8">
                    <a href="{{route('portfolios.create')}}" class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-plus"></i> Create
                    </a>
                </div>
            </div>
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
            <table class="table table-bordered table-sm">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Category</th>
                    <th>Other</th>
                </thead>
                <tbody>
                    <?php
                        $page = @$_GET['page'];
                        if(!$page)
                        {
                            $page = 1;
                        }
                        $i = config('app.row') * ($page -1) + 1;
                    ?>
                    @foreach($portfolios as $filios)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$filios->title}}</td>
                            <td>
                                <img src="{{asset($filios->photo)}}" alt="" width="72">
                            </td>
                            <td>{{$filios->cate_name}}</td>
                           
                            <td>
                                <a href="{{route('portfolios.delete', $filios->id)}}" class="btn btn-danger btn-sm" 
                                    title="Delete" onclick="return confirm('You want to delete?')">
                                    Delete
                                </a>
                                <a href="{{route('portfolios.edit', $filios->id)}}" class="btn btn-success btn-sm" 
                                    title="Edit">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$portfolios->links()}}
        </div>
    </div>
@endsection
