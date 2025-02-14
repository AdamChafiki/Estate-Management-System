@extends('layouts.base')

@section('title', 'Estate Account')

@section('content')
<div class="flex flex-col md:flex-row">
    <!-- Sidebar -->
    @include('shared.sidebar')

    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 p-4">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-xl font-bold mb-6 text-center">Create Estate Listing</h1>
            <form action="{{route('estate.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-4">
                    <label for="title" class="block text-sm text-gray-900">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter estate title"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"
                        required>
                </div>

                <!-- Description  -->
                <div class="mb-4">
                    <label for="description" class="block text-sm text-gray-900">Description</label>
                    <textarea id="description" name="description" rows="5" placeholder="Describe your estate listing"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"></textarea>
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-sm text-gray-900">Price</label>
                    <input type="number" id="price" name="price" step="0.01" placeholder="Enter price"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"
                        required>
                </div>

                <!-- Location -->
                <div class="mb-4">
                    <label for="location" class="block text-sm text-gray-900">Location</label>
                    <input type="text" id="location" name="location" placeholder="Enter location"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"
                        required>
                </div>

                <!-- Property Type and Listing Type -->
                <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Property Type -->
                    <div>
                        <label for="property_type" class="block text-sm text-gray-900">Property Type</label>
                        <select id="property_type" name="property_type"
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"
                            required>
                            <option value="">Select Property Type</option>
                            <option value="apartment">Apartment</option>
                            <option value="house">House</option>
                            <option value="land">Land</option>
                        </select>
                    </div>

                    <!-- Listing Type -->
                    <div>
                        <label for="listing_type" class="block text-sm text-gray-900">Listing Type</label>
                        <select id="listing_type" name="listing_type"
                            class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm"
                            required>
                            <option value="">Select Listing Type</option>
                            <option value="rent">Rent</option>
                            <option value="sale">Sale</option>
                        </select>
                    </div>
                </div>

                <!-- Images Upload -->
                <div class="mb-4">
                    <label for="images" class="block text-sm text-gray-900">Upload Images</label>
                    <input type="file" id="images" name="images[]" accept="image/*" multiple
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm">
                    <p class="text-gray-500 text-xs mt-1">You can upload multiple images at once.</p>
                </div>

                <!-- Image Preview -->
                <div id="image-preview" class="mb-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition duration-200 text-sm">
                        Submit Listing
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

<!-- CKEditor Integration for the description field -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>

<!-- JavaScript for Image Preview -->
<script>
    const imagesInput = document.getElementById('images');
    const previewContainer = document.getElementById('image-preview');

    imagesInput.addEventListener('change', function() {
        previewContainer.innerHTML = '';

        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = file.name;
                img.classList.add('w-full', 'h-24', 'object-cover', 'rounded-md', 'shadow');
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });
</script>
@endsection