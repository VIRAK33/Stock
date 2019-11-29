@extends('admin::layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
            <h3>Service</h3>
            </div>
            <div class="col-sm-8">
                <a href="{{route('service.create')}}" class="btn btn-success btn-sm float-right"> <i class="fa fa-plus"></i> create</a>
            </div>
        
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>icon</td>
                        <td>other</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $page = @$_GET['page'];
                        if(!$page)
                        {
                            $page = 1;
                        }
                        $i = config('app.row') * ($page - 1) + 1;
                    ?>
                    @foreach($service as $s)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$s->title}}</td>
                        <td>{{$s->description}}</td>
                        <td>{{$s->icon}}</td>
                        <td>
                            
                        <button class="btn btn-danger btn-sm" >
                            <a href="{{url('admin/service/delete/'.$s->id)}}" title="delete" style="text-decoration:none; color:white;"
                                onclick="return confirm('You want to delete?')">
                                <i class="fa fa-trash" style="text-color:red;"></i> Delete
                            </a>
                        </button>

                        <button class="btn btn-success btn-sm" >
                            <a href="{{route('service.edit',$s->id)}}" title="edit" style="text-decoration:none; color:white;">
                                <i class="fa fa-edit" style="text-color:red;"></i> Edit
                            </a>
                            
                            
                        </button>
                            
                        
                        </td>
                    </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
    {{$service->links()}}
    </div>

</div>
    
@endsection