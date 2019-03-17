<?php
declare(strict_types=1);

namespace TokenGame;

final class TurnTheTokenOnBoard
{
    /** @var Player */
    private $player;

    /** @var Position */
    private $tokenPosition;

    public function __construct(Player $player, Position $tokenPositionOnBoard)
    {
        $this->player = $player;
        $this->tokenPosition = $tokenPositionOnBoard;
    }

    public function player() : Player
    {
        return $this->player;
    }

    public function tokenPosition() : Position
    {
        return $this->tokenPosition;
    }
}
