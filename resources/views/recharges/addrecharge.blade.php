<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

<x-app-layout>

    <div class="flex">
        <x-slot name="header">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Recharge') }}
                </h2>
            </div>
        </x-slot>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ url('recharges') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <x-input-label for="mobileno" :value="__('mobileno')" />
                            <x-text-input id="mobileno" class="block mt-1 w-full" type="text" placeholder="mobileno" name="mobileno" :value="old('mobileno')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('mobileno')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="service" :value="__('service')" />
                            <x-text-input id="service" class="block mt-1 w-full" type="text" placeholder="service" name="service" value="Prepaid" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('service')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="service_provider" :value="__('service_provider')" />
                            <select class="block mt-1 w-full" name="service_provider" id="service_provider">
                                @foreach($api as $api)
                                <option value="{{$api->providerid}}">{{$api->provider}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('service_provider')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="circlecode" :value="__('circlecode')" />
                            <select class="block mt-1 w-full" name="circlecode" id="circlecode">
                                @foreach($circle as $circle)
                                <option value="{{$circle->circle_code_id}}">{{$circle->circle_code}}</option>
                                <option value="{{$circle->circle_code_id}}">{{$circle->circle_code}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('circlecode')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="amount" :value="__('amount')" />
                            <x-text-input id="amount" class="block mt-1 w-full" type="text" placeholder="amount" name="amount" :value="old('amount')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
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