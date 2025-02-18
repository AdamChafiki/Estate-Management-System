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
<!-- how its works -->
<section id="estate-works" class="relative bg-blue-900 py-10 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-4xl text-white font-extrabold mx-auto md:text-6xl lg:text-5xl">
                How It Works
            </h2>
            <p class="max-w-2xl mx-auto mt-4 text-base text-gray-400 leading-relaxed md:text-2xl">
                Our Estate Management platform streamlines the process of finding and managing your ideal property.
            </p>
        </div>
        <div class="relative mt-12 lg:mt-20">
            <div class="absolute inset-x-0 hidden xl:px-44 top-2 md:block md:px-20 lg:px-28">
                <img alt="" loading="lazy" width="1000" height="500" decoding="async" data-nimg="1" class="w-full"
                    style="color:transparent"
                    src="https://cdn.rareblocks.xyz/collection/celebration/images/steps/2/curved-dotted-line.svg">
            </div>
            <div class="relative grid grid-cols-1 text-center gap-y-12 md:grid-cols-3 gap-x-12">
                <!-- Step 1 -->
                <div>
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto bg-white border-2 border-gray-200 rounded-full shadow">
                        <span class="text-xl font-semibold text-gray-700">1</span>
                    </div>
                    <h3 class="mt-6 text-xl text-white font-semibold leading-tight md:mt-10">
                        Browse Properties
                    </h3>
                    <p class="mt-4 text-base text-gray-400 md:text-lg">
                        Explore our curated listings to find the property that matches your lifestyle.
                    </p>
                </div>
                <!-- Step 2 -->
                <div>
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto bg-white border-2 border-gray-200 rounded-full shadow">
                        <span class="text-xl font-semibold text-gray-700">2</span>
                    </div>
                    <h3 class="mt-6 text-xl text-white font-semibold leading-tight md:mt-10">
                        Schedule a Viewing
                    </h3>
                    <p class="mt-4 text-base text-gray-400 md:text-lg">
                        Connect with our experienced agents and book a convenient time to visit your favorite
                        properties.
                    </p>
                </div>
                <!-- Step 3 -->
                <div>
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto bg-white border-2 border-gray-200 rounded-full shadow">
                        <span class="text-xl font-semibold text-gray-700">3</span>
                    </div>
                    <h3 class="mt-6 text-xl text-white font-semibold leading-tight md:mt-10">
                        Close the Deal
                    </h3>
                    <p class="mt-4 text-base text-gray-400 md:text-lg">
                        Finalize your purchase or rental with our secure and transparent process.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute inset-0 m-auto max-w-xs h-[357px] blur-[118px] sm:max-w-md md:max-w-lg"
        style="background:radial-gradient(1.89deg, rgba(34, 78, 95, 0.4) -1000%, rgba(191, 227, 205, 0.26) 1500.74%, rgba(34, 140, 165, 0.41) 56.49%, rgba(28, 47, 99, 0.11) 1150.91%)">
    </div>
</section>

<!-- properties list section -->
<div class="max-w-screen-xl mx-auto px-4">
    <div>
        <h2 class="my-4 font-bold text-3xl sm:text-4xl">
            <span class="text-blue-600">Popural</span> Listings
        </h2>
        <div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap">
            <!-- card component for property listing   -->
            <a href="#" class="block rounded-lg p-4 shadow-xs shadow-indigo-100">
                <img alt=""
                    src="https://images.unsplash.com/photo-1613545325278-f24b0cae1224?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                    class="h-56 w-full rounded-md object-cover" />

                <div class="mt-2">
                    <dl>
                        <div>
                            <dt class="sr-only">Price</dt>

                            <dd class="text-sm text-gray-500">$240,000</dd>
                        </div>

                        <div>
                            <dt class="sr-only">Address</dt>

                            <dd class="font-medium">123 Wallaby Avenue, Park Road</dd>
                        </div>
                    </dl>

                    <div class="mt-6 flex items-center gap-8 text-xs">
                        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                            <svg class="size-4 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                            </svg>

                            <div class="mt-1.5 sm:mt-0">
                                <p class="text-gray-500">Parking</p>

                                <p class="font-medium">2 spaces</p>
                            </div>
                        </div>

                        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                            <svg class="size-4 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>

                            <div class="mt-1.5 sm:mt-0">
                                <p class="text-gray-500">Bathroom</p>

                                <p class="font-medium">2 rooms</p>
                            </div>
                        </div>

                        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                            <svg class="size-4 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>

                            <div class="mt-1.5 sm:mt-0">
                                <p class="text-gray-500">Bedroom</p>

                                <p class="font-medium">4 rooms</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#" class="block rounded-lg p-4 shadow-xs shadow-blue-100">
                <img alt=""
                    src="https://images.unsplash.com/photo-1613545325278-f24b0cae1224?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                    class="h-56 w-full rounded-md object-cover" />

                <div class="mt-2">
                    <dl>
                        <div>
                            <dt class="sr-only">Price</dt>

                            <dd class="text-sm text-gray-500">$240,000</dd>
                        </div>

                        <div>
                            <dt class="sr-only">Address</dt>

                            <dd class="font-medium">123 Wallaby Avenue, Park Road</dd>
                        </div>
                    </dl>

                    <div class="mt-6 flex items-center gap-8 text-xs">
                        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                            <svg class="size-4 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                            </svg>

                            <div class="mt-1.5 sm:mt-0">
                                <p class="text-gray-500">Parking</p>

                                <p class="font-medium">2 spaces</p>
                            </div>
                        </div>

                        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                            <svg class="size-4 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>

                            <div class="mt-1.5 sm:mt-0">
                                <p class="text-gray-500">Bathroom</p>

                                <p class="font-medium">2 rooms</p>
                            </div>
                        </div>

                        <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                            <svg class="size-4 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>

                            <div class="mt-1.5 sm:mt-0">
                                <p class="text-gray-500">Bedroom</p>

                                <p class="font-medium">4 rooms</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection
