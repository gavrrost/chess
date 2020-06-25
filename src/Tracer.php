<?php

class Tracer {
    private $desk;
    function __construct(Desk $desk) {
        $this->desk = $desk;
    }

    public function check(Figure $figure, $xFrom, $yFrom, $xTo, $yTo) {
        $moves = $this->getAllMoves($figure, $xFrom, $yFrom);
        return in_array($xTo . $yTo, $moves);
    }

    /**
     * Вычисление всех возможных ходов для фигуры
     */
    private function getAllMoves(Figure $figure, $x, $y) {
        $moves = [];
        // Список ходов на пустые клетки
        $directionsBlank = $figure->getDirectionsBlank();
        foreach ($directionsBlank as $direction) {
            for ($i=1; $i <= $direction->getLength(); $i++) {
                $newX = chr(ord($x) + $direction->getVector()->getX() * $i);
                $newY = $y + $direction->getVector()->getY() * $i;
                if ($this->desk->hasCell($newX, $newY) && $this->desk->isEmpty($newX, $newY)) {
                    $moves[] = $newX . $newY;
                } else {
                    break;
                }
            }
        }
        // Список ходов на клетки с вражескими фигурами
        $directionsBattle = $figure->getDirectionsBattle();
        foreach ($directionsBattle as $direction) {
            for ($i=1; $i <= $direction->getLength(); $i++) {
                $newX = chr(ord($x) + $direction->getVector()->getX() * $i);
                $newY = $y + $direction->getVector()->getY() * $i;
                if (!$this->desk->hasCell($newX, $newY)) {
                    break;
                }
                if (!$this->desk->isEmpty($newX, $newY)) {
                    $cellFigure = $this->desk->getFigure($newX, $newY);
                    if ($cellFigure->isBlack() !== $figure->isBlack()) {
                        $moves[] = $newX . $newY;
                    }
                }
            }
        }
        return $moves;
    }
}
