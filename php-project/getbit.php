<?php

$obj_r = new Redis();
$obj_r->connect('127.0.0.1', 6379);

// 0111 1111
$obj_r->set('key', "\x7f");

/* Should print: 0 */
echo $obj_r->getBit('key', 0) . "\n";

/* Should print: 1 */
echo $obj_r->getBit('key', 1) . "\n";
