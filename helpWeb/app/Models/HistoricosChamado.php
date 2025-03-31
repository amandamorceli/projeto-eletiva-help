<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\StatusChamado;

class HistoricosChamado extends Model
{
    use HasFactory;

    protected $fillable = ['n_cod_chamado'
    , 'f_status'
    , 'c_comentario'
    , 'n_cod_usuario_inc'
    ];

    public function usuarioInclusao()
    {
        return $this->belongsTo(User::class, 'n_cod_usuario_inc');
    }

    protected $casts = [
        'f_status' => StatusChamado::class,
    ];
}
