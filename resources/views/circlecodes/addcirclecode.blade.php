<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="http://demo.expertphp.in/js/jquery.js"></script>

<x-app-layout>

    <div class="flex">
        <x-slot name="header">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('circle code') }}
                </h2>
            </div>
        </x-slot>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ url('circlecodes') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <x-input-label for="api_id" :value="__('api_id')" />
                            <select class="block mt-1 w-full" name="api_id" id="idapi_id">
                                <option value="">Select Service</option>
                                @foreach($apis as $apis)
                                <option value="{{$apis->api_id}}">{{$apis->api_name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('api_id')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="service_id" :value="__('service_id')" />
                            <select class="block mt-1 w-full" name="service_id" id="idservice_id">
                                <option value="">Select Service</option>
                                @foreach($servicetype as $servicety)
                                <option value="{{$servicety->servicetype_id}}">{{$servicety->servicetype}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('service_id')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="provider_id" :value="__('provider_id')" />
                            <select class="block mt-1 w-full" name="provider_id" id="provider_id">
                                <option value="">Select provider</option>
                            </select>
                            <x-input-error :messages="$errors->get('provider_id')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="circle_code" :value="__('circle_code')" />
                            <x-text-input id="circle_code" class="block mt-1 w-full" type="text" placeholder="circle_code" name="circle_code" :value="old('sp_code')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('circle_code')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="circle_code_id" :value="__('circle_code_id')" />
                            <x-text-input id="circle_code_id" class="block mt-1 w-full" type="text" placeholder="circle_code_id" name="circle_code_id" :value="old('circle_code_id')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('circle_code_id')" class="mt-2" />
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    fetch("/jsonfile1.json")
        .then(response => {
            return response.json();
        })
        .then(
            data => {

                let sums = data;

                let apifields = document.getElementById('idapi_id')
                let servicefield = document.getElementById('idservice_id')

                apifields.onchange = function() {
                    let apivalues = this.value

                    servicefield.onchange = function() {
                        let servicevalues = this.value

                        for (i = 0; i < data.length; i++) {

                            if (sums[i].api_id == apivalues && sums[i].service == servicevalues) {
                                var selectfield = document.getElementById('provider_id')
                                var optionfield = document.createElement('option')
                                optionfield.value = sums[i].provider_id
                                optionfield.text = sums[i].provider
                                selectfield.append(optionfield)
                            }

                        }

                    }
                }


            }
        );
</script>