<?php

namespace Modulos\RH\Repositories;

use Illuminate\Support\Facades\DB;
use Modulos\Core\Repository\BaseRepository;
use Modulos\RH\Models\Catraca\Bilhete;
use Uemanet\EloquentTable\TableCollection;
use Carbon\Carbon;

class BilheteRepository extends BaseRepository
{
    public function __construct(Bilhete $bilhete)
    {
        $this->model = $bilhete;
    }

    public function paginate($sort = null, $search = null)
    {
        $result = $this->model->query();

        if (!empty($search)) {
            foreach ($search as $value) {
                switch ($value['type']) {
                    case 'like':
                        $result = $result->where($value['field'], $value['type'], "%{$value['term']}%");
                        break;
                    default:
                        $result = $result->where($value['field'], $value['type'], $value['term']);
                }
            }
        }

        if (!empty($sort)) {
            $result = $result->orderBy($sort['field'], $sort['sort']);
        }

        return $result->paginate(15);
    }

    /**
     * Obtém registros agrupados por pessoa com horários de entrada/saída e tempo total
     *
     * @param array $requestParameters Parâmetros da requisição
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginateGroupedByPerson(array $requestParameters = [])
    {
        // Prepara a query básica para obter registros por data
        $query = Bilhete::query()
            ->select(
                'COD_PESSOA',
                DB::raw('CONVERT(date, DataHora, 104) as Data')
            )
            ->groupBy('COD_PESSOA', DB::raw('CONVERT(date, DataHora, 104)'));

        // Aplicar filtros da requisição
        $searchable = $this->model->searchable();

        // Adicionar filtro por código de pessoa
        if (!empty($requestParameters['COD_PESSOA'])) {
            $query->where('COD_PESSOA', $requestParameters['COD_PESSOA']);
        }

        // Aplicar filtros de data
        if (!empty($requestParameters['data_inicio'])) {
            $dataInicio = $requestParameters['data_inicio'];
            $query->whereRaw('CONVERT(date, DataHora, 104) >= ?', [$dataInicio]);
        }

        if (!empty($requestParameters['data_fim'])) {
            $dataFim = $requestParameters['data_fim'];
            $query->whereRaw('CONVERT(date, DataHora, 104) <= ?', [$dataFim]);
        }

        // Aplicar outros filtros padrão da requisição
        foreach ($requestParameters as $key => $value) {
            if (array_key_exists($key, $searchable) && !empty($value) &&
                !in_array($key, ['COD_PESSOA', 'data_inicio', 'data_fim'])) {
                if ($searchable[$key] === 'like') {
                    $query->where($key, 'like', "%{$value}%");
                } else {
                    $query->where($key, $searchable[$key], $value);
                }
            }
        }

        // Define ordenação
        $sortField = $requestParameters['field'] ?? 'Data';
        $sortDirection = $requestParameters['sort'] ?? 'desc';

        if ($sortField === 'DataHora') {
            $query->orderBy('Data', $sortDirection);
        } elseif ($sortField === 'COD_PESSOA') {
            $query->orderBy('COD_PESSOA', $sortDirection);
        }

        // Obter resultados paginados
        $personDatesPaginated = $query->paginate(15);

        // Processar cada grupo para obter detalhes
        $processedRecords = [];

        foreach ($personDatesPaginated->items() as $item) {
            // Buscar todos os bilhetes desta pessoa neste dia
            $bilhetes = $this->model
                ->where('COD_PESSOA', $item->COD_PESSOA)
                ->whereRaw('CONVERT(date, DataHora, 104)  = ?', [$item->Data])
                ->orderBy('DataHora')
                ->with('pessoa.funcionario')
                ->get();


            if ($bilhetes->isEmpty()) {
                continue;
            }

            // Criar um objeto para representar esta pessoa/dia
            $primeiroBilhete = $bilhetes->first();
            $record = clone $primeiroBilhete;

            // Processar entradas e saídas
            $entries = [];
            $exits = [];
            $totalTime = 0;
            $lastEntryTime = null;

            foreach ($bilhetes as $bilhete) {
                if (intval($bilhete->Tipo) == 10) { // Entrada

                    $entries[] = $bilhete->DataHora->format('H:i:s');
                    $lastEntryTime = $bilhete->DataHora;
                } else if (intval($bilhete->Tipo) == 11 && $lastEntryTime) { // Saída com entrada prévia
                    $exits[] = $bilhete->DataHora->format('H:i:s');
                    // Calcular diferença de tempo
                    $totalTime += $bilhete->DataHora->diffInSeconds($lastEntryTime);
                    $lastEntryTime = null;
                }
            }
            // Adicionar campos personalizados
            $record->EntradasList = empty($entries) ? '-' : implode(', ', $entries);
            $record->SaidasList = empty($exits) ? '-' : implode(', ', $exits);

            // Formatar tempo total
            $hours = floor($totalTime / 3600);
            $minutes = floor(($totalTime % 3600) / 60);
            $seconds = $totalTime % 60;
            $record->TempoTotal = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

            $processedRecords[] = $record;
        }

        // Substituir os itens do paginador com nossa coleção processada
        // Primeiro, converter para a TableCollection específica do seu sistema
        $tableCollection = new TableCollection($processedRecords);

        // Usar reflection para substituir os itens do paginador
        $reflection = new \ReflectionClass($personDatesPaginated);
        $items = $reflection->getProperty('items');
        $items->setAccessible(true);
        $items->setValue($personDatesPaginated, $tableCollection);

        return $personDatesPaginated;
    }
}