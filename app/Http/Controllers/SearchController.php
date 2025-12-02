<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // accept either ?q= or ?query= to be safe
        $query = trim((string) $request->input('q', $request->input('query', '')));

        if ($query === '') {
            // return an empty paginator so view()->links() still works
            $results = Item::whereRaw('0 = 1')->paginate(15);
        } else {
            $results = Item::with('itemable')
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                })
                ->orderBy('created_at', 'desc')
                ->paginate(15)
                ->appends(['q' => $query]); // keep query in pagination links
        }

        return view('web.seach', [
            'query' => $query,
            'results' => $results,
        ]);
    }
}
