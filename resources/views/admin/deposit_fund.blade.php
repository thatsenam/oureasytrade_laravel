@extends('voyager::master')


@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
@endsection

@section('content')
    <!-- component -->

    <div id="alert"  class="font-bold bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" >

    </div>
    <form action="/admin/deposit-fund" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="bg-gray-100 shadow rounded-lg p-6">
            <h2 class="h3 pb-4 font-bold ">Deposit Details</h2>
            <div class="grid lg:grid-cols-2 gap-6">
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="member_id" class="bg-white text-gray-700 font-bold px-1">Member ID *</label>
                        </p>
                    </div>
                    <p>
                        <input id="member_id_hidden"  autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 text-gray-900 outline-none block h-full w-full" required disabled>
                            <input id="member_id" name="member_id"  tabindex="0" type="number"  value="0.0" hidden >

                    </p>
                </div>
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="address" class="bg-white text-gray-700 font-bold px-1">Name *</label>
                        </p>
                    </div>
                    <p>
                        <select id='search' class='block p-2 'style="width:100%" required>
                            <option></option>
                          </select>
                          <input type="text" id="name" name="name" hidden required>

                    </p>
                </div>


                <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="username" class="bg-white text-gray-700 font-bold px-1">Previous Deposit *</label>
                    </p>
                </div>


                <p>
                    <input id="previous_deposit_hidden" autocomplete="false" tabindex="0" type="number"
                        class="py-1 px-1 outline-none block h-full w-full" required value="0.0" disabled >
                    <input id="previous_deposit" name="previous_deposit"  tabindex="0" type="number"  value="0.0" hidden >
                </p>
            </div>

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="username" class="bg-white text-gray-700 font-bold px-1">Today's Deposit *</label>
                        </p>
                    </div>


                    <p>
                        <input id="username" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required value="20.0" name="deposit">
                    </p>
                </div>
                <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="date" class="bg-white text-gray-700 font-bold px-1">Date *</label>
                    </p>
                </div>
                <p>
                    <input id="date" type="date" name="date" autocomplete="false" tabindex="0" type="text"
                        class="py-1 px-1 outline-none block h-full w-full">
                </p>
            </div>

            </div>




        </div>


        <div class="border-t mt-6 pt-3">
            <button id="submit" type="submit"
                class="float-right font-bold rounded px-10 py-2 text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                Confirm Deposit <svg class="h-6 w-6 text-white inline" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>

        </div>
        </div>
    </form>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection
