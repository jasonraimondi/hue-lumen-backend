<?php
namespace App\Http\Controllers;

use App\Flipp;
use App\Jobs\ExampleJob;
use App\Jobs\VoteForScene;
use Queue;

class VoteController extends Controller
{
    private $flipp;

    public function __construct()
    {
        $this->flipp = new Flipp();
    }

    public function queue($id)
    {
        $this->dispatch(new ExampleJob);
        Queue::push(new VoteForScene($id));
    }

    public function show($id)
    {
        $this->flipp->startScene($id);
    }

    public function setup()
    {
        $this->flipp->setUpScenes();
    }
}
