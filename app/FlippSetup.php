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
    const DARK_ORANGE = 3322;
    const LIGHT_ORANGE = 8509;
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
        $this->createScene(0);
        $this->setUpScene0();

        $this->createScene(1);
        $this->setUpScene1();

        $this->createScene(2);
        $this->setUpScene2();

        $this->createScene(3);
        $this->setUpScene3();

        $this->createScene(4);
        $this->setUpScene4();

        $this->createScene(5);
        $this->setUpScene5();

        $this->createScene(6);
        $this->setUpScene6();

        $this->createScene(7);
        $this->setUpScene7();

        $this->createScene(8);
        $this->setUpScene8();

        $this->createScene(10);
        $this->setUpScene10();
    }

    /**
     * @param $sceneId
     */
    private function createScene(int $sceneId)
    {
        $command = new CreateScene(
            'scene' . $sceneId,
            'Scene ' . $sceneId,
            [1,2,3,4,5,6,7,8,9,10,11,12]
        );
        $command->transitionTime(0);
        $command->lights([1,2,3,4,5,6,7,8,9,10,11,12]);
        $this->client->sendCommand($command);
    }

    private function setUpScene10()
    {
        $this->setLightState('scene10', 1, self::WHITE, 0, 0);
        $this->setLightState('scene10', 2, self::WHITE, 0, 0);
        $this->setLightState('scene10', 3, self::WHITE, 0, 0);
        $this->setLightState('scene10', 9, self::WHITE, 0, 0);
        $this->setLightState('scene10', 10, self::WHITE, 0, 0);
        $this->setLightState('scene10', 11, self::WHITE, 0, 0);
        $this->setLightState('scene10', 12, self::WHITE, 0, 0);
        $this->setLightCluster('scene10', self::WHITE, 0, 0);
    }

    private function setUpScene0()
    {
        $this->setLightState('scene0', 1, self::BLUE);
        $this->setLightState('scene0', 2, self::DARK_ORANGE);
        $this->setLightState('scene0', 3, self::LIGHT_ORANGE);
        $this->setLightState('scene0', 9, self::GREEN);
        $this->setLightState('scene0', 10, self::YELLOW);
        $this->setLightState('scene0', 11, self::MAGENTA);
        $this->setLightState('scene0', 12, self::PURPLE);
        $this->setLightCluster('scene0', self::RED);
    }

    private function setUpScene1()
    {
        $this->setLightState('scene1', 1, self::WHITE, 0, 254);
        $this->setLightState('scene1', 2, self::BLUE, 0);
        $this->setLightState('scene1', 3, self::BLUE, 0);
        $this->setLightState('scene1', 9, self::BLUE, 0);
        $this->setLightState('scene1', 10, self::BLUE, 0);
        $this->setLightState('scene1', 11, self::BLUE, 0);
        $this->setLightState('scene1', 12, self::BLUE, 0);
        $this->setLightCluster('scene1', self::BLUE, 0);
    }

    private function setUpScene2()
    {
        $this->setLightState('scene2', 1, self::DARK_ORANGE, 0);
        $this->setLightState('scene2', 2, self::WHITE, 0, 254);
        $this->setLightState('scene2', 3, self::DARK_ORANGE, 0);
        $this->setLightState('scene2', 9, self::DARK_ORANGE, 0);
        $this->setLightState('scene2', 10, self::DARK_ORANGE, 0);
        $this->setLightState('scene2', 11, self::DARK_ORANGE, 0);
        $this->setLightState('scene2', 12, self::DARK_ORANGE, 0);
        $this->setLightCluster('scene2', self::DARK_ORANGE, 0);
    }

    private function setUpScene3()
    {
        $this->setLightState('scene3', 1, self::LIGHT_ORANGE, 0);
        $this->setLightState('scene3', 2, self::LIGHT_ORANGE, 0);
        $this->setLightState('scene3', 3, self::WHITE, 0, 254);
        $this->setLightState('scene3', 9, self::LIGHT_ORANGE, 0);
        $this->setLightState('scene3', 10, self::LIGHT_ORANGE, 0);
        $this->setLightState('scene3', 11, self::LIGHT_ORANGE, 0);
        $this->setLightState('scene3', 12, self::LIGHT_ORANGE, 0);
        $this->setLightCluster('scene3', self::LIGHT_ORANGE, 0);
    }

    private function setUpScene4()
    {
        $this->setLightState('scene4', 1, self::GREEN, 0);
        $this->setLightState('scene4', 2, self::GREEN, 0);
        $this->setLightState('scene4', 3, self::GREEN, 0);
        $this->setLightState('scene4', 9, self::WHITE, 0, 254);
        $this->setLightState('scene4', 10, self::GREEN, 0);
        $this->setLightState('scene4', 11, self::GREEN, 0);
        $this->setLightState('scene4', 12, self::GREEN, 0);
        $this->setLightCluster('scene4', self::GREEN, 0);
    }

    private function setUpScene5()
    {
        $this->setLightState('scene5', 1, self::YELLOW, 0);
        $this->setLightState('scene5', 2, self::YELLOW, 0);
        $this->setLightState('scene5', 3, self::YELLOW, 0);
        $this->setLightState('scene5', 9, self::YELLOW, 0);
        $this->setLightState('scene5', 10, self::WHITE, 0, 254);
        $this->setLightState('scene5', 11, self::YELLOW, 0);
        $this->setLightState('scene5', 12, self::YELLOW, 0);
        $this->setLightCluster('scene5', self::YELLOW, 0);
    }

    private function setUpScene6()
    {
        $this->setLightState('scene6', 1, self::MAGENTA, 0);
        $this->setLightState('scene6', 2, self::MAGENTA, 0);
        $this->setLightState('scene6', 3, self::MAGENTA, 0);
        $this->setLightState('scene6', 9, self::MAGENTA, 0);
        $this->setLightState('scene6', 10, self::MAGENTA, 0);
        $this->setLightState('scene6', 11, self::WHITE, 0, 254);
        $this->setLightState('scene6', 12, self::MAGENTA, 0);
        $this->setLightCluster('scene6', self::MAGENTA, 0);
    }

    private function setUpScene7()
    {
        $this->setLightState('scene7', 1, self::PURPLE, 0);
        $this->setLightState('scene7', 2, self::PURPLE, 0);
        $this->setLightState('scene7', 3, self::PURPLE, 0);
        $this->setLightState('scene7', 9, self::PURPLE, 0);
        $this->setLightState('scene7', 10, self::PURPLE, 0);
        $this->setLightState('scene7', 11, self::PURPLE, 0);
        $this->setLightState('scene7', 12, self::WHITE, 0, 254);
        $this->setLightCluster('scene7', self::PURPLE, 0);
    }

    private function setUpScene8()
    {
        $this->setLightState('scene8', 1, self::RED, 0);
        $this->setLightState('scene8', 2, self::RED, 0);
        $this->setLightState('scene8', 3, self::RED, 0);
        $this->setLightState('scene8', 9, self::RED, 0);
        $this->setLightState('scene8', 10, self::RED, 0);
        $this->setLightState('scene8', 11, self::RED, 0);
        $this->setLightState('scene8', 12, self::RED, 0);
        $this->setLightCluster('scene8', self::WHITE, 0, 254);
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
            return min(254, $brightness * rand(2, 14) / 10);
        }
    }
}