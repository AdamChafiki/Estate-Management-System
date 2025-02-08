@extends('layouts.base')
@section('title', 'Home')
@section('content')
<div class="relative">
    <!-- Banner Section -->
    <div
        class="bg-gradient-to-b from-blue-500 to-blue-800 h-64 flex flex-col items-center justify-center text-white px-4">
        <h1 class="text-center text-3xl font-extrabold mb-2 font-serif">
            Find Your Perfect Property
        </h1>
        <p class="text-lg text-center">
            Explore exclusive estate listings and turn your dream home into a reality. </p>
    </div>

    <!-- Search Bar Section -->
    <div class="px-4">
        <!-- Adjust position for small devices -->
        <div class="relative w-full sm:absolute sm:-bottom-10 sm:left-0">
            <div class="bg-white border border-gray-300 shadow-2xl rounded-lg mx-auto max-w-full sm:max-w-4xl p-4">
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-2 flex-wrap">
                    <input type="text" placeholder="Search..."
                        class="flex-grow p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                    <select
                        class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <option value="">Category</option>
                        <option value="house">House</option>
                        <option value="apartment">Apartment</option>
                        <option value="condo">Condo</option>
                    </select>
                    <input type="number" placeholder="Min Price"
                        class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                    <input type="number" placeholder="Max Price"
                        class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                    <button
                        class="bg-blue-600 text-white p-2 justify-center rounded-md hover:bg-blue-700 w-full sm:w-auto flex-shrink-0 mt-2 sm:mt-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Us -->
<div class="sm:flex items-center sm:mt-10 max-w-screen-xl">
    <div class="sm:w-1/2 p-10">
        <div class="image object-center text-center">
            <img class="rounded-lg"
                src="https://images.unsplash.com/photo-1448630360428-65456885c650?q=80&w=1467&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="About Our Company" />
        </div>
    </div>
    <div class="sm:w-1/2 p-5">
        <div class="text">
            <h2 class="my-4 font-bold text-3xl sm:text-4xl">
                About <span class="text-blue-600">Our Real Estate Network</span>
            </h2>
            <p class="text-gray-700">
                Our platform empowers trusted agents to showcase their latest property listings. If you find a property
                that catches your eye, you can easily connect with the agent to learn more and start the conversation.
            </p>
        </div>

        <!-- Browse Listings Button -->
        <button
            class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 hover:text-white">
            Browse Listings
        </button>

    </div>
</div>
@endsection