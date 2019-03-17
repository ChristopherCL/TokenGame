<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TokenGame\Board;
use TokenGame\TokensCollection;

class BoardTest extends TestCase
{
    /** @var Board */
    protected static $boardObject;

    public static function setUpBeforeClass() : void
    {
        self::$boardObject = new Board(new TokensCollection(4), 2, 2);
    }

    public function testIfBoardThrowsExceptionWhenWrongNumberOfRowsIsGiven() : void
    {
        $this->expectException('Exception');

        new Board(new TokensCollection(4), 0, 2);
    }

    public function testIfBoardThrowsExceptionWhenWrongNumberOfColumnsIsGiven() : void
    {
        $this->expectException('Exception');

        new Board(new TokensCollection(4), 2, 0);
    }

    public function testIfBoardThrowsExceptionWhenAmountOfTokensDoesNotMatchBoardSize() : void
    {
        $this->expectException('Exception');

        new Board(new TokensCollection(6), 2, 2);
    }

    public function testAssertIfBoardReturnsTheArray() : void
    {
        $this->assertIsArray(self::$boardObject->getTokens());
    }

    public function testObtainBoardNumberOfRows() : void
    {
        $this->assertSame(2, self::$boardObject->numberOfRows());
    }

    public function testObtainBoardNumberOfColumns() : void
    {
        $this->assertSame(2, self::$boardObject->numberOfColumns());
    }

    public static function tearDownBeforeClass() : void
    {
        self::$boardObject = null;
    }
}
