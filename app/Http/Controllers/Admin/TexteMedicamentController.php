<?php

namespace App\Http\Controllers\Admin;

use App\Models\TexteReglementaire;

class TexteMedicamentController extends TexteBaseController
{
    protected $category = TexteReglementaire::CAT_MEDICAMENT;
    protected $routeName = 'admin.texte-medicaments';
    protected $title = 'Texte Réglementaire - Médicaments';
}
