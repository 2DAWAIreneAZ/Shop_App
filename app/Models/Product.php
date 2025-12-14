<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $table = 'product';
    
    protected $fillable = [
        'name',
        'id_style',
        'price',
        'description',
        'image'
    ];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    // Relación: Un producto pertenece a un estilo
    public function style() {
        return $this->belongsTo(Style::class, 'id_style');
    }

    // Relación: Un producto tiene muchas valoraciones
    public function valorations() {
        return $this->hasMany(Valoration::class, 'id_product');
    }
}