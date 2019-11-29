@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <h3><i class="fa fa-star"></i> News</h3>
                </div>
                <div class="col-sm-8">
                    <a href="{{route('news.create')}}" class="btn btn-primary btn-sm float-right">
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
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Created At</th>
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
                    @foreach($news as $n)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$n->title}}</td>
                            <td>{{$n->description}}</td>
                            <td>
                                <img src="{{asset($n->photo)}}" alt="" width="72">
                            </td>
                            <td>
                            {{$n->created_at}}
                            </td>
                        
                            <td>
                                <a href="{{route('news.delete', $n->id)}}" class="btn btn-danger btn-sm" 
                                    title="Delete" onclick="return confirm('You want to delete?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="{{route('news.edit', $n->id)}}" class="btn btn-success btn-sm" 
                                    title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$news->links()}}
        </div>
    </div>
@endsection
