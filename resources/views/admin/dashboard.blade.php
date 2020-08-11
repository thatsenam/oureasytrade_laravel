@extends('voyager::master')


@section('css')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
@endsection

@section('content')
    <!-- component -->
    <!-- This is an example component -->
    <div id="wrapper" class="max-w-xxl px-4 py-4 mx-auto">
        <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">

            <a href="/admin/add_member"
                class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded hover:bg-gray-200  hover:text-white">
                <div id="jh-stats-positive ">
                    <div>

                        <p class="text-3xl font-semibold text-center text-gray-800">Register Member</p>
                        <p class="text-lg text-center text-gray-500">Click to add a new member</p>
                    </div>
                </div>
            </a>

            <a href="/admin/members"
                class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded hover:bg-gray-200  hover:text-white">
                <div id="jh-stats-positive ">
                    <div>

                        <p class="text-3xl font-semibold text-center text-gray-800">{{ $members }} members</p>
                        <p class="text-lg text-center text-gray-500">Click to view all members</p>
                    </div>
                </div>
            </a>
            <a href="/admin/deposit-fund"
                class="flex flex-col justify-center px-4 py-4 bg-yellow-200 border border-gray-300 rounded hover:bg-gray-200  hover:text-white">
                <div id="jh-stats-positive ">
                    <div>

                        <p class="text-3xl font-semibold text-center text-gray-800">Deposit Funds</p>
                        <p class="text-lg text-center text-gray-500">Click to add deposit</p>
                    </div>
                </div>
            </a>
            <a href="/admin/withdraw-fund"
                class="flex flex-col justify-center px-4 py-4 bg-yellow-200 border border-gray-300 rounded hover:bg-gray-200  hover:text-white">
                <div id="jh-stats-positive ">
                    <div>

                        <p class="text-3xl font-semibold text-center text-gray-800">Withdraw Funds</p>
                        <p class="text-lg text-center text-gray-500">Click to withdraw a funds</p>
                    </div>
                </div>
            </a>
            <a href="/admin/loan-grant"
                class="flex flex-col justify-center px-4 py-4 bg-blue-200 border border-gray-300 rounded hover:bg-gray-200  hover:text-white">
                <div id="jh-stats-positive ">
                    <div>

                        <p class="text-3xl font-semibold text-center text-gray-800">Loan Grant</p>
                        <p class="text-lg text-center text-gray-500">Click to apply for a loan</p>
                    </div>
                </div>
            </a>
            <a href="/admin/loan-collection"
            class="flex flex-col justify-center px-4 py-4 bg-blue-200 border border-gray-300 rounded hover:bg-gray-200  hover:text-white">
            <div id="jh-stats-positive ">
                <div>

                    <p class="text-3xl font-semibold text-center text-gray-800">Loan Collection</p>
                    <p class="text-lg text-center text-gray-500">Click to collect a loan</p>
                </div>
            </div>
        </a>

        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection
