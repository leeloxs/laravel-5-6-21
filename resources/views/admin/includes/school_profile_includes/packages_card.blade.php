<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <div class="col-6 mb-0">
                <h3>{{ __('School Packages') }}</h3>

            </div>
            <div class="col-6 text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-package">
                    <i class="fas fa-plus"></i>
                </button>

                <!-- Modal -->
                @include('includes.school_profile_includes.create_package_modal')

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
                    <div class="row justify-content-around">
                        @forelse($packages as $package)
                        <div class="col-sm-3 bg-white text-white card p-5 shadow">
                            <div class="row justify-content-center">
                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <input type="price" name="price" style="height: 60px; font-size: 20px; width: 70px; user-select: auto;" id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price', $package->price) }}" required>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <input type="text" name="name" id="input-name" style="height: 100px;" class="form-control w-100 form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $package->name) }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                            <h3 class="text-center"> No packages found!</h3>
                        @endforelse
                    </div>
            </div>
        </form>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
        </div>
    </div>
</div>
