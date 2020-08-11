@extends('voyager::master')


@section('css')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
@endsection

@section('content')
    <!-- component -->


    <form action="/admin/handle-member-form" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="bg-gray-100 shadow rounded-lg p-6">
            <h2 class="h3 pb-4 font-bold ">Member Details</h2>
            <div class="grid lg:grid-cols-2 gap-6">
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="name" class="bg-white text-gray-700 font-bold px-1">Name *</label>
                        </p>
                    </div>
                    <p>
                        <input id="name" name="name" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 text-gray-900 outline-none block h-full w-full" required>
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
                        <input id="address" name="address" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full" required>
                    </p>
                </div>
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nid" class="bg-white text-gray-700 font-bold px-1">NID Number </label>
                        </p>
                    </div>
                    <p>
                        <input id="nid" name="nid" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full">
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
                        <input id="mobile" name="mobile" type="number" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full" required>
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
                        <input id="profile_picture" name="profile_picture" autocomplete="false" tabindex="0" type="file"
                            class="py-1 px-1 outline-none  flex-1" required>
                        <span class="flex-2 p-1">
                            <img id="profile_preview" class="rounded-lg" src="" alt="" height="80" width="80" />
                        </span>



                    </p>
                </div>

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1 h-50">
                    <div class="tracking-wider px-1 uppercase text-xs block bg-white">

                        <label class="bg-white text-gray-700 font-bold px-1">Status *</label> <br>


                        <input class="bg-white text-gray-700 font-bold px-1" type="radio" id="active" name="status"
                            value="Active" checked>
                        <label for="active">Active</label><br>
                        <input class="bg-white text-gray-700 font-bold px-1" type="radio" id="inactive" name="status"
                            value="InActive">
                        <label for="inactive">InActive</label><br>

                    </div>



                </div>
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="username" class="bg-white text-gray-700 font-bold px-1">Form Price *</label>
                        </p>
                    </div>


                    <p>
                        <input id="username" autocomplete="false" tabindex="0" type="number"
                            class="py-1 px-1 outline-none block h-full w-full" required>
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



            <h2 class="h3 py-4 font-bold">Nominee Details</h2>
            <div class="border-blue-500 grid lg:grid-cols-2 gap-6">



                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_name" class="bg-white text-gray-700 font-bold px-1">Nominee Name *</label>
                        </p>
                    </div>


                    <p>
                        <input id="nominee_name" name="nominee_name" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full" required>
                    </p>
                </div>
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_address" class="bg-white text-gray-700 font-bold px-1">Nominee Address
                                *</label>
                        </p>
                    </div>
                    <p>
                        <input id="nominee_address" name="nominee_address" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full" required>
                    </p>
                </div>

                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                            <label for="nominee_mobile" class="bg-white text-gray-700 font-bold px-1">Nominee Mobile
                                *</label>
                        </p>
                    </div>
                    <p>
                        <input id="nominee_mobile" name="nominee_mobile" autocomplete="false" tabindex="0" type="text"
                            class="py-1 px-1 outline-none block h-full w-full" required>
                    </p>
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
