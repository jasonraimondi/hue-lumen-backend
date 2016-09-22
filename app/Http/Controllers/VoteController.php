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

    public function alternate()
    {
        for ($i=0; $i < 2; $i++) {
            $this->flipp->startScene('xalternate1');
            sleep(1);
            $this->flipp->startScene('xalternate2');
            sleep(1);
        }
        $this->flipp->startScene('base');
    }

    public function setup()
    {
        $setup = new FlippSetup();
        return $setup->setUpScenes();
    }
}
