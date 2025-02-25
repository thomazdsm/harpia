<?php

namespace Modulos\RH\Models\Catraca;

use Illuminate\Database\Eloquent\Model;
use Modulos\Core\Model\BaseModel;

class Departamento extends BaseModel
{
    protected $connection = 'sqlsrv';
    protected $table = 'Departamentos';
    protected $primaryKey = 'COD_DEPARTAMENTO';
    public $timestamps = false;

    protected $fillable = [
        'Descricao',
        'COD_EMPRESA'
    ];

    // Relationships
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'COD_EMPRESA', 'COD_EMPRESA');
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class, 'COD_DEPARTAMENTO', 'COD_DEPARTAMENTO');
    }
}
