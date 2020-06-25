<?php

class Rook extends Figure {
    public function __toString() {
        return $this->isBlack ? '♜' : '♖';
    }

    public function getDirectionsBlank() {
        return [
            new Move(new Vector( 1, 0), 7),
            new Move(new Vector( 0, 1), 7),
            new Move(new Vector(-1, 0), 7),
            new Move(new Vector( 0,-1), 7),
        ];
    }

    public function getDirectionsBattle() {
        return $this->getDirectionsBlank();
    }
}
