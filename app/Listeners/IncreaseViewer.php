<?php

namespace App\Listeners;
use App\Events\VideoViewer;
use App\Models\Developer;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseViewer
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
     * @param  object  $event
     * @return void
     */
    public function handle(VideoViewer $event)
    {
        $this->updateViewer($event->video);
    }

    public function updateViewer($video)
    {
        $video->viewer += 1;
        $video->save();
    }
}
