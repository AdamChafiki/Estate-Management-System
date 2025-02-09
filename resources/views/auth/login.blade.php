@extends('layouts.base')
@section('title', 'Signup')
@section('content')
<div class="py-16">
    @if (session('alert'))
    <x-alert :level="session('alert.level')" :message="session('alert.message')" />
    @endif


    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
        <div class="hidden lg:block lg:w-1/2 "
            style="background-image:url('https://media.istockphoto.com/id/1138615866/photo/sharp-corner-building-architecture-facade-in-gdansk-poland.jpg?s=1024x1024&w=is&k=20&c=q1_3KRRS9Sb17OFZjKghRRrUFBXBri6-jmohMFZfg-g=')">
        </div>
        <div class="w-full p-8 lg:w-1/2">
            <div class="flex justify-center">
                <img class="block h-8 w-auto" height="32" src="logo.png" alt="Your Company">
            </div>
            <p class="text-xl text-gray-600 text-center">Login to your account</p>

            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                    <input name="email" type="email"
                        class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input name="password" type="password"
                        class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-8">
                    <button type="submit"
                        class="bg-blue-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-blue-600">Sign
                        Up</button>
                </div>
            </form>

            <div class="mt-4 flex items-center justify-between">
                <span class="border-b w-1/5 md:w-1/4"></span>
                <a href="/signup" class="text-xs text-gray-500 uppercase">or signup</a>
                <span class="border-b w-1/5 md:w-1/4"></span>
            </div>
        </div>
    </div>
</div>
@endsection