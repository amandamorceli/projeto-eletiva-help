<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\StatusDoChamado;

class Chamado extends Model
{
    use HasFactory;

    protected $fillable = [
        'cod_tecnico',
        'cod_solicitante',
        'titulo',
        'descricao',
        'status',
        'categoria',
        'cod_usuario_inc',
        // 'cod_usuario_alt',
        'd_inclusao'
    ];

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'cod_tecnico');
    }

    public function solicitante()
    {
        return $this->belongsTo(User::class, 'cod_solicitante');
    }

    public function usuarioInclusao()
    {
        return $this->belongsTo(User::class, 'cod_usuario_inc');
    }

    public function usuarioAlteracao()
    {
        return $this->belongsTo(User::class, 'cod_usuario_alt');
    }

    public function categoriaDoChamado()
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }

    public function historicos()
    {
        return $this->hasMany(HistoricosChamado::class, 'cod_chamado');
    }

    public function getStatusNomeAttribute()
    {
        switch ($this->status) {
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
