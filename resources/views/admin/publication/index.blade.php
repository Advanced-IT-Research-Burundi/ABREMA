@extends('layouts.admin')

@section('title', 'Publications')
@section('page-title', 'Gestion des Publications')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Liste des Publications</h2>
            <p class="text-gray-600 mt-1">Gérer les informations et annonces officielles</p>
        </div>

        <a href="{{ route('admin.publications.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition">
            <i class="fas fa-plus mr-2"></i>
            Ajouter une Publication
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <form method="GET" action="{{ route('admin.publications.index') }}" 
              class="grid grid-cols-1 md:grid-cols-4 gap-4">
            
            <!-- Recherche -->
            <div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Rechercher un titre..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                >
            </div>

            <!-- Auteur -->
            <div>
                <select name="user" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    <option value="">Tous les auteurs</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ request('user') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date -->
            <div>
                <input 
                    type="date"
                    name="date"
                    value="{{ request('date') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                >
            </div>

            <!-- Buttons -->
            <div class="flex gap-2">
                <button type="submit" 
                        class="flex-1 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    <i class="fas fa-search mr-2"></i>Filtrer
                </button>

                <a href="{{ route('admin.publications.index') }}" 
                   class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition">
                    <i class="fas fa-redo"></i>
                </a>
            </div>

        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Titre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Auteur
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aperçu
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Créée le
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @forelse($publications as $pub)
                        <tr class="hover:bg-gray-50 transition">

                            <!-- Titre -->
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $pub->title }}
                                </div>
                            </td>

                            <!-- Auteur -->
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $pub->user?->name ?? 'Administrateur' }}
                            </td>

                            <!-- Aperçu description -->
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div class="line-clamp-2">
                                    {{ Str::limit($pub->description, 80) }}
                                </div>
                            </td>

                            <!-- Date -->
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $pub->created_at->format('d M Y') }}
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 text-right text-sm">
                                <div class="flex items-center justify-end space-x-2">

                                    <!-- Edit -->
                                    <a href="{{ route('admin.publications.edit', $pub) }}" 
                                       class="text-blue-600 hover:text-blue-800"
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.publications.destroy', $pub) }}" 
                                          method="POST"
                                          onsubmit="return confirm('Voulez-vous vraiment supprimer cette publication ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-800"
                                                title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="text-gray-400">
                                    <i class="fas fa-newspaper text-4xl mb-4"></i>
                                    <p class="text-lg font-medium">Aucune publication trouvée</p>
                                    <p class="text-sm mt-2">Ajoutez votre première publication</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($publications->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $publications->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
