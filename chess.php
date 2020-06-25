<?php

try {
    foreach (glob('src/*.php') as $file) {
        require_once $file;
    }

    $chess = new Chess();

    $args = $argv;
    array_shift($args);

    foreach ($args as $move) {
        $chess->move($move);
    }

    $chess->dump();
} catch (\Exception $e) {
    echo $e->getMessage() . "\n";
    exit(1);
}
