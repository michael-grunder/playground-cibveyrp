<?php

function minOrMax(&$which, $a, $b) {
    if (rand(1, 2) == 1) {
        $which = "MAX";
        return max($a, $b);
    } else {
        $max = "MIN";
        return min($a, $b);
    }
}

$obj_r = new Redis();
$obj_r->connect('127.0.0.1', 6379);
$obj_r->del('zmessages');

for ($n = 0; $n < 10; $n++) {
    $a = rand(1, 1000);
    $b = rand(1, 1000);

    $ret = minOrMax($which, $a, $b);
    $msg = "$which($a, $b) = $ret";
    $obj_r->zAdd('zmessages', $ret, $msg);
}

foreach ($obj_r->zRange('zmessages', 0, -1, true) as $entry => $score) {
    echo "$entry: $score\n";
}
