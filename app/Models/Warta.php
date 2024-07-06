<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warta extends Model
{
  use HasFactory;
  protected $guarded = [];

  protected $casts = [
    'tanggal_kegiatan' => 'datetime',
  ];


  public function detailWarta()
  {
    return $this->hasOne(DetailWarta::class);
  }
}
