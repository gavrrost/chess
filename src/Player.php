<?php

class Player
{
    private $blackFigures;
    private $nextPlayer;
    function __construct($blackFigures)
    {
        $this->blackFigures = $blackFigures;
    }

    public function ownsFigure(Figure $figure)
    {
        return $figure->isBlack() === $this->blackFigures;
    }

    public function setNext(Player $player)
    {
        $this->nextPlayer = $player;
    }

    public function turn(Chess $desk)
    {
        $desk->setCurrentPlayer($this->nextPlayer);
    }
}
