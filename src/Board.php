<?php
declare(strict_types=1);

namespace TokenGame;

class Board
{
    /** @var array */
    protected $tokens = [];

    /** @var int */
    protected $numberOfRows;

    /** @var int */
    protected $numberOfColumns;

    public function __construct(TokensCollection $tokensCollection, int $numberOfRows, int $numberOfColumns)
    {
        if(!$this->numberOfRowsOrColumnsEnteredIsGreaterThanZero($numberOfRows, $numberOfColumns)) {
            throw new \Exception('Number of rows and columns must be greater than zero');
        }

        if(!$this->checkIfAmountOfTokensMatchSizeOfBoard($tokensCollection->getTokens(), $numberOfRows, $numberOfColumns)) {
            throw new \Exception('Inadequate number of tokens in relation to the size of the board');
        }

        $this->numberOfRows = $numberOfRows;
        $this->numberOfColumns = $numberOfColumns;
        $this->tokens = $tokensCollection->getTokens();

        shuffle($this->tokens);

        for($rowNumber = 1; $rowNumber <= $numberOfRows; $rowNumber++) {
            for($columnNumber = 1; $columnNumber <= $numberOfColumns; $columnNumber++) {
                $tokenToObtainPosition = array_shift($this->tokens);
                $tokenWithPosition = $tokenToObtainPosition->setPositionOnBoard(new Position($rowNumber, $columnNumber));
                array_push($this->tokens, $tokenWithPosition);
            }
        }
    }

    public function numberOfRows() : int
    {
        return $this->numberOfRows;
    }

    public function numberOfColumns() : int
    {
        return $this->numberOfColumns;
    }

    public function getTokens() : array
    {
        return $this->tokens;
    }

    private function numberOfRowsOrColumnsEnteredIsGreaterThanZero(int $numberOfRows, int $numberOfColumns) : bool {
        return $numberOfRows > 0 && $numberOfColumns > 0;
    }

    private function checkIfAmountOfTokensMatchSizeOfBoard(array $tokensCollection, int $numberOfRows, int $numberOfColumns) : bool {
        return count($tokensCollection) === $numberOfRows * $numberOfColumns;
    }
}
