<?php

namespace App\Http\Controllers;

use App\Models\Birim;
use Illuminate\Http\Request;

class BirimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $query = Birim::query();
        if (!empty($q)) {
            $query->where('birim_adi', 'LIKE', "%{$q}%");
        }

        return response()->json($query->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'birim_adi' => 'required|string|max:255',
            'konumu' => 'required|string|max:255',
        ]);

        $birim = Birim::create($data);
        return response()->json($birim, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Birim $birim)
    {
        // Route model binding: {birim} paramı üzerinden gelir
        return response()->json($birim);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Birim $birim)
    {
        $data = $request->validate([
            'birim_adi' => 'sometimes|required|string|max:255',
            'konumu' => 'sometimes|required|string|max:255',
        ]);

        $birim->update($data);
        return response()->json($birim);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Birim $birim)
    {
        $birim->delete();
        return response()->noContent();
    }
}
