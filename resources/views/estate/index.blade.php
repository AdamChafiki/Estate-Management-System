@extends('layouts.base')

@section('title', 'Estate Account')

@section('content')
<div class="flex flex-col md:flex-row">
    <!-- Sidebar -->
    @include('shared.sidebar')

    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 p-4">
        @if (session('alert'))
        <x-alert :level="session('alert.level')" :message="session('alert.message')" />
        @endif
        <div class="mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-sm font-semibold mb-6">Estate Listing</h1>

            @if ($estates->isEmpty())
            <p class="text-semibold text-sm text-gray-500">No estate found.</p>
            @else
            @foreach ($estates as $estate)
            <div class="border p-4 mb-4">
                <!-- Display related images -->
                <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-2">
                    <img src="{{ asset('storage/' . $images[0]->image_path) }}" alt="Estate Image"
                        class=" object-cover rounded">
                </div>
                <h2 class="text-lg font-semibold">{{ $estate->title }}</h2>
                <p class="text-sm text-gray-600">Location: {{ $estate->location }}</p>
                <p class="text-sm text-gray-600">Price: {{ $estate->price }}DH</p>
                <div class="flex space-x-2">
                    <button
                        class="p-2 text-sm bg-blue-500 text-white hover:bg-blue-600 rounded-md transition-all ">Edit</button>
                    <form action="{{route('estate.destroy', $estate->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="p-2 text-sm bg-red-500 text-white hover:bg-red-600 rounded-md transition-all ">delete</button>
                    </form>
                    <button
                        class="p-2 text-sm bg-gray-500 text-white hover:bg-gray-600 rounded-md transition-all ">More</button>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </main>
</div>


@endsection