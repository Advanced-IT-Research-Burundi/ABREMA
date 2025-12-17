@extends('layouts.admin')

@section('title', 'Nouveau Client')
@section('page-title', 'Nouveau Client')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a>
            </li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li>
                <a href="{{ route('admin.clients.index') }}" class="hover:text-green-600">Clients</a>
            </li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Nouveau</li>
        </ol>
    </nav>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Créer un Client</h2>
            <p class="text-gray-600 mt-1">Ajoutez un nouveau client à votre base de données</p>
        </div>

        <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Nom -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nom du client <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Ex : Clinique Saint Luc"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('name') border-red-500 @enderror"
                    required
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    placeholder="Informations complémentaires sur le client..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('description') border-red-500 @enderror"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image (optionnelle) -->
            {{-- <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    Photo du client
                </label>

                <label for="image"
                    class="flex flex-col items-center justify-center w-full h-56 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                    <div class="flex flex-col items-center justify-center">
                        <i class="fas fa-user-circle text-4xl text-gray-400 mb-3"></i>
                        <p class="text-sm text-gray-500">
                            <span class="font-semibold">Cliquez pour télécharger</span> ou glissez-déposez
                        </p>
                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, JPEG (max 5MB)</p>
                    </div>
                    <input
                        id="image"
                        name="image"
                        type="file"
                        class="hidden"
                        accept="image/*"
                        onchange="previewImage(event)"
                    >
                </label>

                <!-- Preview -->
                <div id="imagePreview" class="hidden mt-4">
                    <div class="relative">
                        <img id="preview" class="w-40 h-40 object-cover rounded-full mx-auto">
                        <button
                            type="button"
                            onclick="removeImage()"
                            class="absolute top-0 right-1/2 translate-x-20 bg-red-500 text-white p-1 rounded-full hover:bg-red-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div> --}}

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.clients.index') }}"
                   class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Annuler
                </a>

                <button type="submit"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    <i class="fas fa-save mr-2"></i> Enregistrer
                </button>
            </div>

        </form>
    </div>
</div>

@push('scripts')
<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const container = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            container.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('imagePreview').classList.add('hidden');
}
</script>
@endpush
@endsection
