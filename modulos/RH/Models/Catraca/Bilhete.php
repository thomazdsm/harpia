<?php

namespace Modulos\RH\Models\Catraca;

use Modulos\Core\Model\BaseModel;

class Bilhete extends BaseModel
{
    protected $connection = 'sqlsrv';
    protected $table = 'Bilhetes';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'COD_PESSOA',
        'COD_LOCAL',
        'Tipo',
        'NumInner',
        'DataHora',
        'Ordem',
        'Exportado'
    ];

    protected $searchable = [
        'COD_PESSOA' => '=',
        'Tipo' => '=',
        'DataHora' => '='
    ];

    protected $casts = [
        'COD_PESSOA' => 'integer',
        'COD_LOCAL' => 'integer',
        'Tipo' => 'integer',
        'NumInner' => 'integer',
        'DataHora' => 'datetime',
        'Ordem' => 'integer',
        'Exportado' => 'integer'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'COD_PESSOA', 'COD_PESSOA');
    }

//    public function localDeAcesso()
//    {
//        return $this->belongsTo(LocalDeAcesso::class, 'COD_LOCAL', 'COD_LOCAL');
//    }
//
//    public function inner()
//    {
//        return $this->belongsTo(Inner::class, 'NumInner', 'Numero');
//    }
}
