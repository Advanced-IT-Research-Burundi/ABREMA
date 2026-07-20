<?php

namespace App\Http\Controllers\Admin;

use App\Models\TexteReglementaire;

class TexteImportExportController extends TexteBaseController
{
    protected $category = TexteReglementaire::CAT_IMPORT_EXPORT;
    protected $routeName = 'admin.texte-import-export';
    protected $title = 'Texte Réglementaire - Import & Export';
}
