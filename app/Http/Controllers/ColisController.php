<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ColiStoreRequest;
use App\Mail\abremamail;
use App\Models\Colis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ColisController extends Controller
{
    public function index()
    {
        $colis = Colis::latest()->paginate(10)->withQueryString();
        return view('admin.colis.index', compact('colis'));
    }

    public function store(ColiStoreRequest $request)
    {
        $colis = $request->validated();

        if ($request->hasFile('pathfile')) {

            $file = $request->file('pathfile');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('colis-files'), $filename);

            $colis['pathfile'] = 'colis-files/' . $filename;
        }

        Colis::create($colis);

        return back()->with('success', 'Colis soumis avec succès !');
    }
}
