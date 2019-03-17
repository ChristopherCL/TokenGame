<?php
declare(strict_types=1);

namespace TokenGame;

final class Player
{
    /** @var int */
    private $uuid;

    public function __construct()
    {
        $this->uuid = rand(1,100000);
    }

    public function getId() : int
    {
        return $this->uuid;
    }
}
