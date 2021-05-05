<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-6 mb-0">
                <h3 >{{ __('School Courses') }}</h3>
            </div>
            <div class="col-6 text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-course">
                    <i class="fas fa-plus"></i>
                </button>

                <!-- Modal -->
                @include('includes.school_profile_includes.create_course_modal')

            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
            @csrf
            @method('put')
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="pl-lg-4">

                @forelse($packages as $package)
                    <h4>{{ $package->name }}</h4>
                    <div class="row justify-content-around">
                        @forelse($package->courses as $course)
                            <div class="col-sm-3 bg-white text-white card p-5 shadow">
                                <div class="row justify-content-center">
                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                        <input type="price" name="price" style="height: 60px; font-size: 20px; width: 70px; user-select: auto;" id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price', $course->price) }}" required>

                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group w-100{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input type="text" name="name" id="input-name" style="height: 100px;" class="form-control w-100 form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $course->name) }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                {{--               Duration            --}}
                                <div class="row justify-content-center">
                                    <div class="form-group w-100 {{ $errors->has('duration') ? ' has-danger' : '' }}">
                                        <input type="number" name="duration" id="input-duration" class="form-control w-100 form-control-alternative{{ $errors->has('duration') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('duration', $course->duration) }}" required autofocus>
                                        @if ($errors->has('duration'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('duration') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                {{--               Start date            --}}
                                <div class="row justify-content-center">
                                    <div class="form-group w-100 {{ $errors->has('start_date') ? ' has-danger' : '' }}">
                                        <input type="date" name="start_date" id="input-start_date" class="form-control w-100 form-control-alternative{{ $errors->has('start_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('start_date', $course->start_date) }}" required autofocus>
                                        @if ($errors->has('start_date'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                {{--               Description            --}}
                                <div class="row justify-content-center">
                                    <div class="form-group w-100 {{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <textarea  rows="3" style="resize: none" name="description" id="input-description" class="form-control w-100 form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" required autofocus>{{ old('description', $course->description) }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3 class="text-center"> No Courses found!</h3>
                        @endforelse
                    </div>
                @empty
                    <h3 class="text-center"> No Packages found!</h3>
                @endforelse
            </div>
        </form>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
        </div>
    </div>
</div>
