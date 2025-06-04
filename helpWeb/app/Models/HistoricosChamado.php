<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\StatusChamado;

class HistoricosChamado extends Model
{
    use HasFactory;

    protected $fillable = ['cod_chamado'
    , 'status'
    , 'comentario'
    , 'cod_usuario_inc'
    ];

    public function usuarioInclusao()
    {
        return $this->belongsTo(User::class, 'cod_usuario_inc');
    }

    // protected $casts = [
    //     'status' => StatusChamado::class,
    // ];
}
