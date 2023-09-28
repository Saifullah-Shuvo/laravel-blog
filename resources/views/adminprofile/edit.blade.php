<x-app-layout>
    @extends('admin.master')
    @section('title')
        Admin Dashboard
    @endsection
    @push('css')
    @endpush
    @section('content')
        {{-- <div id="page-content-wrapper"> --}}
            <!-- Page content-->
            {{-- <div class="container-fluid m-1"> --}}
                <div class="container-fluid mt-5">
                    @include('adminprofile.partials.update-profile-information-form')
                </div>
                <hr>
                <div class="container-fluid mt-5">
                    @include('adminprofile.partials.update-password-form')
                </div>
                <hr>
                <div class="container-fluid mt-5">
                    @include('adminprofile.partials.delete-user-form')
                </div>
            {{-- </div> --}}
        {{-- </div> --}}
    @endsection
    @push('js')
    @endpush
</x-app-layout>
