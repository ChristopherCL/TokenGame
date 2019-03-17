<?php
declare(strict_types=1);

namespace TokenGame;

interface PlayingForTime
{
    public function timeLimitOfTheGameHasExpired(int $timeLimitInSeconds);
}
