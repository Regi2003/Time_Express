<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = "pedidos";

    protected $fillable = ['nombre', 'descripcion', 'precio', 'inventario'];

    protected $primaryKey = 'id';
}
