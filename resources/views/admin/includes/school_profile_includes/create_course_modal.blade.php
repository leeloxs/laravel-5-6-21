<div class="modal fade" id="create-course" tabindex="-1" role="dialog" aria-labelledby="create-course-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-course-label">Create New Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action=" {{ route('courses.store') }} " method="post" id="course-create-form">
                    @csrf
                    {{--               Name            --}}
                    <div class="row justify-content-center">
                        <div class="form-group w-100{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <input type="text" name="name" id="input-name"  class="form-control w-100 form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>

                    {{--               Price            --}}
                    <div class="row justify-content-center">
                        <div class="form-group w-100 {{ $errors->has('price') ? ' has-danger' : '' }}">
                            <input type="number" name="price"  id="input-price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('price') }}" required>
                            @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>

                    {{--               Duration            --}}
                    <div class="row justify-content-center">
                        <div class="form-group w-100 {{ $errors->has('duration') ? ' has-danger' : '' }}">
                            <input type="number" name="duration" id="input-duration" class="form-control w-100 form-control-alternative{{ $errors->has('duration') ? ' is-invalid' : '' }}" placeholder="{{ __('Duration in month') }}" value="{{ old('duration') }}" required autofocus>
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
                            <input type="date" name="start_date" id="input-start_date" class="form-control w-100 form-control-alternative{{ $errors->has('start_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Date') }}" value="{{ old('start_date') }}" required autofocus>
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
                            <textarea  rows="3" style="resize: none" name="description" id="input-description" class="form-control w-100 form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}"  required autofocus> {{ old('description') ?? __('Description') }} </textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                    {{--               Package            --}}
                    <div class="row justify-content-center">
                        <div class="form-group w-100 {{ $errors->has('package') ? 'has-danger' : '' }}">
                            <select  name="packages"  id="input-package" class="form-control {{ $errors->has('package') ? 'is-invalid' : '' }}" >
                                @forelse ($packagesSelect as $id => $package)
                                    <option value=' {{ $id }} ' {{ old('package') ? 'selected' : '' }}>{{ $package }}</option>
                                @empty
                                    No  Packages
                                @endforelse
                            </select>
                            @if($errors->has('package'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('package') }}
                                </em>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="$('#course-create-form').submit();">Save changes</button>
            </div>
        </div>
    </div>
</div>
