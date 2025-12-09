{{-- PUBLICATIONS INDEX --}}
@extends('layouts.admin')

@section('title', 'Gestion des Publications')
@section('page-title', 'Publications')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Publications</h2>
        <a href="{{ route('admin.publications.create') }}" class="px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition">
            <i class="fas fa-plus mr-2"></i> Nouvelle Publication
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Publication</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Description</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Date</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($publications as $publication)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($publication->image)
                                <img src="{{ Storage::url($publication->image) }}" alt="" class="w-16 h-16 object-cover rounded-lg mr-4">
                            @else
                                <div class="w-16 h-16 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-book text-yellow-600 text-xl"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-medium text-gray-900">{{ $publication->title }}</p>
                                <p class="text-xs text-gray-500">Par {{ $publication->user->name ?? 'Admin' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 line-clamp-2">{{ $publication->description }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $publication->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.publications.edit', $publication->id) }}" class="p-2 text-green-600 hover:bg-green-50 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.publications.destroy', $publication->id) }}" onsubmit="return confirm('Supprimer?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <i class="fas fa-book text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 mb-4">Aucune publication</p>
                        <a href="{{ route('admin.publications.create') }}" class="inline-flex items-center px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                            <i class="fas fa-plus mr-2"></i> Créer une publication
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection