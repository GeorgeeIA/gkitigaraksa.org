<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAgama extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function getFormattedIdAttribute()
  {
    return str_pad($this->attributes['id'], 3, '0', STR_PAD_LEFT);
  }

  public function gembala()
  {
    return $this->belongsTo(Pengurus::class, 'pengurus_gembala_sidang_id');
  }
  public function guru()
  {
    return $this->belongsTo(Pengurus::class, 'pengurus_guru_sekolah_minggu_id');
  }
}
