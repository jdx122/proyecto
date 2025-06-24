<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'valor',
        'imagen',
        'estado_producto',
        'estado',
        'categoria_id',
        'usuario_id',
        'ciudad_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }
    public function comentarios()
    {
    return $this->hasMany(Comentario::class);
    }

}


