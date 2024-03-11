<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

<x-app-layout>

    <div class="flex">
        <x-slot name="header">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('ApiCircle') }}
                </h2>
            </div>
        </x-slot>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ url('apicircle') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <x-input-label for="api_name" :value="__('api_name')" />
                            <x-text-input id="api_name" class="block mt-1 w-full" type="text" placeholder="api_name" name="api_name" :value="old('api_name')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('api_name')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-input-label for="circle_name" :value="__('circle_name')" />
                            <x-text-input id="circle_name" class="block mt-1 w-full" type="text" placeholder="circle_name" name="circle_name" :value="old('circle_name')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('circle_name')" class="mt-2" />
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