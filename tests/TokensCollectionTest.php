<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TokenGame\TokensCollection;

class TokensCollectionTest extends TestCase
{
    /** @var TokensCollection */
    protected static $tokensCollectionObject;

    public static function setUpBeforeClass() : void
    {
        self::$tokensCollectionObject = new TokensCollection(4);
    }

    public function testCreatingNewTokensCollectionObject() : void
    {
        $this->assertInstanceOf('TokenGame\TokensCollection', self::$tokensCollectionObject);
    }

    public function testAssertIfTokensCollectionReturnTheArray() : void
    {
        $this->assertIsArray(self::$tokensCollectionObject->getTokens());
    }

    public function testIfTokensCollectionThrowsExceptionWhenWrongNumberOfTokensGiven() : void
    {
        $this->expectException('Exception');

        new TokensCollection(0);
    }

    public function testIfArrayOfTokenCollectionHasAppropriateNumberOfTokens() : void
    {
        $this->assertSame(4, count(self::$tokensCollectionObject->getTokens()));
    }

    public static function tearDownBeforeClass() : void
    {
        self::$tokensCollectionObject = null;
    }
}