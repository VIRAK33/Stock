@extends('admin::layouts.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Hello World</h1>

            <p>
                This view is loaded from module: {!! config('admin.name') !!}
            </p>
        </div>
    </div>
@endsection
