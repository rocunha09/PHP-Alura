<?php

namespace App\Listeners;

use App\Events\NovaSerieEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogNovaSerieCadastrada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerieEvent  $event
     * @return void
     */
    public function handle(NovaSerieEvent $event)
    {
        //$event->nomeSerie, $event->qtdTemporadas, $event->qtdEpisodios
        \Log::info('Série nova Cadastrada: '. $event->nomeSerie);

    }
}
