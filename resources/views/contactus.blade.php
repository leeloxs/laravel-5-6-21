@extends('layouts.app')
 
@section('contactus')
Contact us
@endsection

@section('content')

<!-- Contact-->
       
        
        <div class="row justify-content-center">
    <div class="col-xl-8 col-lg-8">
        @if(Session::has('message_sent'))
            <div class="alert alert-success" role="alert">
            {{Session:get('message_sent')}}
            </div>
        @endif

        <div class="login-form">
            <form method="POST" action="contactusstore" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label for="fullname" class="col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ isset(Auth::user()->firstname) ? Auth::user()->firstname : '' }} {{ isset(Auth::user()->lastname) ? Auth::user()->lastname : '' }}" required autocomplete="Fullname" autofocus>

                            @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-6">

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                    </div>

                    <div class="col-6">
                        
                        <div class="form-group">
                            <label for="phone" class="col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ isset(Auth::user()->phone) ? Auth::user()->phone : '' }}" required autocomplete="phone" autofocus>

                            @error('phonenumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                
                    
                        <div class="form-group">
                            <label for="subject" class="col-form-label text-md-right">{{ __('Subject') }}</label>

                            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" required autofocus>

                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">

                            <label for="message" class="col-form-label text-md-right">{{ __('Message') }}</label>

                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" required></textarea>

                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                
                        <div class="form-group">
                            <label for="upload" class="col-form-label text-md-right">{{ __('Attach Screenshot') }}</label>

                            <input type="file" accept="image/*" class="form-control @error('screenshot') is-invalid @enderror" name="screenshot" autofocus>

                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Message') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
        </section>
@endsection