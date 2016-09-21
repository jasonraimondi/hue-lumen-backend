<?php
namespace App\Http\Controllers;

use App\Flipp;
use App\FlippSetup;
use App\Jobs\VoteForScene;

class VoteController extends Controller
{
    private $flipp;

    public function __construct()
    {
        $this->flipp = new Flipp();
    }

    public function queue($sceneName)
    {
        dispatch(new VoteForScene($sceneName));
    }

    public function show($sceneName)
    {
        $this->flipp->startScene($sceneName);
    }

    public function setup()
    {
        $setup = new FlippSetup();
        return $setup->setUpScenes();
    }
}
