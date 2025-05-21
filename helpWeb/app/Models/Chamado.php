<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\StatusDoChamado;

class Chamado extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_cod_tecnico',
        'n_cod_solicitante',
        'titulo',
        'descricao',
        'f_status',
        'n_categoria',
        // 'n_cod_usuario_inc',
        // 'n_cod_usuario_alt',
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

    public function getStatusNomeAttribute()
    {
        switch ($this->f_status) {
            case 1:
                return "Novo Chamado";
                break;
            case 2:
                return "Em Atendimento";
                break;
            case 3:
                return "Em Validação";
                break;
            case 4:
                return "Finalizado";
                break;
            default:
                return "Desconhecido"; 
        }
    }

    
}
