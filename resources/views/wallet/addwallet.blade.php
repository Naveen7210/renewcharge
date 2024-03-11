<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

<x-app-layout>

    <div class="flex">
        <x-slot name="header">
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('wallet') }}
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
                            <x-input-label for="api_name" :value="__('api_name')" />
                            <x-text-input id="api_name" class="block mt-1 w-full" type="text" placeholder="api_name" name="api_name" :value="old('api_name')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('api_name')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="user_name" :value="__('user_name')" />
                            <x-text-input id="user_name" class="block mt-1 w-full" type="text" placeholder="user_name" name="user_name" :value="old('user_name')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="transaction_type" :value="__('transaction_type')" />
                            <select class="block mt-1 w-full" name="transaction_type" id="transaction_type" >
                                <option value="Recharge">Recharge</option>
                                <option value="API Top up">API Top up</option>
                                <option value="Send Money">Send Money</option>
                                <option value="Recieve Money">Recieve Money</option>
                                <option value="Reverse">Reverse</option>
                                <option value="Commission">Commission</option>
                                <option value="Refund">Refund</option>
                            </select>
                            <x-input-error :messages="$errors->get('transaction_type')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="wallet_type" :value="__('wallet_type')" />
                            <select class="block mt-1 w-full" name="wallet_type" id="wallet_type" >
                                <option value="Wallet">Wallet</option>
                                <option value="Commission">Commission</option>
                                <option value="Mixed">Mixed</option>
                            </select>
                            <x-input-error :messages="$errors->get('wallet_type')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="cash_credit" :value="__('cash_credit')" />
                            <select class="block mt-1 w-full" name="cash_credit" id="cash_credit" >
                                <option value="Cash">Cash</option>
                                <option value="Credit">Credit</option>
                                <option value="Debit">Debit</option>
                            </select>
                            <x-input-error :messages="$errors->get('cash_credit')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="circle_name" :value="__('circle_name')" />
                            <x-text-input id="circle_name" class="block mt-1 w-full" type="text" placeholder="circle_name" name="circle_name" :value="old('circle_name')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('circle_name')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-3">
                            <x-input-label for="mobile_number" :value="__('mobile_number')" />
                            <x-text-input id="mobile_number" class="block mt-1 w-full" type="text" placeholder="mobile_number" name="mobile_number" :value="old('mobile_number')" autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('mobile_number')" class="mt-2" />
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