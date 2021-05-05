<div class="modal fade" id="create-package" tabindex="-1" role="dialog" aria-labelledby="create-package-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-package-label">Create New Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action=" {{ route('packages.store') }} " method="post" id="package-create-form">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="$('#package-create-form').submit();">Save changes</button>
            </div>
        </div>
    </div>
</div>
