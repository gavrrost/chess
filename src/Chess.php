<?php

class Chess
{
    private $desk;
    private $player;
    private $tracer;
    public function __construct()
    {
        $this->desk = new Desk();

        $whitePlayer = new Player(false);
        $blackPlayer = new Player(true);
        $whitePlayer->setNext($blackPlayer);
        $blackPlayer->setNext($whitePlayer);
        $this->player = $whitePlayer;

        $this->tracer = new Tracer($this->desk);
    }

    public function move($move)
    {
        if (!preg_match('/^([a-h])(\d)-([a-h])(\d)$/', $move, $match)) {
            throw new \Exception("Incorrect move");
        }
        $xFrom = $match[1];
        $yFrom = $match[2];
        $xTo   = $match[3];
        $yTo   = $match[4];

        $figure = $this->desk->getFigure($xFrom, $yFrom);
        if (!$this->player->ownsFigure($figure)) {
            throw new \Exception("Incorrect move $move");
        }
        if (!$this->tracer->check($figure, $xFrom, $yFrom, $xTo, $yTo)) {
            throw new \Exception("Incorrect move $move");
        }
        $this->desk->move($xFrom, $yFrom, $xTo, $yTo);
        $this->player->turn($this);
        $figure->move();
    }

    public function dump()
    {
        $this->desk->dump();
    }

    public function setCurrentPlayer(Player $player)
    {
        $this->player = $player;
    }
}
