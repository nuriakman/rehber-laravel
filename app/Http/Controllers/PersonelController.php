<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use Illuminate\Http\Request;

class PersonelController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $q = $request->query('q');

    // İlişkileri eager load et
    $query = Personel::with(['unvan', 'birim']);
    //$query = Personel::all(); // tüm kayıtları getir (diğer tablolar olmadan!)

    // Sadece adi_soyadi alanında arama
    if (!empty($q)) {
      $query->where('adi_soyadi', 'LIKE', "%{$q}%");
    }

    return response()->json($query->get());
  }


  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      'adi_soyadi' => 'required|string|max:255',
      'unvan_id' => 'required|integer|exists:unvanlar,id',
      'birim_id' => 'required|integer|exists:birimler,id',
      'notlar' => 'nullable|string',
    ]);

    $personel = Personel::create($data);
    return response()->json($personel->load(['unvan', 'birim']), 201);
  }

  /**
   * Display the specified resource.
   */
  public function show(Personel $personel)
  {
    return response()->json($personel->load(['unvan', 'birim']));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Personel $personel)
  {
    $data = $request->validate([
      'adi_soyadi' => 'sometimes|required|string|max:255',
      'unvan_id' => 'sometimes|required|integer|exists:unvanlar,id',
      'birim_id' => 'sometimes|required|integer|exists:birimler,id',
      'notlar' => 'nullable|string',
    ]);

    $personel->update($data);
    return response()->json($personel->load(['unvan', 'birim']));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Personel $personel)
  {
    $personel->delete();
    return response()->noContent();
  }
}
