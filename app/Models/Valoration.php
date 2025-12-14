<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoration extends Model {
    use HasFactory;

    protected $table = 'valoration';
    
    protected $fillable = [
        'id_product',
        'puntuation',
        'comment',
        'date'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    // Relación: Una valoración pertenece a un producto
    public function product() {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
