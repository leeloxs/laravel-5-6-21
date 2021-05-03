@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <create-post />
        </div>
        <div class="row">
            <all-posts />
        </div>
    </div>
@endsection
