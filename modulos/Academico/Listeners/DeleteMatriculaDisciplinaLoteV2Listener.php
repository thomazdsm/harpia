<?php

namespace Modulos\Academico\Listeners;

use Moodle;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use Modulos\Academico\Repositories\AlunoRepository;
use Modulos\Integracao\Events\UpdateSincronizacaoEvent;
use Modulos\Integracao\Repositories\AmbienteVirtualRepository;
use Modulos\Academico\Events\DeleteMatriculaDisciplinaLoteEvent;

class DeleteMatriculaDisciplinaLoteV2Listener
{
    protected $alunoRepository;
    protected $ambienteVirtualRepository;

    public function __construct(
        AlunoRepository $alunoRepository,
        AmbienteVirtualRepository $ambienteVirtualRepository
    )
    {
        $this->alunoRepository = $alunoRepository;
        $this->ambienteVirtualRepository = $ambienteVirtualRepository;
    }


    public function handle(DeleteMatriculaDisciplinaLoteEvent $event)
    {
        try {
            $param = [];
            // Reunir os dados para envio em lote
            foreach ($event->getItems() as $matriculaOfertaDisciplina) {
                $enrol = [];

                $enrol['mof_id'] = $matriculaOfertaDisciplina->mof_id;

                $param['data']['enrol'][] = $enrol;
                unset($enrol);
            }

            $ambiente = $this->ambienteVirtualRepository->find($event->getExtra());

            if (!$ambiente) {
                return;
            }

            $ambServico = $ambiente->integracaoV2();

            // url do ambiente
            $param['url'] = $ambiente->amb_url;
            $param['token'] = $ambServico->asr_token;
            $param['functionname'] = $event->getEndpointV2();
            $param['action'] = 'DELETE';

            // TODO verificar formato de resposta do ambiente
            // Processar resposta
            $response = Moodle::send($param);

            $status = 3;

            if (array_key_exists('status', $response)) {
                if ($response['status'] == 'success') {
                    $status = 2;
                }
            }

            // Log individual de cada item
            foreach ($event->getItems() as $item) {
                event(new UpdateSincronizacaoEvent($item, $status, $response['message'], $event->getAction()));
            }
        } catch (ConnectException | ClientException | \Exception $exception) {

            if (env('app.debug')) {
                throw $exception;
            }

            foreach ($event->getItems() as $item) {
                event(new UpdateSincronizacaoEvent($item, 3, get_class($exception), $event->getAction()));
            }

        }
    }
}
