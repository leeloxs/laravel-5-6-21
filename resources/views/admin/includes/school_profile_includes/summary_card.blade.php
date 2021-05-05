<div class="card card-profile shadow">
    <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">

            <form action="{{route('users.avatar.update', auth()->user()->id)}}" method="post" id="profile-form" enctype="multipart/form-data">
                @csrf
                <input type="file" id="imgupload" name="avatar" style="display:none"/>
            </form>

            <div class="card-profile-image">
                <a href="#" id="img-link">
                    @php
                        $avatar= auth()->user()->avatar;
                    @endphp
                    <img src="{{  $avatar? asset("storage/avatars/$avatar") : asset('storage/avatars/male_avatar.png') }}" class="rounded-circle"
                         width="150" height="150" id="previewImg">
                </a>
            </div>
        </div>
    </div>
    <div class="card-header text-center border pt-6  pb-0 pb-md-2 p-1">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
        </div>
    </div>
    <div class="card-body pt-0 pt-md-4">
        <div class="row">
            <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                        <span class="heading">22</span>
                        <span class="description">{{ __('Friends') }}</span>
                    </div>
                    <div>
                        <span class="heading">10</span>
                        <span class="description">{{ __('Photos') }}</span>
                    </div>
                    <div>
                        <span class="heading">89</span>
                        <span class="description">{{ __('Comments') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <h3>
                {{ auth()->user()->name }}<span class="font-weight-light">, {{ date_diff(date_create(auth()->user()->dob), date_create('now'))->y }}                                </span>
            </h3>
            <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>{{ auth()->user()->country}} , {{auth()->user()->state}}
            </div>
            <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>
                @foreach (auth()->user()->roles as $role)
                    {{ ucfirst($role->name) }}
                @endforeach
                - {{ config('app.name') }}
            </div>
            <div>
                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
            </div>
            <hr class="my-4" />
            <div id="profile-description">
                <div class="text show-more-height">
                    {{auth()->user()->bio}}
                </div>
                <div class="show-more">Show More</div>
            </div>
            <!-- [End] #profile-description -->
        </div>
    </div>
</div>
