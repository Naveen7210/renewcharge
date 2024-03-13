<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

<x-app-layout>

    <div class="flex">
        <x-slot name="header">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('providers.create')" >
                    {{ __('Add Providers') }}
                </x-nav-link>
            </div>
        </x-slot>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table id="example" class="table table-striped" width="100%">
                <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Api Name</th>
                            <th>Provider</th>
                            <th>Service Type</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($providers as $provider)
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>{{$provider->api_name}}</td>
                            <td>{{$provider->provider}}</td>
                            <th>
                                @foreach($servicetype as $servicety)
                                @if($servicety -> servicetype_id == $provid er->service)
                                {{$servicety->servicetype}}
                                @endif
                                @endforeach
                            </th>
                            <td><img src="{{$provider->logo}}" width="50" height="50" style="border-radius: 30px;" ></td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>