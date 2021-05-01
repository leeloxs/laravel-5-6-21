@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <create-item />
        </div>
        <div class="row">
            <all-items />
        </div>
    </div>
@endsection
