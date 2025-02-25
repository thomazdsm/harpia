<?php

namespace Modulos\RH\Models\Catraca;

use Illuminate\Database\Eloquent\Model;
use Modulos\Core\Model\BaseModel;

class Pessoa extends BaseModel
{
    protected $connection = 'sqlsrv';
    protected $table = 'Pessoas';
    protected $primaryKey = 'COD_PESSOA';
    public $timestamps = false;

    protected $fillable = [
        'COD_PESSOA',
        'Tipo'
    ];

    // Relationships
    public function cartoes()
    {
        return $this->hasMany(Cartao::class, 'COD_PESSOA', 'COD_PESSOA');
    }

    public function funcionario()
    {
        return $this->hasOne(Funcionario::class, 'COD_PESSOA', 'COD_PESSOA');
    }
}
