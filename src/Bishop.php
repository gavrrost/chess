<?php

require_once __DIR__ . '/Figure.php';

class Bishop extends Figure {
    public function __toString() {
        return $this->isBlack ? '♝' : '♗';
    }

    public function getDirectionsBlank() {
        return [
            new Move(new Vector( 1, 1), 7),
            new Move(new Vector(-1, 1), 7),
            new Move(new Vector(-1,-1), 7),
            new Move(new Vector( 1,-1), 7),
        ];
    }

    public function getDirectionsBattle() {
        return $this->getDirectionsBlank();
    }
}
