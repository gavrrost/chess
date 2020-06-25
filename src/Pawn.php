<?php

class Pawn extends Figure {
    public function __toString() {
        return $this->isBlack ? '♟' : '♙';
    }

    public function getDirectionsBlank() {
        $moves = [
            new Move(new Vector(0, $this->isBlack ? -1 : 1), 1),
        ];
        if (!$this->wasMoved) {
            $moves[] = new Move(new Vector(0, $this->isBlack ? -1 : 1), 2);
        }
        return $moves;
    }

    public function getDirectionsBattle() {
        return [
            new Move(new Vector( 1, $this->isBlack ? -1 : 1), 1),
            new Move(new Vector(-1, $this->isBlack ? -1 : 1), 1),
        ];
    }
}
