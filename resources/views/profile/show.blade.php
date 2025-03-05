<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Details</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Tailwind CSS (if you use it, otherwise ignore this) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="hero_area">
        <!-- Include Header -->
        @include('home.header')

        <div class="container mx-auto mt-10 px-4">
            <!-- Profile Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-semibold text-gray-800 leading-tight">
                    {{ __('Profile') }}
                </h2>
                <p class="text-lg text-gray-500 mt-2">Update your information and manage your settings.</p>
            </div>

            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white shadow-md rounded-lg">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <div class="mb-8">
                        <h3 class="text-xl font-medium text-gray-700">Update Profile Information</h3>
                        @livewire('profile.update-profile-information-form')
                    </div>
                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mb-8">
                        <h3 class="text-xl font-medium text-gray-700">Change Password</h3>
                        @livewire('profile.update-password-form')
                    </div>
                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mb-8">
                        <h3 class="text-xl font-medium text-gray-700">Two-Factor Authentication</h3>
                        @livewire('profile.two-factor-authentication-form')
                    </div>
                    <x-section-border />
                @endif

                <div class="mb-8">
                    <h3 class="text-xl font-medium text-gray-700">Log Out Other Browser Sessions</h3>
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-section-border />
                    <div class="mb-8">
                        <h3 class="text-xl font-medium text-gray-700">Delete Account</h3>
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>

        <!-- Include Footer -->
        @include('home.footer')

        <div class="cpy_ text-center mt-3">
            <p>© 2025 All Rights Reserved</p>
        </div>
    </div>

    <!-- jQuery and Bootstrap Scripts -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
</body>
</html>
