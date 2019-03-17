<?php
declare(strict_types=1);

namespace TokenGame;

final class Position
{
    /** @var int */
    private $rowNumber;

    /** @var int */
    private $columnNumber;

    public function __construct(int $rowNumber, int $columnNumber)
    {
        $this->rowNumber = $rowNumber;
        $this->columnNumber = $columnNumber;
    }

    public function rowNumber(): int
    {
        return $this->rowNumber;
    }

    public function columnNumber() : int
    {
        return $this->columnNumber;
    }
}
