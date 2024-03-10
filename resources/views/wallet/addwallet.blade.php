<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

<x-app-layout>

    <div class="flex">
        <x-slot name="header">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Members') }}
                </h2>
            </div>
        </x-slot>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ url('wallet') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <x-input-label for="user_type" :value="__('user_type')" />
                            <x-text-input id="user_type" class="block mt-1 w-full" type="text" placeholder="user_type" name="user_type" :value="old('user_type')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="plan_id" :value="__('plan_id')" />
                            <x-text-input id="plan_id" class="block mt-1 w-full" type="text" placeholder="plan_id" name="plan_id" :value="old('plan_id')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('plan_id')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="name" :value="__('name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" placeholder="name" name="name" :value="old('name')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="email" :value="__('email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="email" name="email" :value="old('email')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="mobile" :value="__('mobile')" />
                            <x-text-input id="mobile" class="block mt-1 w-full" type="text" placeholder="mobile" name="mobile" :value="old('mobile')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="password" :value="__('password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" placeholder="password" name="password" :value="old('password')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="password_confirmation" :value="__('password_confirmation')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="password_confirmation" name="password_confirmation" :value="old('password')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="pincode" :value="__('pincode')" />
                            <x-text-input id="pincode" class="block mt-1 w-full" type="text" placeholder="pincode" name="pincode" :value="old('pincode')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('pincode')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="district" :value="__('district')" />
                            <x-text-input id="district" class="block mt-1 w-full" type="text" placeholder="district" name="district" :value="old('district')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('district')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="state" :value="__('state')" />
                            <x-text-input id="state" class="block mt-1 w-full" type="text" placeholder="state" name="state" :value="old('state')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="user_address" :value="__('user_address')" />
                            <x-text-input id="user_address" class="block mt-1 w-full" type="text" placeholder="user_address" name="user_address" :value="old('user_address')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('user_address')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="profile_pic" :value="__('profile_pic')" />
                            <x-text-input id="profile_pic" class="block mt-1 w-full" type="file" placeholder="profile_pic" name="profile_pic" :value="old('profile_pic')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('profile_pic')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="gst_no" :value="__('gst_no')" />
                            <x-text-input id="gst_no" class="block mt-1 w-full" type="text" placeholder="gst_no" name="gst_no" :value="old('gst_no')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('gst_no')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="pancard" :value="__('pancard')" />
                            <x-text-input id="pancard" class="block mt-1 w-full" type="text" placeholder="pancard" name="pancard" :value="old('pancard')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('pancard')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="adhaar_card" :value="__('adhaar_card')" />
                            <x-text-input id="adhaar_card" class="block mt-1 w-full" type="text" placeholder="adhaar_card" name="adhaar_card" :value="old('adhaar_card')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('adhaar_card')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="company_name" :value="__('company_name')" />
                            <x-text-input id="company_name" class="block mt-1 w-full" type="text" placeholder="company_name" name="company_name" :value="old('company_name')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>