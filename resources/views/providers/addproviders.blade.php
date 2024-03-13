<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

<x-app-layout>

    <div class="flex">
        <x-slot name="header">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Providers') }}
                </h2>
            </div>
        </x-slot>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ url('providers') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <x-input-label for="api_name" :value="__('api_name')" />
                            <x-text-input id="api_name" class="block mt-1 w-full" type="text" placeholder="api_name" name="api_name" :value="old('api_name')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('api_name')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="provider" :value="__('provider')" />
                            <x-text-input id="provider" class="block mt-1 w-full" type="text" placeholder="provider" name="provider" :value="old('provider')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('provider')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="service" :value="__('service')" />
                            <select class="block mt-1 w-full" name="service">
                                <option value="">Select Service</option>
                                @foreach($servicesid as $servicesid)
                                <option value="{{$servicesid->servicetype_id}}">{{$servicesid->servicetype}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('service')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="logo" :value="__('logo')" />
                            <x-text-input id="logo" class="block mt-1 w-full" type="file" placeholder="logo" name="logo" :value="old('logo')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="state" :value="__('state')" />
                            <x-text-input id="state" class="block mt-1 w-full" type="text" placeholder="state" name="state" :value="old('state')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
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