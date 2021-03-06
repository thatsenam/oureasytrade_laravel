@extends('voyager::master')


@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous"></script>
@endsection

@section('content')
    <!-- component -->


    <form action="/admin/loan-grant" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="bg-gray-100 shadow rounded-lg p-6">
            <h2 class="h4 pb-4 ml-2 font-bold">Member Details</h2>
            <div class="grid lg:grid-cols-2 gap-6">
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="member_id" class="bg-white text-gray-700 font-bold px-1">Member ID *</label>
                        </p>
                    </div>
                    <p>
                        <input id="member_id_hidden" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 text-gray-900 outline-none block h-full w-full" required disabled>
                        <input id="member_id" name="member_id" tabindex="0" type="number" value="0.0" hidden>

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
                        <select id='search' class='block p-2 ' style="width:100%" required>
                            <option></option>
                        </select>
                        <input type="text" id="name" name="name" hidden required>

                    </p>
                </div>
            </div>


            <h2 class="h4 pb-4 ml-2 font-bold">Witness #1 Details</h2>
            <div class="grid lg:grid-cols-2 gap-6">
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="name" class="bg-white text-gray-700 font-bold px-1">Name *</label>
                        </p>
                    </div>
                    <p>
                        <input id="name" name="witness_1_name" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 text-gray-900 outline-none block h-full w-full" required
                            placeholder="Witness #1 Name">
                    </p>
                </div>
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="address" class="bg-white text-gray-700 font-bold px-1">Address *</label>
                        </p>
                    </div>
                    <p>
                        <input id="address" name="witness_1_address" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Witness #1 Address">
                    </p>
                </div>

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="mobile" class="bg-white text-gray-700 font-bold px-1">Mobile Number *</label>
                        </p>
                    </div>
                    <p>
                        <input id="witness_1_mobile" name="witness_1_mobile" type="number" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full" required
                            placeholder="Witness #1 Mohile Number">
                    </p>
                </div>

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="profile_picture" class="bg-white text-gray-700 font-bold px-1">Profile Picture *
                                <span class="font-normal">(Should not be greater than 500kb)</span></label>
                        </p>
                    </div>
                    <p class="flex content-between py-2">
                        <input id="witness_1_profile_picture" name="witness_1_profile_picture" autocomplete="false" tabindex="0" type="file"
                            class="py-1 px-1 outline-none  flex-1" required placeholder="Witness #1 Picture">
                        <span class="flex-2 p-1">
                            <img id="witness_1_profile_preview" class="rounded-lg" src="" alt="" height="80" width="80" />
                        </span>



                    </p>
                </div>



            </div>

            <h2 class="h4 pb-4 ml-2 font-bold">Witness #2 Details</h2>
            <div class="grid lg:grid-cols-2 gap-6">
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="name" class="bg-white text-gray-700 font-bold px-1">Name *</label>
                        </p>
                    </div>
                    <p>
                        <input id="name" name="witness_2_name" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 text-gray-900 outline-none block h-full w-full" required
                            placeholder="Witness #2 Name">
                    </p>
                </div>
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="address" class="bg-white text-gray-700 font-bold px-1">Address *</label>
                        </p>
                    </div>
                    <p>
                        <input id="address" name="witness_2_address" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Witness #2 Address">
                    </p>
                </div>

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="mobile" class="bg-white text-gray-700 font-bold px-1">Mobile Number *</label>
                        </p>
                    </div>
                    <p>
                        <input  name="witness_2_mobile" type="number" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full" required
                            placeholder="Witness #2 Mohile Number">
                    </p>
                </div>

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="profile_picture" class="bg-white text-gray-700 font-bold px-1">Profile Picture *
                                <span class="font-normal">(Should not be greater than 500kb)</span></label>
                        </p>
                    </div>
                    <p class="flex content-between py-2">
                        <input id="witness_2_profile_picture" name="witness_2_profile_picture" autocomplete="false" tabindex="0" type="file"
                            class="py-1 px-1 outline-none  flex-1" required placeholder="Witness #2 Picture">
                        <span class="flex-2 p-1">
                            <img id="witness_2_profile_preview" class="rounded-lg" src="" alt="" height="80" width="80" />
                        </span>



                    </p>
                </div>



            </div>


            <h2 class="h3 py-4 font-bold">Loan Details</h2>
            <div class="border-blue-500 grid lg:grid-cols-2 gap-6">



                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Loan Amount *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="loan_amount" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Enter Loan Amount">
                    </p>
                </div>


                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Interest Rate *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="interest_rate" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Interest Rate">
                    </p>
                </div>

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Interest Amount
                                *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="interest_amount" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Interest Amount">
                    </p>
                </div>


                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Installment *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="installment" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required
                            placeholder="Enter Installment In Days">
                    </p>
                </div>


                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Installment TK *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="installment_tk" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Enter Installment TK">
                    </p>
                </div>


                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Service Charge *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="service_charge" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Enter Service Charge">
                    </p>
                </div>
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Time Session *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="time_session" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Enter Time Session">
                    </p>
                </div>

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Time Session *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="time_session" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Enter Time Session">
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

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Total Amount *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="total_amount" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required placeholder="Enter Total Amount">
                    </p>
                </div>



            </div>

        </div>



        </div>


        <div class="border-t mt-6 pt-3">
            <button id="submit" type="submit"
                class="float-right font-bold rounded px-10 py-2 text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                Register <svg class="h-6 w-6 text-white inline" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>

        </div>
        </div>
    </form>
@endsection


@section('javascript')
    <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection
