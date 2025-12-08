<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = strtolower($request->input('q'));

    if (!$query) {
        return back();
    }

    // chemin vers les vues
    $viewsPath = resource_path('views');

    // récupérer tous les fichiers blade
    $files = collect(File::allFiles($viewsPath));

    $results = [];

    foreach ($files as $file) {
        $content = strtolower(file_get_contents($file->getRealPath()));

        dd(strpos($content, $query));
        if (strpos($content, $query) !== false) {
            dd($file);
            $results[] = [
                'file' => str_replace($viewsPath.'/', '', $file->getRealPath()),
                'name' => basename($file->getRealPath()),
            ];
        }
    }

    return view('web.search', compact('results', 'query'));
}
}
