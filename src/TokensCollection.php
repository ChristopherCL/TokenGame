<?php
declare(strict_types=1);

namespace TokenGame;

final class TokensCollection
{
    /** @var array */
    private $tokens = [];

    public function __construct(int $numberOfTokens)
    {
        if($numberOfTokens < 1) {
            throw new \Exception('There must be at least one token in token collection');
        }
        $this->tokens[] = new WinningToken();

        for($i = 1; $i < $numberOfTokens; $i++) {
            $this->tokens[] = new Token();
        }
    }

    public function getTokens() : array
    {
        return $this->tokens;
    }
}
