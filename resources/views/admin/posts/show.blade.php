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


                <div class="card shadow mt-5">
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
                                    @include('admin.includes.post_show')
                                </div>

                                {{-- Edit --}}
                                <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                    @include('admin.includes.post_edit')
                                </div>
                            </div>

                            <a style="margin-top:20px;" class="btn btn-default" href="{{ route('admin.posts.index') }}">
                                Back to List
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
@endpush
@endsection
