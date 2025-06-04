<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login',
        'senha',
        'nome_completo',
        'nome_resumido',
        'cpf_cnpj',
        'rg',
        'tipo_fj',
        'tipo_usuario',
        'cep',
        'endereco',
        'numero_endereco',
        'bairo',
        'cidade',
        'estado',
        'd_inicio',
        'd_fim',
        // 'cod_usuario_inc',
        // 'd_inclusao'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'd_inicio' => 'datetime',
        'd_fim' => 'datetime',
        'd_inclusao' => 'datetime',
        'senha' => 'hashed',
    ];

    public function getAuthIdentifierName()
    {
        return 'login';
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
