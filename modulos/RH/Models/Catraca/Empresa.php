<?php

namespace Modulos\RH\Models\Catraca;

use Illuminate\Database\Eloquent\Model;
use Modulos\Core\Model\BaseModel;

class Empresa extends BaseModel
{
    protected $connection = 'sqlsrv';
    protected $table = 'Empresas';
    protected $primaryKey = 'COD_EMPRESA';
    public $timestamps = false;

    protected $fillable = [
        'Descricao',
        'CNPJ',
        'Endereco',
        'CEP',
        'Complemento',
        'Cidade',
        'UF',
        'Telefone',
        'Telefone2',
        'Fax',
        'Contato',
        'Email',
        'Observacao'
    ];

    // Relationships
    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'COD_EMPRESA', 'COD_EMPRESA');
    }
}
