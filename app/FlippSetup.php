<?php
namespace App;

use Phue\Client;
use Phue\Command\CreateScene;
use Phue\Command\SetSceneLightState;

class FlippSetup
{
    const APIKEY = 'vfcRmQVlEUHHsVzyFHkEGTI4DqZVwbzUQzoxYR3X';
    const IPADDR = '10.14.1.146';

    const GROUP1 = 1;

    const SCENE0 = 'z2SwvdwPALePP3E';
    const SCENE1 = 'MMjbbmcCumOjNZb';

    const ONE_SECOND = 1;

    const BRIGHTNESS_DIM = 100;

    const MAX_SATURATION = 254;

    const WHITE = 34128;
    const BLUE = 47125;
    const ORANGE = 3322;
    const PEACH = 8509;
    const GREEN = 25653;
    const YELLOW = 20719;
    const MAGENTA = 60290;
    const PURPLE = 50356;
    const RED = 65527;

    private $client;

    public function __construct()
    {
        $this->client = new Client(self::IPADDR, self::APIKEY);
    }

    public function setUpScenes()
    {
        $this->createScene('base');
        $this->setUpBaseScene();

        $this->createScene('blue');
        $this->setUpBlueScene();

        $this->createScene('yellow');
        $this->setUpYellowScene();

        $this->createScene('magenta');
        $this->setUpMagentaScene();

        $this->createScene('orange');
        $this->setUpOrangeScene();

        $this->createScene('violet');
        $this->setUpVioletScene();

        $this->createScene('green');
        $this->setUpGreenScene();

        $this->createScene('lightOrange');
        $this->setUpLightOrangeScene();

        $this->createScene('red');
        $this->setUpRedScene();
    }

    /**
     * @param string $sceneName
     * @internal param $sceneId
     */
    private function createScene(string $sceneName)
    {

        $command = new CreateScene(
            $sceneName,
            $sceneName,
            [1,2,3,4,5,6,7,8,9,10,11,12]
        );
        $command->transitionTime(0);
        $command->lights([1,2,3,4,5,6,7,8,9,10,11,12]);
        $this->client->sendCommand($command);
    }

    private function setUpBaseScene()
    {
        $this->setLightState('base', 1, self::PEACH);
        $this->setLightState('base', 2, self::BLUE);
        $this->setLightState('base', 3, self::MAGENTA);
        $this->setLightState('base', 9, self::ORANGE);
        $this->setLightState('base', 10, self::PURPLE);
        $this->setLightState('base', 11, self::GREEN);
        $this->setLightState('base', 12, self::YELLOW);
        $this->setLightCluster('base', self::RED);
    }

    private function setUpBlueScene()
    {
        $this->setLightState('blue', 2, self::WHITE, 0, 254);
        $this->setLightState('blue', 1, self::BLUE, 0);
        $this->setLightState('blue', 3, self::BLUE, 0);
        $this->setLightState('blue', 9, self::BLUE, 0);
        $this->setLightState('blue', 10, self::BLUE, 0);
        $this->setLightState('blue', 11, self::BLUE, 0);
        $this->setLightState('blue', 12, self::BLUE, 0);
        $this->setLightCluster('blue', self::BLUE, 0);
    }

    private function setUpYellowScene()
    {
        $this->setLightState('yellow', 1, self::YELLOW, 0);
        $this->setLightState('yellow', 2, self::YELLOW, 0);
        $this->setLightState('yellow', 3, self::YELLOW, 0);
        $this->setLightState('yellow', 9, self::YELLOW, 0);
        $this->setLightState('yellow', 10, self::YELLOW, 0);
        $this->setLightState('yellow', 11, self::YELLOW, 0);
        $this->setLightState('yellow', 12, self::WHITE, 0, 254);
        $this->setLightCluster('yellow', self::YELLOW, 0);
    }

    private function setUpMagentaScene()
    {
        $this->setLightState('magenta', 1, self::MAGENTA, 0);
        $this->setLightState('magenta', 2, self::MAGENTA, 0);
        $this->setLightState('magenta', 3, self::WHITE, 0, 254);
        $this->setLightState('magenta', 9, self::MAGENTA, 0);
        $this->setLightState('magenta', 10, self::MAGENTA, 0);
        $this->setLightState('magenta', 11, self::MAGENTA, 0);
        $this->setLightState('magenta', 12, self::MAGENTA, 0);
        $this->setLightCluster('magenta', self::MAGENTA, 0);
    }

    private function setUpOrangeScene()
    {
        $this->setLightState('orange', 1, self::ORANGE, 0);
        $this->setLightState('orange', 2, self::ORANGE, 0);
        $this->setLightState('orange', 3, self::ORANGE, 0);
        $this->setLightState('orange', 9, self::WHITE, 0, 254);
        $this->setLightState('orange', 10, self::ORANGE, 0);
        $this->setLightState('orange', 11, self::ORANGE, 0);
        $this->setLightState('orange', 12, self::ORANGE, 0);
        $this->setLightCluster('orange', self::ORANGE, 0);
    }

    private function setUpVioletScene()
    {
        $this->setLightState('violet', 1, self::PURPLE, 0);
        $this->setLightState('violet', 2, self::PURPLE, 0);
        $this->setLightState('violet', 3, self::PURPLE, 0);
        $this->setLightState('violet', 9, self::PURPLE, 0);
        $this->setLightState('violet', 10, self::WHITE, 0, 254);
        $this->setLightState('violet', 11, self::PURPLE, 0);
        $this->setLightState('violet', 12, self::PURPLE, 0);
        $this->setLightCluster('violet', self::PURPLE, 0);
    }

    private function setUpGreenScene()
    {
        $this->setLightState('green', 1, self::GREEN, 0);
        $this->setLightState('green', 2, self::GREEN, 0);
        $this->setLightState('green', 3, self::GREEN, 0);
        $this->setLightState('green', 9, self::GREEN, 0);
        $this->setLightState('green', 10, self::GREEN, 0);
        $this->setLightState('green', 11, self::WHITE, 0, 254);
        $this->setLightState('green', 12, self::GREEN, 0);
        $this->setLightCluster('green', self::GREEN, 0);
    }

    private function setUpLightOrangeScene()
    {
        $this->setLightState('lightOrange', 1, self::WHITE, 0, 254);
        $this->setLightState('lightOrange', 2, self::PEACH, 0);
        $this->setLightState('lightOrange', 3, self::PEACH, 0);
        $this->setLightState('lightOrange', 9, self::PEACH, 0);
        $this->setLightState('lightOrange', 10, self::PEACH, 0);
        $this->setLightState('lightOrange', 11, self::PEACH, 0);
        $this->setLightState('lightOrange', 12, self::PEACH, 0);
        $this->setLightCluster('lightOrange', self::PEACH, 0);
    }

    private function setUpRedScene()
    {
        $this->setLightState('red', 3, self::RED, 0);
        $this->setLightState('red', 9, self::RED, 0);

        $this->setLightState('red', 10, self::RED, 0);
        $this->setLightState('red', 12, self::RED, 0);

        $this->setLightState('red', 2, self::RED, 0);
        $this->setLightState('red', 11, self::RED, 0);

        $this->setLightState('red', 1, self::RED, 0);
        $this->setLightCluster('red', self::RED, 0, 254);
    }

    /**
     * @param string $scene
     * @param int $lightNumber
     * @param int $hue
     * @param int $transitionTime
     * @param int $brightness
     * @return SetLightState
     */
    private function setLightState(
        string $scene,
        int $lightNumber,
        int $hue,
        int $transitionTime = self::ONE_SECOND,
        int $brightness = self::BRIGHTNESS_DIM
    ) {
        $command = new SetSceneLightState($scene, $lightNumber);

        $command->on(true)
            ->brightness($brightness)
            ->hue($hue)
            ->saturation(self::MAX_SATURATION)
            ->transitionTime($transitionTime);

        $this->client->sendCommand($command);
    }

    /**
     * @param string $scene
     * @param int $hue
     * @param int $transitionTime
     * @param int $brightness
     */
    private function setLightCluster(
        string $scene,
        int $hue,
        int $transitionTime = self::ONE_SECOND,
        int $brightness = self::BRIGHTNESS_DIM
    )
    {
        $this->setLightState($scene, 4, $hue, $transitionTime, $this->getBrightness($brightness));
        $this->setLightState($scene, 5, $hue, $transitionTime, $this->getBrightness($brightness));
        $this->setLightState($scene, 6, $hue, $transitionTime, $this->getBrightness($brightness));
        $this->setLightState($scene, 7, $hue, $transitionTime, $this->getBrightness($brightness));
        $this->setLightState($scene, 8, $hue, $transitionTime, $this->getBrightness($brightness));
    }

    /**
     * @param int $brightness
     * @param bool $notRandom
     * @return int
     */
    private function getBrightness(int $brightness, bool $notRandom = false)
    {
        $brightness = abs($brightness);

        if ($notRandom) {
            return min(254, $brightness);
        } else {
            return min(254, $brightness * rand(7, 14) / 10);
        }
    }
}