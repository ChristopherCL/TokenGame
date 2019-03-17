<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TokenGame\Position;
use TokenGame\TokensCollection;
use TokenGame\Board;
use TokenGame\Game;
use TokenGame\Player;
use TokenGame\TurnTheTokenOnBoard;

class GameTest extends TestCase
{
    /** @var Game */
    protected static $gameInstance;

    public static function setUpBeforeClass() : void
    {
        self::$gameInstance = new Game(new Player(), new Board(new TokensCollection(1), 1 ,1));
    }

    public function testScenarioWhenPlayerWantToTurnTokenWhichIsNotExistOnBoard() : void
    {
        $this->expectException('Exception');

        self::$gameInstance->event(new TurnTheTokenOnBoard(self::$gameInstance->getPlayer(), new Position(2,1)));
    }

    public function testScenarioWhenWrongEventIsPerformedOnTheGame() : void
    {
        $this->expectException('Exception');

        self::$gameInstance->event(new Position(2, 2));
    }

    public function testScenarioWhenForeignPlayerWantPlayTheGame() : void
    {
        $this->expectException('Exception');

        $foreignPlayer = new Player();

        self::$gameInstance->event(new TurnTheTokenOnBoard($foreignPlayer, new Position(1,1)));
    }

    public static function tearDownBeforeClass() : void
    {
        self::$gameInstance = null;
    }
}