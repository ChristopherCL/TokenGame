<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use TokenGame\Position;
use TokenGame\TokensCollection;
use TokenGame\Board;
use TokenGame\Game;
use TokenGame\Player;
use TokenGame\TurnTheTokenOnBoard;

$game = new Game(new Player(), new Board(new TokensCollection(25), 5 ,5));

$game->event(new TurnTheTokenOnBoard($game->getPlayer(), new Position(1,1)));
$game->event(new TurnTheTokenOnBoard($game->getPlayer(), new Position(2,1)));
$game->event(new TurnTheTokenOnBoard($game->getPlayer(), new Position(1,2)));
$game->event(new TurnTheTokenOnBoard($game->getPlayer(), new Position(2,2)));
$game->event(new TurnTheTokenOnBoard($game->getPlayer(), new Position(3,1)));
$game->event(new TurnTheTokenOnBoard($game->getPlayer(), new Position(3,2)));
