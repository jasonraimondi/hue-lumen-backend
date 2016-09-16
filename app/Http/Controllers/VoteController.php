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

    public function queue($id)
    {
        dispatch(new VoteForScene($id));
    }

    public function show($id)
    {
        $this->flipp->startScene($id);
    }

    public function setup()
    {
        $setup = new FlippSetup();
        return $setup->setUpScenes();
    }
}
