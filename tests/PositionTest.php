<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TokenGame\Position;

class PositionTest extends TestCase
{
    /** @var Position */
    protected static $positionObject;

    public static function setUpBeforeClass() : void
    {
        self::$positionObject = new Position(2,1);
    }

    public function testCreatingNewPositionObject() : void
    {
        $this->assertInstanceOf('TokenGame\Position', self::$positionObject);
    }

    public function testObtainPositionRowNumber() : void
    {
        $this->assertSame(2, self::$positionObject->rowNumber());
    }

    public function testObtainPositionColumnNumber() : void
    {
        $this->assertSame(1, self::$positionObject->columnNumber());
    }

    public static function tearDownBeforeClass() : void
    {
        self::$positionObject = null;
    }
}