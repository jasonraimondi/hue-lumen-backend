<?php

namespace App\Jobs;

use App\Flipp;

class VoteForScene extends Job
{
    private $sceneId;
    private $flipp;

    /**
     * Create a new job instance.
     *
     * @param $sceneId
     */
    public function __construct($sceneId)
    {
        $this->sceneId = $sceneId;
        $this->flipp = new Flipp();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->flipp->startScene($this->sceneId);
    }
}
