<?php

class King extends Figure {
    public function __toString() {
        return $this->isBlack ? '♚' : '♔';
    }

    public function getDirectionsBlank() {
        return [
            new Move(new Vector( 1, 0), 1),
            new Move(new Vector( 1, 1), 1),
            new Move(new Vector( 0, 1), 1),
            new Move(new Vector(-1, 1), 1),
            new Move(new Vector(-1, 0), 1),
            new Move(new Vector(-1,-1), 1),
            new Move(new Vector( 0,-1), 1),
            new Move(new Vector( 1,-1), 1),
        ];
    }

    public function getDirectionsBattle() {
        return $this->getDirectionsBlank();
    }
}
