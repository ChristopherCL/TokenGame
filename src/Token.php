<?php
declare(strict_types=1);

namespace TokenGame;

class Token
{
    /** @var Position || null */
    private $position;

    /** @var bool */
    private $turned;

    public function __construct(Position $positionOfTokenOnBoard = null)
    {
        $this->position = $positionOfTokenOnBoard;
        $this->turned = false;
    }

    public function setPositionOnBoard(Position $positionOfTokenOnBoard) : Token
    {
        return new static($positionOfTokenOnBoard);
    }

    public function turn() : self
    {
        if ($this->turned) {
            throw new \Exception('Token has been already turned');
        }

        $token = new static($this->position);
        $token->turned = true;

        return $token;
    }

    public function position()
    {
        return $this->position;
    }
}
