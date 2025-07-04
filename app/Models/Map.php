<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'zoom',
        'description',
        'map_type',
        'polygon',
        'marker_color',
    ];

    public function layers()
    {
        return $this->belongsToMany(Layer::class, 'layer_map');
    }
}
