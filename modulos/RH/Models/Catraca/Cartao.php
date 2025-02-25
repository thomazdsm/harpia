<?php

namespace Modulos\RH\Models\Catraca;

use Illuminate\Database\Eloquent\Model;
use Modulos\Core\Model\BaseModel;

class Cartao extends BaseModel
{
    protected $connection = 'sqlsrv';
    protected $table = 'Cartoes';
    protected $primaryKey = 'NUM_CARTAO';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'NUM_CARTAO',
        'COD_PESSOA',
        'CodigoDeBarras',
        'DarBaixa',
        'Offline',
        'SemDigital',
        'EnviadoListaSemDigital'
    ];

    protected $casts = [
        'DarBaixa' => 'boolean',
        'Offline' => 'boolean',
        'SemDigital' => 'integer',
        'EnviadoListaSemDigital' => 'integer'
    ];

    // Relationships
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'COD_PESSOA', 'COD_PESSOA');
    }
}