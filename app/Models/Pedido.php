<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $table = "pedidos";

    protected $fillable = ['cliente', 'producto', 'fecha_pedido', 'total'];

    protected $primaryKey = 'id';
}
