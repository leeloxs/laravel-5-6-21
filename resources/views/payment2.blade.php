@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white">Upload your reciept</h3>
                    </div>
                    <div class="card-body">
                        
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
                   
                        <form method="POST" action="{{ url('receipt') }}" enctype="multipart/form-data"> 
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Amount:</strong>
                                        <input type="text" name="amount" class="form-control" placeholder="Example. 50RM, 100RM" value="{{ old('Amount') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('Amount') }}</span>
                                        @endif
                                    </div>
                                </div>
                               
                               
                            
                               
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Upload reciept</strong>
                                        <input type="file" name="upload" class="form-control"  value="{{ old('upload') }}">
                                        @if ($errors->has('upload'))
                                            <span class="text-danger">{{ $errors->first('upload') }}</span>
                                        @endif
                                    </div>
                                </div>  
                  
                   
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">Donate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
@endsection