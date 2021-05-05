

<div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
        <div class="row align-items-center">
            <h3 class="col-12 mb-0">{{ __('School Profile') }}</h3>
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
                <div class="row">
                    <div class="col">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{--                bio         --}}
                <div class="row">
                    <div class="col">
                        <div class="form-group{{ $errors->has('bio') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Bio') }}</label>
                            <textarea class="form-control form-control-alternative{{ $errors->has('bio') ? ' is-invalid' : '' }}" id="input-bio" name="bio" rows="3" style="resize: none" placeholder="{{ __('Bio') }}" required autofocus>
                                            {{ old('bio', auth()->user()->bio) }}
                                        </textarea>
                            @if ($errors->has('bio'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('bio') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- Country --}}
                    <div class="col">
                        <div class="form-group" {{ $errors->has('country') ? 'has-error' : '' }}>
                            <label for="country" class="form-control-label">Country</label>
                            <select class="form-control form-control-alternative" name="country" id="country" required>
                                <option value="">Select a country</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->name }}" {{ auth()->user()->country === $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                            <em class="invalid-feedback">
                                {{ $errors->first('country') }}
                            </em>
                            @endif
                        </div>
                    </div>
                    {{-- states --}}
                    <div class="col">
                        <div class="form-group" {{ $errors->has('state') ? 'has-error' : '' }}>
                            <label for="state" class="form-control-label">State</label>
                            <select class="form-control form-control-alternative" name="state" required id="state" {{ !isset(auth()->user()->country) ? 'disabled' : '' }}>
                                <option value="">Select a state</option>
                                @isset(auth()->user()->country)
                                @php
                                $country = App\Models\Country::whereName(auth()->user()->country)->first();
                                $country->load('states');
                                @endphp
                                @foreach($country->states as $state)
                                <option value="{{ $state->name }}" {{ auth()->user()->state === $state->name ? 'selected' : '' }}>{{ $state->name }}</option>
                                @endforeach
                                @endisset
                            </select>
                            @if($errors->has('state'))
                            <em class="invalid-feedback">
                                {{ $errors->first('state') }}
                            </em>
                            @endif
                        </div>
                    </div>
                </div>

                {{--            phone vs telephone vs fax                    --}}
                <div class="row">
                    {{-- Phone --}}
                    <div class="col">
                        <div id="phone-group"
                             class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-phone">Phone Number</label>
                            <input type="text" name="phone" id="input-phone" value="{{ auth()->user()->phone }}"
                                   class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                   placeholder="Phone Number">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- telephone --}}
                    <div class="col">
                        <div id="telephone-group"
                             class="form-group{{ $errors->has('telephone') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-telephone">Telephone</label>
                            <input type="text" name="telephone" id="input-telephone" value="{{ auth()->user()->school->telephone }}"
                                   class="form-control form-control-alternative{{ $errors->has('telephone') ? ' is-invalid' : '' }}"
                                   placeholder="Phone Number">
                            @if ($errors->has('telephone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telephone') }}</strong>-
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- fax --}}
                    <div class="col">
                        <div id="fax-group"
                             class="form-group{{ $errors->has('fax') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-fax">Fax</label>
                            <input type="text" name="fax" id="input-fax" value="{{ auth()->user()->school->fax }}"
                                   class="form-control form-control-alternative{{ $errors->has('fax') ? ' is-invalid' : '' }}"
                                   placeholder="Fax">
                            @if ($errors->has('fax'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fax') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Location') }}</label>
                            <textarea class="form-control form-control-alternative{{ $errors->has('location') ? ' is-invalid' : '' }}" id="input-location" name="location" rows="3" style="resize: none" placeholder="{{ __('Location') }}" required autofocus>
                                            {{ old('location', auth()->user()->school->location) }}
                                        </textarea>
                            @if ($errors->has('location'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{--        Social Media        --}}
                <div class="row">
                    {{--       facebook     --}}
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="facebook-icon"><i class="fab fa-facebook-f"></i></span>
                                </div>
                                <input type="text" class="form-control pl-2 {{ $errors->has('facebook') ? ' is-invalid' : '' }}" placeholder="Facebook" aria-label="Facebook"
                                        aria-describedby="facebook-icon" name="facebook" id="input-facebook" value="{{ old('facebook', auth()->user()->school->facebook) }}">
                            </div>
                        </div>
                    </div>
                    {{--       facebook     --}}
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="twitter-icon"><i class="fab fa-twitter"></i></span>
                                </div>
                                <input type="text" class="form-control pl-2 {{ $errors->has('twitter') ? ' is-invalid' : '' }}" placeholder="Twitter" aria-label="Twitter"
                                       aria-describedby="twitter-icon" name="twitter" id="input-twitter" value="{{ old('twitter', auth()->user()->school->twitter) }}">
                            </div>
                        </div>
                    </div>
                    {{--       website     --}}
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="website-icon"><i class="fas fa-globe"></i></span>
                                </div>
                                <input type="text" name="website" id="website-input" class="form-control pl-2 {{ $errors->has('website') ? ' is-invalid' : '' }}"
                                       placeholder="Website" aria-label="Website" aria-describedby="website-icon" value="{{ old('website', auth()->user()->school->website) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                </div>
            </div>
        </form>

    </div>
</div>
