@extends('layouts.app')

@section('content')
    <div class="container py-12">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
            {{ __('Profile') }}
        </h2>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Update Profile Information') }}</div>
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">{{ __('Update Password') }}</div>
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">{{ __('Delete User') }}</div>
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
