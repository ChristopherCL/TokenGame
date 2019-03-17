<?php
declare(strict_types=1);

namespace TokenGame;

final class Game implements PlayingForTime
{
    /** @var int */
    private $id;

    /** @var Player */
    private $player;

    /** @var Board || NewStateBoard */
    private $board;

    /** @var int */
    private $gameStartTime;

    /** @var array */
    private $gameHistoryBasedOnEvents = [];

    public function __construct(Player $player, Board $board)
    {
        $this->player = $player;
        $this->board = $board;
        $this->id = $player->getId();
        $this->gameHistoryBasedOnEvents[] = $this->board;
        $this->gameStartTime = time();
    }

    public function getPlayer() : Player
    {
        return $this->player;
    }

    public function getBoard()
    {
        return $this->board;
    }

    public function event($event) : void
    {
        if($this->timeLimitOfTheGameHasExpired(60)) {
            $this->endTheGame('Game Over - You have exceeded the playing time limit');
        }

        $this->gameHistoryBasedOnEvents[] = $event;

        if ($this->checkIfNumberOfTurnTokenEventsIsGreaterThanFive($this->gameHistoryBasedOnEvents)) {
            $this->endTheGame('Game Over - To many turn token attempts');
        }

        switch (get_class($event)) {
            case TurnTheTokenOnBoard::class:
                if(!$this->checkIfPlayerBelongsToCurrentGame($event->player()->getId(), $this->id)) {
                    throw new \Exception('The given player does not belong to the current game');
                }

                if(!$this->checkIfPositionExistsOnTheBoard(
                    $event->tokenPosition(),
                    $this->board->numberOfRows(),
                    $this->board->numberOfColumns())
                ) {
                    throw new \Exception('The given token position does not exist on the board');
                }

                $newBoardState = [];

                foreach ($this->board->getTokens() as $token) {
                    if ($token->position() == $event->tokenPosition()) {

                        if ($this->checkIfTokenIsTheWinningToken($token)) {
                            $this->endTheGame('Winner - you found the winning token');
                        }
                        $newBoardState[] = $token->turn();
                    } else {
                        $newBoardState[] = $token;
                    }
                }

                $this->board = new NewBoardState($newBoardState, $this->board->numberOfRows(), $this->board->numberOfColumns());
                $this->gameHistoryBasedOnEvents[] = $this->board;

                break;
            default:
                throw new \Exception('Unknown type of event');
        }
    }

    private function checkIfPlayerBelongsToCurrentGame(int $playerId, int $gameId) : bool
    {
        return $playerId === $gameId;
    }

    private function checkIfTokenIsTheWinningToken(Token $token) : bool
    {
        return $token instanceof WinningToken ;
    }

    private function checkIfPositionExistsOnTheBoard(Position $position, int $numberOfRowsOnBoard, int $numberOfColumnsOnBoard) : bool
    {
        return in_array($position->rowNumber(), range(0, $numberOfRowsOnBoard))
            && in_array($position->columnNumber(), range(0, $numberOfColumnsOnBoard));
    }

    private function checkIfNumberOfTurnTokenEventsIsGreaterThanFive(array $gameHistory) : bool
    {
        $numberOfAttempts = 0;

        foreach ($gameHistory as $event) {
            if ($event instanceof TurnTheTokenOnBoard) {
                $numberOfAttempts++;
            }
        }

        return $numberOfAttempts > 5;
    }

    private function endTheGame(string $message) : string
    {
        exit($message);
    }

    public function timeLimitOfTheGameHasExpired(int $timeLimitInSeconds) : bool
    {
        return time() - $this->gameStartTime > $timeLimitInSeconds;
    }

}
