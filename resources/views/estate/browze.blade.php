@extends('layouts.base')

@section('title', 'Estate Browze')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar Filter -->
    <aside class="hidden md:block w-64 bg-white  p-4">
        <h2 class="text-lg font-bold mb-4">Filter Estates</h2>
        <form action="{{ route('estate.index') }}" method="GET" class="space-y-4">
            <!-- Title Search -->
            <div>
                <label for="title" class="block text-sm text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ request('title') }}" placeholder="Search by title"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
            </div>
            <!-- Price Range -->
            <div>
                <label for="min_price" class="block text-sm text-gray-700">Min Price</label>
                <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}"
                    placeholder="Minimum Price" step="0.01"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
            </div>
            <div>
                <label for="max_price" class="block text-sm text-gray-700">Max Price</label>
                <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}"
                    placeholder="Maximum Price" step="0.01"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
            </div>
            <!-- Location -->
            <div>
                <label for="location" class="block text-sm text-gray-700">Location</label>
                <input type="text" name="location" id="location" value="{{ request('location') }}"
                    placeholder="Location"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
            </div>
            <!-- Property Type -->
            <div>
                <label for="property_type" class="block text-sm text-gray-700">Property Type</label>
                <select name="property_type" id="property_type"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
                    <option value="">All Types</option>
                    <option value="apartment" {{ request('property_type') == 'apartment' ? 'selected' : '' }}>Apartment
                    </option>
                    <option value="house" {{ request('property_type') == 'house' ? 'selected' : '' }}>House</option>
                    <option value="land" {{ request('property_type') == 'land' ? 'selected' : '' }}>Land</option>
                </select>
            </div>
            <!-- Listing Type -->
            <div>
                <label for="listing_type" class="block text-sm text-gray-700">Listing Type</label>
                <select name="listing_type" id="listing_type"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
                    <option value="">All Listings</option>
                    <option value="rent" {{ request('listing_type') == 'rent' ? 'selected' : '' }}>Rent</option>
                    <option value="sale" {{ request('listing_type') == 'sale' ? 'selected' : '' }}>Sale</option>
                </select>
            </div>
            <!-- Filter Button -->
            <div class="mt-4">
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-200 text-sm">
                    Filter Estates
                </button>
            </div>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 p-6">
        <h1 class="text-3xl font-bold mb-6">Estate Browze</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($estates as $estate)
            <div class="border p-4 mb-4 flex-col space-y-2">
                <!-- Display related images -->
                <div class="mt-2 grid  grid-cols-2 md:grid-cols-4 gap-2">
                    <img src="{{ asset('storage/' . $estate->images[0]->image_path) }}" alt="Estate Image"
                        class="rounded-md">
                    <img src="{{ asset('storage/' . $estate->images[1]->image_path) }}" alt="Estate Image"
                        class="rounded-md">
                </div>
                <h2 class="text-lg font-semibold">{{ $estate->title }}</h2>
                <p class="text-sm text-gray-600">Location: {{ $estate->location }}</p>
                <p class="text-sm text-gray-600">Price: {{ $estate->price }}DH</p>
                <div class="flex space-x-2">
                    <a href="{{ route('estate.show', $estate) }}"
                        class="p-2 text-sm bg-blue-500 text-white hover:bg-blue-600 rounded-md transition-all ">View</a>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</div>
@endsection