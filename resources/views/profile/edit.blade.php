<x-app-layout>

    <div class="container p-1 text-center bg-info text-white">
        <h4>
            {{ Auth::user()->name }}{{ __('\'s Profile') }}
        </h4>
    </div>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <hr><hr>
        @include('frontend.userdashboard.sidebar')
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Page content-->
            <div class="container-fluid m-1">
                <div class="container-fluid mt-5">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <hr>
                <div class="container-fluid mt-5">
                    @include('profile.partials.update-password-form')
                </div>
                <hr>
                <div class="container-fluid mt-5">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
