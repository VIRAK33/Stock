@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <iframe src="{{asset('fileman/index.html')}}" 
            frameborder="0" width="100%" height="450">
            </iframe>
        </div>
    </div>
@endsection

