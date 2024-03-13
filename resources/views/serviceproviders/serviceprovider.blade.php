<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

<x-app-layout>

    <div class="flex">
        <x-slot name="header">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('serviceproviders.create')" >
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
                            <th>Services</th>
                            <th>Provider Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($serviceprovider as $serviceprovider)
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                @foreach($apis as $apie)
                                @if($apie->api_id == $serviceprovider->api_id)
                                {{$apie->api_name}}</td>
                                @endif
                                @endforeach
                            <td>                                
                                @foreach($providers as $provide)
                                @if($provide->provider_id == $serviceprovider->provider_id)
                                {{$provide->provider}}
                                @endif
                                @endforeach
                            </td>
                            <td>                                
                                @foreach($servicetype as $servicetyp)
                                @if($servicetyp->servicetype_id == $serviceprovider->service_id)
                                {{$servicetyp->servicetype}}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                {{$serviceprovider->sp_code}}
                            </td>
                            <td></td>
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