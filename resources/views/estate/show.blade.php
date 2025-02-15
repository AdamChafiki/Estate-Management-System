@extends('layouts.base')
@section('title', 'Estate Detail')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="md:flex">
            <!-- Left Column: Image Gallery -->
            <div class="w-full md:w-1/2 p-6">
                <!-- Main Image -->
                <div class="border rounded-lg overflow-hidden">
                    <img id="mainImage" class="w-full h-80 object-cover"
                        src="{{ asset('storage/' . $images[0]->image_path) }}" alt="{{ $estate->title }}">
                </div>
                <!-- Thumbnails -->
                <div class="mt-4 flex space-x-2">
                    @foreach($images as $image)
                    <img class="w-16 h-16 object-cover border rounded cursor-pointer hover:opacity-75 transition"
                        src="{{ asset('storage/' . $image->image_path) }}" alt="Thumbnail"
                        onclick="changeMainImage('{{ asset('storage/' . $image->image_path) }}')">
                    @endforeach
                </div>
            </div>
            <!-- Right Column: Estate Details -->
            <div class="w-full md:w-1/2 p-6 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-blue-600">{{ $estate->title }}</h1>
                    <p class="mt-2 text-2xl text-green-600 font-semibold">
                        ${{ number_format($estate->price, 2) }}
                    </p>
                    <div class="mt-4 flex items-center space-x-2">
                        <span class="inline-block bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">
                            {{ ucfirst($estate->property_type) }}
                        </span>
                        <span class="inline-block bg-blue-100 text-blue-600 text-sm px-3 py-1 rounded-full">
                            {{ ucfirst($estate->listing_type) }}
                        </span>
                    </div>
                    <div class="mt-4 flex items-center text-gray-700">
                        <!-- Map Pin Icon -->
                        <svg class="h-5 w-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.05 3.05A7 7 0 0114.95 3.05a7 7 0 010 9.9L10 18.9l-4.95-5.95a7 7 0 010-9.9zM10 5a5 5 0 00-3.535 8.535l3.535 4.242 3.535-4.242A5 5 0 0010 5z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>{{ $estate->location }}</span>
                    </div>
                    <div class="mt-6 text-gray-800 prose prose-blue max-w-none">
                        {!! $estate->description !!}
                    </div>
                </div>
                <!-- User Info & Contact Button -->
                <div class="mt-6 border-t pt-4">
                    <div class="flex items-center mb-4">
                        <!-- User Icon -->
                        <svg class="h-6 w-6 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 10a4 4 0 100-8 4 4 0 000 8zM2 18a8 8 0 0116 0H2z" />
                        </svg>
                        <span class="text-gray-700 font-medium">Listed by:</span>
                        <span class="text-blue-600 font-semibold ml-2">
                            {{ $estate->user->firstName }} {{ $estate->user->lastName }}
                        </span>
                    </div>
                    <a href="/"
                        class="inline-block bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeMainImage(src) {
        document.getElementById('mainImage').src = src;
    }
</script>
@endsection