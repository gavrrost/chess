<?php

abstract class Figure {
    protected $isBlack;

    protected $wasMoved = false;

    public function __construct($isBlack) {
        $this->isBlack = $isBlack;
    }

    /** @noinspection PhpToStringReturnInspection */
    public function __toString() {
        throw new \Exception("Not implemented");
    }

    public function isBlack()
    {
        return $this->isBlack;
    }

    abstract public function getDirectionsBlank();

    abstract public function getDirectionsBattle();

    public function move() {
        $this->wasMoved = true;
    }
}
