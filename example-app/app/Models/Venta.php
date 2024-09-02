<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $primaryKey = "VentasID";
    protected $fillable = ['VentasID','ProductoID','cantidad','precio_total','fecha_venta'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ProductoID');
    }
}
