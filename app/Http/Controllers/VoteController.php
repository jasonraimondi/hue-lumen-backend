<?php
namespace App\Http\Controllers;

use App\Flipp;

class VoteController extends Controller
{
    private $flipp;

    public function __construct()
    {
        $this->flipp = new Flipp();
    }

    public function show($id)
    {
        return $this->flipp->startScene($id);
    }

    public function setup()
    {
        $this->flipp->setUpScenes();
    }
}
