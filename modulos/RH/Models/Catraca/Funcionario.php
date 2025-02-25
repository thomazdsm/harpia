<?php

namespace Modulos\RH\Models\Catraca;

use Illuminate\Database\Eloquent\Model;
use Modulos\Core\Model\BaseModel;

class Funcionario extends BaseModel
{
    protected $connection = 'sqlsrv';
    protected $table = 'Funcionarios';
    protected $primaryKey = 'COD_PESSOA';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'COD_PESSOA',
        'Nome',
        'COD_DEPARTAMENTO',
        'COD_ZT',
        'COD_PERFIL',
        'IgnorarRota',
        'IgnorarAntiPassback',
        'IgnorarEntradas',
        'Login',
        'Senha',
        'NivelDeAcesso',
        'Bloqueado',
        'InicioBloqueio',
        'FimBloqueio',
        'Matricula',
        'Observacao',
        'IDExportacao',
        'SenhaAcesso',
        'DtUltimaAlteracaoSenha',
        'CriptedData',
        'PrecisaAlterarSenha',
        'CountSenhaInvalida'
    ];

    protected $casts = [
        'IgnorarRota' => 'boolean',
        'IgnorarAntiPassback' => 'boolean',
        'IgnorarEntradas' => 'boolean',
        'Bloqueado' => 'boolean',
        'InicioBloqueio' => 'datetime',
        'FimBloqueio' => 'datetime',
        'DtUltimaAlteracaoSenha' => 'datetime',
        'CriptedData' => 'boolean',
        'PrecisaAlterarSenha' => 'boolean'
    ];

    // Relationships
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'COD_PESSOA', 'COD_PESSOA');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'COD_DEPARTAMENTO', 'COD_DEPARTAMENTO');
    }

//    public function zonaDeTempo()
//    {
//        return $this->belongsTo(ZonaDeTempo::class, 'COD_ZT', 'COD_ZT');
//    }
//
//    public function perfilDeAcesso()
//    {
//        return $this->belongsTo(PerfilDeAcesso::class, 'COD_PERFIL', 'COD_PERFIL');
//    }

    public function getPresenteAttribute()
    {
        $hoje = now()->subDay()->startOfDay(); // TODO: retirar ->subDay()
        $agora = now()->subDay(); // TODO: retirar ->subDay()

        // Encontra a última entrada do funcionário hoje
        $ultimaEntrada = Bilhete::where('COD_PESSOA', $this->COD_PESSOA) // COD Thomaz
        ->where('Tipo', 10) // Entrada
        ->whereBetween('DataHora', [$hoje, $agora])
            ->orderBy('DataHora', 'desc')
            ->first();

        // Se não tem entrada hoje, não está presente
        if (!$ultimaEntrada) {
            return false;
        }

        // Verifica se existe uma saída após a última entrada
        $temSaida = Bilhete::where('COD_PESSOA', $this->COD_PESSOA) // COD Thomaz
        ->where('Tipo', 11) // Saída
        ->where('DataHora', '>', $ultimaEntrada->DataHora)
            ->exists();

        // Se não tem saída após a última entrada, está presente
        return !$temSaida;
    }
}
