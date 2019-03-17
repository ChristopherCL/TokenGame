<?php
declare(strict_types=1);

namespace TokenGame;

final class NewBoardState extends Board
{
    /** @var array */
    protected $tokens;

    /** @var int */
    protected $numberOfRows;

    /** @var int */
    protected $numberOfColumns;

    public function __construct(array $tokens, int $numberOfRows, int $numberOfColumns)
    {
        $this->tokens = $tokens;
        $this->numberOfRows = $numberOfRows;
        $this->numberOfColumns = $numberOfColumns;
    }
}