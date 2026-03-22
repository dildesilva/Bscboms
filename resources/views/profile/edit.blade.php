<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-0">
        <div class="max-w-7xl mx-auto space-y-6">
            <!-- Update Profile Information -->
            <div class="p-6 sm:p-8 bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl shadow-lg shadow-blue-500/10">
                <div class="max-w-xl">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-white">{{ __('Profile Information') }}</h3>
                        <p class="mt-1 text-sm text-white/60">{{ __("Update your account's profile information and email address.") }}</p>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 sm:p-8 bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl shadow-lg shadow-purple-500/10">
                <div class="max-w-xl">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-white">{{ __('Update Password') }}</h3>
                        <p class="mt-1 text-sm text-white/60">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-6 sm:p-8 bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl shadow-lg shadow-red-500/10">
                <div class="max-w-xl">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-white">{{ __('Delete Account') }}</h3>
                        <p class="mt-1 text-sm text-white/60">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}</p>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
