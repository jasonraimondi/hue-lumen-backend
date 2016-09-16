<?php
namespace App;

use Phue\Client;
use Phue\Command\CreateScene;
use Phue\Command\SetGroupState;
use Phue\Command\SetLightState;
use Phue\Command\SetSceneLightState;

class Flipp
{
    const APIKEY = 'vfcRmQVlEUHHsVzyFHkEGTI4DqZVwbzUQzoxYR3X';
    const IPADDR = '10.14.1.146';
    const GROUP1 = 1;

    private $client;

    public function __construct()
    {
        $this->client = new Client(self::IPADDR, self::APIKEY);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function startScene($id)
    {
        return $this->setScene('scene' . $id);
    }

    /**
     * @param $sceneId
     * @return mixed
     */
    private function setScene($sceneId)
    {
        $command = new SetGroupState(self::GROUP1);
        $command->scene($sceneId);
        return $this->client->sendCommand($command);
    }
}
