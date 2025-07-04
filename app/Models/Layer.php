<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
    use HasFactory;

    protected $fillable = ['nama_layer', 'deskripsi', 'json', 'geojson_path', 'feature'];

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function maps()
    {
        return $this->belongsToMany(Map::class, 'layer_map');
    }
}
