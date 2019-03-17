<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TokenGame\WinningToken;

class WinningTokenTest extends TestCase
{
    /** @var WinningToken */
    protected static $winningTokenObject;

    public static function setUpBeforeClass() : void
    {
        self::$winningTokenObject = new WinningToken();
    }

    public function testCreatingNewWinningTokenObject() : void
    {
        $this->assertInstanceOf('TokenGame\WinningToken', self::$winningTokenObject);
    }

    public function testInstanceOfTurnedWinningToken() : void
    {
        $this->assertInstanceOf('TokenGame\WinningToken', self::$winningTokenObject->turn());
    }

    public function testThatWinningTokenCanNotBeTurnedTwice() : void
    {
        $this->expectException('Exception');

        $winningToken = new WinningToken();
        $turnedWinningToken = $winningToken->turn();
        $turnedWinningToken->turn();
    }

    public static function tearDownBeforeClass() : void
    {
        self::$winningTokenObject = null;
    }
}