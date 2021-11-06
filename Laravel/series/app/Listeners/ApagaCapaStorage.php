<?php

namespace App\Listeners;

use App\Events\SerieApagada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class ApagaCapaStorage implements ShouldQueue
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
     * @param  SerieApagada  $event
     * @return void
     */
    public function handle(SerieApagada $event)
    {
        Storage::delete($event->capa);
    }
}
