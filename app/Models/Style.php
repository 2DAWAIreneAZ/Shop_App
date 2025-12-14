<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model {
    use HasFactory;

    protected $table = 'style';
    
    protected $fillable = [
        'name',
        'difficulty'
    ];

    // Relación: Un estilo tiene muchos productos
    public function products() {
        return $this->hasMany(Product::class, 'id_style');
    }
}
