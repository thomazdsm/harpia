<?php

namespace Modulos\RH\Services;

use Illuminate\Support\Facades\DB;
use Exception;

class CTRConnectionService
{
    public function checkConnection()
    {
        try {
            // Tenta fazer uma consulta simples
            DB::connection('sqlsrv')->getPdo();
            return [
                'status' => true,
                'message' => 'Conexão ativa com o banco de dados'
            ];
        } catch (Exception $e) {
            return [
                'status' => false,
                'message' => 'Sem conexão com o banco de dados'
            ];
        }
    }
}