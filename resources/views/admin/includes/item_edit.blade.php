@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
<form action="{{ route('admin.items.update', $item->id) }}" method="post" autocomplete="off" class="p-1" id="form-item-edit">
    @csrf
    @method('PATCH')
    <div class="pl-lg-4">
        <div class="row mt-3">
            {{-- Title--}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Title') }}*</label>
                    <input type="text" name="title" id="input-name" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') ?? $item->title}}" required autofocus>
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- Description --}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-body">{{ __('Body') }}*</label>
                    <input type="email" name="body" id="input-body" class="form-control form-control-alternative{{ $errors->has('body') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('body') ?? $item->body }}" required>

                    @if ($errors->has('body'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- Quantity --}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-quantity">{{ __('Quantity') }}*</label>
                    <input type="number" name="quantity" id="input-quantity" class="form-control form-control-alternative{{ $errors->has('quantity') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('quantity') ?? $item->quantity }}" required>

                    @if ($errors->has('quantity'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('quantity') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>


    <div class="text-center">
        <button class="btn btn-success" id="save-changes">Save</button>
    </div>
</form>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
          $(document).ready(function () {
            $('#save-changes').on('click', function(e) {
                e.preventDefault();
                $('#form-item-edit').submit();
            });
        });
    </script>

@endpush
