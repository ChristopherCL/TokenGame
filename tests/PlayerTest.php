<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TokenGame\Player;

class PlayerTest extends TestCase
{
    /** @var Player */
    protected static $playerObject;

    public static function setUpBeforeClass() : void
    {
        self::$playerObject = new Player();
    }

    public function testCreatingNewPlayerObject() : void
    {
        $this->assertInstanceOf('TokenGame\Player', self::$playerObject);
    }

    public function testTypeOfPlayerId() : void
    {
        $this->assertIsInt(self::$playerObject->getId());
    }

    public static function tearDownBeforeClass() : void
    {
        self::$playerObject = null;
    }
}
