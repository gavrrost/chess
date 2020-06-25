<?php
class Move {
    private $vector;
    private $length;
    function __construct(Vector $vector, int $length) {
        $this->vector = $vector;
        $this->length = $length;
    }

    public function getVector() {
        return $this->vector;
    }

    public function getLength() {
        return $this->length;
    }
}
