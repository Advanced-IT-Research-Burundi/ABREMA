<?php

namespace App\Http\Controllers\Admin;

use App\Models\TexteReglementaire;

class TexteVigilanceController extends TexteBaseController
{
    protected $category = TexteReglementaire::CAT_VIGILANCE;
    protected $routeName = 'admin.texte-vigilance';
    protected $title = 'Texte Réglementaire - Vigilance';
}
