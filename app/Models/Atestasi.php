<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atestasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFormattedIdAttribute()
    {
        return str_pad($this->attributes['id'], 3, '0', STR_PAD_LEFT);
    }


    public function ketua()
    {
        return $this->belongsTo(Pengurus::class, 'pengurus_ketua_id');
    }

    public function sekretaris()
    {
        return $this->belongsTo(Pengurus::class, 'pengurus_sekretaris_id');
    }

    public function gembala()
    {
        return $this->belongsTo(Pengurus::class, 'pengurus_gembala_sidang_id');
    }
}
