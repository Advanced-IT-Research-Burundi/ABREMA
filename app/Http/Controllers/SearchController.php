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

    $viewsPath = resource_path('views');
    $files = collect(File::allFiles($viewsPath));

    $results = [];
    $debug = []; // tableau pour afficher sur la page web

    foreach ($files as $file) {
        $content = strtolower(file_get_contents($file->getRealPath()));
        $pos = strpos($content, $query);

        $debug[] = [
            'file' => $file->getRealPath(),
            'position' => $pos,
        ];

        if ($pos !== false) {
            $results[] = [
                'file' => str_replace($viewsPath.'/', '', $file->getRealPath()),
                'name' => basename($file->getRealPath()),
            ];
        }
    }

    return view('web.search', compact('results', 'query', 'debug'));
}

}
