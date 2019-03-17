<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TokenGame\NewBoardState;

class NewBoardStateTest extends TestCase
{
    /** @var NewBoardState */
    protected static $newBoardStateObject;

    public static function setUpBeforeClass() : void
    {
        self::$newBoardStateObject = new NewBoardState([], 3, 4);
    }

    public function testAssertIfBoardReturnsTheArray() : void
    {
        $this->assertIsArray(self::$newBoardStateObject->getTokens());
    }

    public function testObtainBoardNumberOfRows() : void
    {
        $this->assertSame(3, self::$newBoardStateObject->numberOfRows());
    }

    public function testObtainBoardNumberOfColumns() : void
    {
        $this->assertSame(4, self::$newBoardStateObject->numberOfColumns());
    }

    public static function tearDownBeforeClass() : void
    {
        self::$newBoardStateObject = null;
    }
}