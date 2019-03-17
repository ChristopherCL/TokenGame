<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TokenGame\Token;

class TokenTest extends TestCase
{
    /** @var Token */
    protected static $tokenObject;

    public static function setUpBeforeClass() : void
    {
        self::$tokenObject = new Token();
    }

    public function testCreatingNewTokenObject() : void
    {
        $this->assertInstanceOf('TokenGame\Token', self::$tokenObject);
    }

    public function testInstanceOfTurnedToken() : void
    {
        $this->assertInstanceOf('TokenGame\Token', self::$tokenObject->turn());
    }

    public function testThatTokenCanNotBeTurnedTwice() : void
    {
        $this->expectException('Exception');

        $token = new Token();
        $turnedToken = $token->turn();
        $turnedToken->turn();
    }

    public static function tearDownBeforeClass() : void
    {
        self::$tokenObject = null;
    }
}