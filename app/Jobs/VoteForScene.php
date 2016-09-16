<?php

namespace App\Jobs;

class VoteForScene extends Job
{
    private $sceneId;

    /**
     * Create a new job instance.
     *
     * @param $sceneId
     */
    public function __construct($sceneId)
    {
        $this->sceneId = $sceneId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

    }
}
