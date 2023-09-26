@extends('layouts.main')

@section('content')
<section>
    <div class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-5xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Rental car: {{ $car->title }}</h2>
            <form action="{{ route('rentals.store', ['car' => $car, 'driver' => $driver, 'start_at_date_filter' => $start_at_date_filter, 'end_at_date_filter' => $end_at_date_filter, 'start_at_time_filter' => $start_at_time_filter, 'end_at_time_filter' => $end_at_time_filter]) }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                    <div class="lg:col-span-2">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label for="start_at_province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province Start</label>
                                <select name="start_at_province" id="start_at_province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    <option value="Bangkok">Bangkok</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="end_at_province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province End</label>
                                <select name="end_at_province" id="end_at_province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    <option value="Bangkok">Bangkok</option>
                                </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                <div class="flex">
                                    <span class="text-black dark:text-white mr-2">{{ $start_at_date_filter }}</span>
                                    <span class="text-black dark:text-white mr-4">{{ $start_at_time_filter }}</span>
                                    <span class="text-black dark:text-white mr-4">to</span>
                                    <span class="text-black dark:text-white mr-2">{{ $end_at_date_filter }}</span>
                                    <span class="text-black dark:text-white mr-4">{{ $end_at_time_filter }}</span>
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" maxlength="60" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ Auth::user()->name }}" required="">
                            </div>
                            <div class="w-full">
                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                <input type="tel" name="phone_number" id="phone_number" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ Auth::user()->phone_number }}" required="">
                            </div>
                            <div class="w-full">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ Auth::user()->email }}" required="">
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Rental</button>
                    </div>
                    <div>
                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $car->title }}</h5>

                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        </div>
                        <div class="h-4"></div>
                        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex flex-col items-center p-10">
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $driver->name }}</h5>
                                <span class="text-sm text-gray-500 dark:text-gray-400">Tel. {{ $driver->phone_number }}</span>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection