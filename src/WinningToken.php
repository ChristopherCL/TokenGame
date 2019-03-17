<?php
declare(strict_types=1);

namespace TokenGame;

final class WinningToken extends Token
{
    public function __construct(Position $positionOfTokenOnBoard = null)
    {
        parent::__construct($positionOfTokenOnBoard);
    }
}
