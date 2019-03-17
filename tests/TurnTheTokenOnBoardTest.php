<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TokenGame\TurnTheTokenOnBoard;
use TokenGame\Player;
use TokenGame\Position;

class TurnTheTokenOnBoardTest extends TestCase
{
    /** @var TurnTheTokenOnBoard */
    protected static $turnTheTokenOnBoardEvent;

    public static function setUpBeforeClass() : void
    {
        self::$turnTheTokenOnBoardEvent = new TurnTheTokenOnBoard(new Player(), new Position(1, 1));
    }

    public function testCreatingNewTurnTheTokenOnBoardObject() : void
    {
        $this->assertInstanceOf('TokenGame\TurnTheTokenOnBoard', self::$turnTheTokenOnBoardEvent);
    }

    public function testTurnTheTokenOnBoardContainsPlayer() : void
    {
        $this->assertInstanceOf('TokenGame\Player', self::$turnTheTokenOnBoardEvent->player());
    }

    public function testTurnTheTokenOnBoardContainsTokenPosition() : void
    {
        $this->assertInstanceOf('TokenGame\Position', self::$turnTheTokenOnBoardEvent->tokenPosition());
    }

    public static function tearDownBeforeClass() : void
    {
        self::$turnTheTokenOnBoardEvent = null;
    }
}