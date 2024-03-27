<x-app-layout>
    <x-slot name="header">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="url('members')" :active="request()->routeIs('members')">
                    {{ __('Members') }}
                </x-nav-link>
                <x-nav-link :href="url('wallet')" :active="request()->routeIs('wallet')">
                    {{ __('Wallet') }}
                </x-nav-link>
                <x-nav-link :href="url('apiwallet')" :active="request()->routeIs('apiwallet')">
                    {{ __('API') }}
                </x-nav-link>
                <x-nav-link :href="url('apicircle')" :active="request()->routeIs('apicircle')">
                    {{ __('API Circle') }}
                </x-nav-link>
                <x-nav-link :href="url('providers')" :active="request()->routeIs('providers')">
                    {{ __('Providers') }}
                </x-nav-link>
                <x-nav-link :href="url('serviceproviders')" :active="request()->routeIs('serviceproviders')">
                    {{ __('Service Provider') }}
                </x-nav-link>
                <x-nav-link :href="url('apiroutes')" :active="request()->routeIs('apiroutes')">
                    {{ __('ApiRoutes') }}
                </x-nav-link>
                <x-nav-link :href="url('recharges')" :active="request()->routeIs('recharges')">
                    {{ __('Recharges') }}
                </x-nav-link>
                <x-nav-link :href="url('servicetype')" :active="request()->routeIs('servicetype')">
                    {{ __('Service Type') }}
                </x-nav-link>
                <x-nav-link :href="url('circlecodes')" :active="request()->routeIs('circlecodes')">
                    {{ __('Circle Code') }}
                </x-nav-link>
                <x-nav-link :href="url('amount')" :active="request()->routeIs('amount')">
                    {{ __('Amount') }}
                </x-nav-link>
                <x-nav-link :href="url('apiamount')" :active="request()->routeIs('apiamount')">
                    {{ __('API Amount') }}
                </x-nav-link>
            </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
