<?php

namespace App\Listeners;

use App\Events\NovaSerieEvent;
use App\Mail\NovaSerie;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EnviarEmailNovaSerieCadastrada implements ShouldQueue
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
        //envio de email ao cadastrar serie
        //envio para todos usuários cadastrados na aplicação
        $users = User::all();

        foreach ($users as $i => $user){
            $multi = $i + 1;

            $email = new NovaSerie($event->nomeSerie, $event->qtdTemporadas, $event->qtdEpisodios);
            $email->subject = 'Nova Serie Cadastrada';
            $when = now()->addSecond(8 * $multi);
            Mail::to($user)->later($when, $email);

        }
    }
}
