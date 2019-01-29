<?php

$obj_r = new Redis();
$obj_r->connect('127.0.0.1', 6379);

/* Without enabling Redis::SCAN_RETRY (default condition) */
$it = NULL;
do {
    // Scan for some keys
    $arr_keys = $obj_r->scan($it);

    // Redis may return empty results, so protect against that
    if ($arr_keys !== FALSE) {
        foreach($arr_keys as $str_key) {
            echo "Here is a key: $str_key\n";
        }
    }
} while ($it > 0);
echo "No more keys to scan!\n";

/* With Redis::SCAN_RETRY enabled */
$obj_r->setOption(Redis::OPT_SCAN, Redis::SCAN_RETRY);
$it = NULL;

/* phpredis will retry the SCAN command if empty results are returned from the
   server, so no empty results check is required. */
while ($arr_keys = $obj_r->scan($it)) {
    foreach ($arr_keys as $str_key) {
        echo "Here is a key: $str_key\n";
    }
}

echo "\nNo more keys to scan! \o/\n";
