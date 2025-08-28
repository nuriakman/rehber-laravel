<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
  use HasFactory;

  protected $table = 'personel';

  protected $fillable = [
    'adi_soyadi',
    'unvan_id',
    'birim_id',
    'notlar',
  ];

  public function unvan()
  {
    return $this->belongsTo(Unvan::class, 'unvan_id');
  }

  public function birim()
  {
    return $this->belongsTo(Birim::class, 'birim_id');
  }
}
