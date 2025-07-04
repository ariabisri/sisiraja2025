<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = ['layer_id', 'nama', 'judul', 'deskripsi', 'latlng', 'icon'];

    public function layer()
    {
        return $this->belongsTo(Layer::class);
    }
}
