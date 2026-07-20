@extends('layouts.admin')

@section('head')
<meta charset="UTF-8">
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Importer des Produits depuis CSV</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form id="importForm" action="{{ route('admin.produits.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="data" id="data">
            <div class="mb-4">
                <label for="csv_file" class="block text-sm font-medium text-gray-700">Sélectionner le fichier CSV</label>
                <input type="file" id="csv_file" name="csv_file" accept=".csv" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="button" id="previewBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded disabled:opacity-50" disabled>Aperçu des données</button>
            <button type="submit" id="submitBtn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4 disabled:opacity-50" disabled>Importer</button>
        </form>

        <div id="preview" class="mt-6 hidden">
            <h2 class="text-xl font-semibold mb-4">Aperçu des données</h2>
            <div class="overflow-x-auto">
                <table id="previewTable" class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">designation_commerciale</th>
                            <th class="border border-gray-300 px-4 py-2">dci</th>
                            <th class="border border-gray-300 px-4 py-2">dosage</th>
                            <th class="border border-gray-300 px-4 py-2">forme</th>
                            <th class="border border-gray-300 px-4 py-2">conditionnement</th>
                            <th class="border border-gray-300 px-4 py-2">category</th>
                            <th class="border border-gray-300 px-4 py-2">nom_laboratoire</th>
                            <th class="border border-gray-300 px-4 py-2">pays_origine</th>
                            <th class="border border-gray-300 px-4 py-2">titulaire_amm</th>
                            <th class="border border-gray-300 px-4 py-2">pays_titulaire_amm</th>
                            <th class="border border-gray-300 px-4 py-2">num_enregistrement</th>
                            <th class="border border-gray-300 px-4 py-2">date_enrg</th>
                            <th class="border border-gray-300 px-4 py-2">date_expiration</th>
                            <th class="border border-gray-300 px-4 py-2">statut</th>
                        </tr>
                    </thead>
                    <tbody id="previewBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('csv_file').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        document.getElementById('previewBtn').disabled = false;
    } else {
        document.getElementById('previewBtn').disabled = true;
        document.getElementById('submitBtn').disabled = true;
    }
});

document.getElementById('previewBtn').addEventListener('click', function() {
    const file = document.getElementById('csv_file').files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        const text = e.target.result;
        const lines = text.split('\n').filter(line => line.trim() !== '');
        if (lines.length < 2) {
            alert('Le fichier CSV doit contenir au moins une ligne d\'en-têtes et une ligne de données.');
            return;
        }

        // Détecter le séparateur
        const firstLine = lines[0];
        const commaCount = (firstLine.match(/,/g) || []).length;
        const semicolonCount = (firstLine.match(/;/g) || []).length;
        const separator = commaCount >= semicolonCount ? ',' : ';';

        const headers = lines[0].split(separator).map(h => h.trim());
        const tbody = document.getElementById('previewBody');
        tbody.innerHTML = '';

        const dataArray = [];
        const expectedKeys = ['designation_commerciale', 'dci', 'dosage', 'forme', 'conditionnement', 'category', 'nom_laboratoire', 'pays_origine', 'titulaire_amm', 'pays_titulaire_amm', 'num_enregistrement', 'date_enrg', 'date_expiration', 'statut'];

        for (let i = 1; i < lines.length; i++) {
            const values = lines[i].split(separator).map(v => v.trim());
            if (values.length === headers.length) {
                const rowData = {};
                headers.forEach((header, index) => {
                    // Map to expected keys if header matches
                    const key = expectedKeys.find(k => k.toLowerCase() === header.toLowerCase()) || header;
                    rowData[key] = values[index] || '';
                });
                dataArray.push(rowData);

                // Afficher max 5 lignes
                if (i < 6) {
                    const row = document.createElement('tr');
                    expectedKeys.forEach(key => {
                        const cell = document.createElement('td');
                        cell.className = 'border border-gray-300 px-4 py-2';
                        cell.textContent = rowData[key] || '';
                        row.appendChild(cell);
                    });
                    tbody.appendChild(row);
                }
            }
        }

        document.getElementById('data').value = JSON.stringify(dataArray);
        document.getElementById('preview').classList.remove('hidden');
        document.getElementById('submitBtn').disabled = false;
    };
    reader.readAsText(file, 'UTF-8');
});
</script>
@endsection