 <!-- Modal for Create and Edit User-->
  <div class="modal fade text-left" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="user-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user-modal-label">New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('admin.users.store') }}" id="user-form" autocomplete="off">
                @csrf
                <div class="pl-lg-4">
                    {{-- Name --}}
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name')}}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    {{-- Email --}}
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="close-modal">Reset</button>
          <button type="button" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('user-form').submit();">Save changes</button>
        </div>
      </div>
    </div>
</div>

@push('js')
    @if ($errors->any())
    <script>
           $(document).ready(function(){
                    $('#user-modal').modal({
                        show: true,
                        backdrop: 'static'
                    });
            });
    </script>
    @endif
    <script>
        $('#user-modal').on('hidden.bs.modal', function() {
                $(this).find("input, select").val("").end();
        });
    </script>
@endpush
