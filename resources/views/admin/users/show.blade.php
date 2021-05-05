@extends('admin.layouts.app')
@section('content')
@push('css')
<style>
    .card-body{
        margin-top: 7rem;
    }
</style>
@endpush
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                {{-- alert Display --}}
                @include('admin.includes.alert')

                <form action="{{route('users.avatar.update', $user->id)}}" method="post" id="profile-form" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="imgupload" name="avatar" style="display:none"/>
                </form>
                <div class="card shadow mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#" id="img-link">
                                    <img src="{{ $user->avatar ? asset("storage/avatars/$user->avatar") :  asset('img/team/2.jpg') }}" class="rounded-circle" width="150" height="150" id="previewImg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                             {{-- Nav Tabs  --}}
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Profile</a>
                                    <a class="nav-item nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                                    aria-controls="edit" aria-selected="false">Edit</a>
                                </div>
                            </nav>

                            {{-- Tabs Content --}}
                            <div class="tab-content" id="nav-tabContent">
                                {{-- Profile --}}
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    @include('admin.includes.user_show')
                                </div>

                                {{-- Edit --}}
                                <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                    @include('admin.includes.user_edit')
                                </div>
                            </div>

                            <a style="margin-top:20px;" class="btn btn-default" href="{{ route('users.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@push('js')
@if ($errors->any())
    <script>
           $(document).ready(function(){
                    $('#edit-tab').trigger('click');
            });
    </script>
@endif
    <script>
        $('#img-link').on('click', function(e) {
            e.preventDefault();
            $('#imgupload').click();
        });
        $('#imgupload').on('change', function(){
            var file = $("input[type=file]").get(0).files[0];

            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                }
                reader.readAsDataURL(file);

                $('#profile-form').submit();
            }
        });
    </script>
@endpush
@endsection
