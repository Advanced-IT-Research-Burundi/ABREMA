@extends('layouts.admin')

@section('title', 'Formulaire d\' Inspections')
@section('page-title', 'Formulaire d\' Inspections')

@section('content')
    <div class="space-y-6">
        @if ($errors->any())
            <div class="rounded-xl bg-red-50 border border-red-200 p-4 text-red-700 space-y-1">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div class="space-y-1">
                <h2 class="text-2xl font-bold text-gray-800">Configuration du Formulaire d'inspection</h2>
                <p class="text-gray-600">Téléversez et visualisez votre formulaire directement depuis cette page.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.formulaire-inspection.index') }}"
                    class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">
                    <i class="fas fa-sync-alt mr-2"></i> Actualiser
                </a>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 lg:col-span-9 flex flex-col gap-6">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden h-[800px] flex flex-col">
                    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between bg-gray-50">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-eye text-green-600"></i>
                            <span class="font-semibold text-gray-800">Aperçu du Document</span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-600">
                            <button class="p-2 hover:bg-gray-200 rounded transition">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <button class="p-2 hover:bg-gray-200 rounded transition">
                                <i class="fas fa-search-minus"></i>
                            </button>
                            <div class="w-px h-4 bg-gray-300 mx-2"></div>
                            <span
                                class="text-sm font-medium">{{ $latestInspection ? 'Dernier fichier' : 'Aucun fichier' }}</span>
                        </div>
                    </div>

                    <div class="flex-1 bg-gray-100 p-6 overflow-y-auto flex justify-center items-center">
                        @if ($latestInspection)
                            @if (str_ends_with(strtolower($latestInspection->file_path), '.pdf'))
                                <iframe
                                    src="{{ asset(str_starts_with($latestInspection->file_path, 'doc/') ? $latestInspection->file_path : 'doc/' . $latestInspection->file_path) }}"
                                    class="w-full h-full rounded-xl border border-gray-200" frameborder="0">
                                    <div
                                        class="w-full h-full flex flex-col items-center justify-center text-center text-gray-500">
                                        <i class="fas fa-file-pdf text-4xl mb-4"></i>
                                        <p>Impossible d'afficher le PDF dans ce navigateur.</p>
                                        <p class="text-sm">Le fichier est disponible dans la zone de téléversement.</p>
                                    </div>
                                </iframe>

                                {{-- affichage du fichier word sinon affichage du message d'erreur --}}
                            @elseif (str_ends_with(strtolower($latestInspection->file_path), '.doc') ||
                                    str_ends_with(strtolower($latestInspection->file_path), '.docx'))
                                @php
                                    $documentPath = str_starts_with($latestInspection->file_path, 'doc/')
                                        ? $latestInspection->file_path
                                        : 'doc/' . $latestInspection->file_path;
                                @endphp
                                <div
                                    class="w-full h-full rounded-xl border border-gray-200 bg-white p-8 flex flex-col items-center justify-center text-center gap-4">
                                    <i class="fas fa-file-word text-5xl text-blue-600"></i>
                                    <div>
                                        <p class="text-lg font-semibold text-gray-800">{{ $latestInspection->title }}</p>
                                        <p>La prévisualisation Word externe est désactivée.</p>
                                        <p class="text-sm">Le fichier est disponible dans la zone de téléversement.</p>
                                    </div>
                                    <a href="{{ asset($documentPath) }}" download
                                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition">
                                        <i class="fas fa-download"></i>
                                        Télécharger le document
                                    </a>
                                </div>
                            @else
                                <div
                                    class="w-full h-full rounded-xl border border-gray-200 bg-white p-8 flex flex-col items-center justify-center text-center gap-4">
                                    <i class="fas fa-file-alt text-5xl text-green-600"></i>
                                    <div>
                                        <p class="text-lg font-semibold text-gray-800">{{ $latestInspection->title }}</p>
                                        <p class="text-sm text-gray-500">Type de fichier non prévisualisable dans le
                                            navigateur.</p>
                                        <p class="text-xs text-gray-400 mt-2">Le fichier est disponible dans la zone de
                                            téléversement.</p>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div
                                class="w-full h-full rounded-xl border border-dashed border-gray-200 bg-white p-8 flex flex-col items-center justify-center text-center gap-4 text-gray-500">
                                <i class="fas fa-file-invoice text-5xl"></i>
                                <p class="text-lg font-semibold">Aucun formulaire téléversé</p>
                                <p class="text-sm">Utilisez la zone de téléversement à droite pour ajouter votre premier
                                    document.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-3 flex flex-col gap-6">
                @if ($latestInspection)
                    <!-- Statut du fichier téléversé -->
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-green-800">Fichier téléversé</p>
                                <p class="text-xs text-green-600">Prêt à être visualisé</p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-gray-800">{{ $latestInspection->title }}</p>
                            <p class="text-xs text-gray-500">{{ $latestInspection->created_at->format('d M Y à H:i') }}</p>
                            <p class="text-xs text-gray-500">
                                {{ strtoupper(pathinfo($latestInspection->file_path, PATHINFO_EXTENSION)) }} •
                                @php
                                    // Gérer les anciens chemins (avec "doc/") et les nouveaux
                                    $relativePath = str_starts_with($latestInspection->file_path, 'doc/')
                                        ? $latestInspection->file_path
                                        : 'doc/' . $latestInspection->file_path;
                                    $filePath = public_path($relativePath);
                                    $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                                @endphp
                                {{ $fileSize > 0 ? number_format($fileSize / 1024, 1) . ' KB' : 'Fichier introuvable' }}</p>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <a href="{{ asset(str_starts_with($latestInspection->file_path, 'doc/') ? $latestInspection->file_path : 'doc/' . $latestInspection->file_path) }}"
                                target="_blank"
                                class="inline-flex items-center px-3 py-2 text-xs bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                <i class="fas fa-external-link-alt mr-1"></i> Ouvrir
                            </a>
                            <form action="{{ route('admin.formulaire-inspection.destroy', $latestInspection) }}"
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce formulaire ?')"
                                    class="inline-flex items-center px-3 py-2 text-xs bg-red-50 border border-red-200 text-red-700 rounded-lg hover:bg-red-100 transition">
                                    <i class="fas fa-trash mr-1"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Formulaire d'ajout de version -->
                    <form action="{{ route('admin.formulaire-inspection.store') }}" method="POST"
                        enctype="multipart/form-data"
                        class="bg-white border-2 border-dashed border-gray-300 rounded-xl p-6 text-center group hover:border-green-400 transition-all">
                        @csrf
                        <div
                            class="w-12 h-12 mx-auto rounded-full bg-gray-100 flex items-center justify-center text-gray-600 group-hover:bg-green-100 group-hover:text-green-600 transition-all">
                            <i class="fas fa-exchange-alt text-2xl"></i>
                        </div>
                        <div class="mt-4 space-y-3">
                            <p class="text-sm font-semibold text-gray-800">Ajouter une nouvelle version</p>
                            <p class="text-xs text-gray-600">PDF, DOC ou DOCX — max 2 MB</p>
                            <label for="file-upload"
                                class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-semibold text-green-700 bg-green-50 border border-green-200 rounded-lg cursor-pointer hover:bg-green-100">
                                Choisir un fichier
                            </label>
                            <input id="file-upload" type="file" name="file" accept=".pdf,.doc,.docx" class="sr-only"
                                required>
                        </div>

                        <div class="mt-5 text-left">
                            <label class="block text-sm font-medium text-gray-700">Titre du formulaire</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                placeholder="Titre du formulaire"
                                class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-100"
                                required>
                        </div>

                        <button type="submit"
                            class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-3 text-sm font-semibold text-white hover:bg-green-700 transition">
                            <i class="fas fa-upload"></i>
                            Enregistrer la version
                        </button>
                    </form>
                @else
                    <!-- Formulaire de téléversement initial -->
                    <form action="{{ route('admin.formulaire-inspection.store') }}" method="POST"
                        enctype="multipart/form-data"
                        class="bg-white border-2 border-dashed border-gray-300 rounded-xl p-6 text-center group hover:border-green-400 transition-all">
                        @csrf
                        <div
                            class="w-12 h-12 mx-auto rounded-full bg-gray-100 flex items-center justify-center text-gray-600 group-hover:bg-green-100 group-hover:text-green-600 transition-all">
                            <i class="fas fa-cloud-upload-alt text-2xl"></i>
                        </div>
                        <div class="mt-4 space-y-3">
                            <p class="text-sm font-semibold text-gray-800">Téléverser un nouveau fichier</p>
                            <p class="text-xs text-gray-600">PDF, DOC ou DOCX — max 2 MB</p>
                            <label for="file-upload"
                                class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-semibold text-green-700 bg-green-50 border border-green-200 rounded-lg cursor-pointer hover:bg-green-100">
                                Choisir un fichier
                            </label>
                            <input id="file-upload" type="file" name="file" accept=".pdf,.doc,.docx"
                                class="sr-only" required>
                        </div>

                        <div class="mt-5 text-left">
                            <label class="block text-sm font-medium text-gray-700">Titre du formulaire</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                placeholder="Titre du formulaire"
                                class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-100"
                                required>
                        </div>

                        <button type="submit"
                            class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-3 text-sm font-semibold text-white hover:bg-green-700 transition">
                            <i class="fas fa-upload"></i>
                            Téléverser
                        </button>
                    </form>
                @endif

                <!-- Historique des documents -->
                @if ($inspections->count() > 1)
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase mb-4">Historique</h3>
                        <div class="space-y-3 max-h-48 overflow-y-auto">
                            @foreach ($inspections->skip(1) as $inspection)
                                <div class="flex items-center justify-between gap-3 p-3 rounded-lg bg-gray-50">
                                    <div class="min-w-0">
                                        <p class="text-sm font-medium text-gray-800 truncate">{{ $inspection->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $inspection->created_at->format('d M Y à H:i') }}
                                        </p>
                                    </div>
                                    <form action="{{ route('admin.formulaire-inspection.destroy', $inspection) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Supprimer ce formulaire ?')"
                                            class="text-red-600 text-xs hover:text-red-800">×</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('form').forEach((form) => {
            const fileInput = form.querySelector('input[type="file"][name="file"]');
            const titleInput = form.querySelector('input[type="text"][name="title"]');

            if (!fileInput || !titleInput) {
                return;
            }

            fileInput.addEventListener('change', () => {
                const file = fileInput.files[0];

                if (!file) {
                    return;
                }

                titleInput.value = file.name.replace(/\.[^/.]+$/, '');
            });
        });
    </script>
@endpush
