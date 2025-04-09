<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\StatusChamado;

class Chamado extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_cod_tecnico',
        'n_cod_solicitante',
        'titulo',
        'descricao',
        'f_status',
        'f_categoria',
        'n_cod_usuario_inc',
        'n_cod_usuario_alt',
        'd_inclusao'
    ];

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'n_cod_tecnico');
    }

    public function solicitante()
    {
        return $this->belongsTo(User::class, 'n_cod_solicitante');
    }

    public function usuarioInclusao()
    {
        return $this->belongsTo(User::class, 'n_cod_usuario_inc');
    }

    public function usuarioAlteracao()
    {
        return $this->belongsTo(User::class, 'n_cod_usuario_alt');
    }

    public function categoriaDoChamado()
    {
        return $this->belongsTo(Categoria::class, 'n_categoria');
    }

    protected $casts = [
        'f_status' => StatusChamado::class,
    ];
}
