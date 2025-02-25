<?php

namespace Modulos\RH\Http\Controllers\Catraca;

use ActionButton;
use Illuminate\Http\Request;
use Modulos\Core\Http\Controller\BaseController;
use Modulos\RH\Repositories\BilheteRepository;
use Modulos\RH\Models\Catraca\Funcionario;
use Carbon\Carbon;

class BilhetesController extends BaseController
{
    protected $bilheteRepository;

    public function __construct(BilheteRepository $bilheteRepository)
    {
        $this->bilheteRepository = $bilheteRepository;
    }

    public function index(Request $request)
    {
        $paginacao = null;
        $tabela = null;

        // Obter lista de funcionários para o dropdown de filtro
        $funcionarios = Funcionario::orderBy('Nome')->get();

        // Processar filtros
        $filtros = $request->all();

        // Se funcionário for selecionado, usar o código
        if (!empty($request->funcionario)) {
            $filtros['COD_PESSOA'] = $request->funcionario;
        }

        $tableData = $this->bilheteRepository->paginateRequest($filtros);

        if ($tableData->count()) {
            // Assumindo que você está usando o mesmo pacote de tabela que usa em HorasTrabalhadasController
            $tabela = $tableData->columns(array(
                'COD_PESSOA' => 'Código Pessoa',
                'Tipo' => 'Tipo',
                'DataHora' => 'Data/Hora'
            ))
                ->modify('COD_PESSOA', function ($obj) {
                    return $obj->pessoa->funcionario->Nome;
                })
                ->modify('DataHora', function($obj) {
                    return $obj->DataHora->format('d/m/Y H:i:s');
                })
                ->modify('Tipo', function($obj) {
                    if ($obj->Tipo == '10') {
                        return '<span class="badge" style="background-color: darkgreen">Entrada</span>';
                    }
                    else if ($obj->Tipo == '11') {
                        return '<span class="badge" style="background-color: darkred">Saida</span>';
                    }
                    return 'Indeterminado';
                })
                ->sortable(['DataHora', 'COD_PESSOA', 'Tipo']);

            $paginacao = $tableData->appends($request->except('page'));
        }

        return view('RH::bilhetes.index', [
            'tabela' => $tabela,
            'paginacao' => $paginacao,
            'filtros' => $request->all(), // Passar os filtros para a view
            'funcionarios' => $funcionarios // Passar a lista de funcionários para o dropdown
        ]);
    }

    public function details(Request $request)
    {
        $paginacao = null;
        $tabela = null;

        // Obter lista de funcionários para o dropdown de filtro
        $funcionarios = Funcionario::orderBy('Nome')->get();

        // Processar filtros
        $filtros = $request->all();

        // Formatar datas se fornecidas
        if (!empty($request->data_inicio)) {
            try {
                $dataInicio = Carbon::createFromFormat('d/m/Y', $request->data_inicio)->startOfDay();
                $filtros['data_inicio'] = $dataInicio->format('Y-m-d');
            } catch (\Exception $e) {
                // Manter o valor original se a data for inválida
            }
        }

        if (!empty($request->data_fim)) {
            try {
                $dataFim = Carbon::createFromFormat('d/m/Y', $request->data_fim)->endOfDay();
                $filtros['data_fim'] = $dataFim->format('Y-m-d');
            } catch (\Exception $e) {
                // Manter o valor original se a data for inválida
            }
        }

        // Se funcionário for selecionado, usar o código
        if (!empty($request->funcionario)) {
            $filtros['COD_PESSOA'] = $request->funcionario;
        }

        // Usar o método personalizado
        $tableData = $this->bilheteRepository->paginateGroupedByPerson($filtros);

        if ($tableData->count()) {
            // Configurar a tabela com os dados já processados
            $tabela = $tableData->columns(array(
                'COD_PESSOA' => 'Código Pessoa',
                'Nome' => 'Funcionario',
                'DataHora' => 'Data',
                'Entradas' => 'Horários de Entrada',
                'Saidas' => 'Horários de Saída',
                'TempoTotal' => 'Tempo Total de Presença'
            ))
                ->modify('Nome', function ($obj) {
                    return $obj->pessoa->funcionario->Nome;
                })
                ->modify('DataHora', function($obj) {
                    return $obj->DataHora->format('d/m/Y');
                })
                ->modify('Entradas', function($obj) {
                    return $obj->EntradasList;
                })
                ->modify('Saidas', function($obj) {
                    return $obj->SaidasList;
                })
                ->sortable(['DataHora', 'COD_PESSOA', 'TempoTotal']);

            $paginacao = $tableData->appends($request->except('page'));
        }

        return view('RH::bilhetes.detalhes', [
            'tabela' => $tabela,
            'paginacao' => $paginacao,
            'filtros' => $request->all(), // Passar os filtros para a view
            'funcionarios' => $funcionarios // Passar a lista de funcionários para o dropdown
        ]);
    }
}