<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerrainImage extends Model
{
    use HasFactory;

    public $timestamps = false; // As per your schema

    protected $fillable = [
        'terrain_id',
        'image_path',
        'uploaded_at',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }
}
