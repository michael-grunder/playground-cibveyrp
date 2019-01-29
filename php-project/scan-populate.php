<?php

function addLists($obj_r, $kcount, $ecount) {
    for($i = 0; $i < $kcount; $i++) {
        for ($j = 0; $j < $ecount; $j++) {
            $obj_r->rpush("list:$i", "entry:$j");
        }
    }
}

function addSets($obj_r, $kcount, $ecount) {
    for($i = 0; $i < $kcount; $i++) {
        for ($j = 0; $j < $ecount; $j++) {
            $obj_r->sAdd("set:$i", "element:$j");
        }
    }
}

function addStrings($obj_r, $kcount, $ecount) {
    for($i = 0; $i < $kcount; $i++) {
        for ($j = 0; $j < $ecount; $j++) {
            $obj_r->sAdd("string:$i", uniqid());
        }
    }
}

$obj_r = new Redis();
$obj_r->connect('127.0.0.1', 6379);

$arr_types = ['list','string','set'];
foreach ($arr_types as $str_type) {
    if ($str_type == 'list') {
        addLists($obj_r, 10, 10);
    } else if ($str_type == 'string') {
        addSets($obj_r, 10, 10); 
    } else if ($str_type == 'set') {
        addStrings($obj_r, 10, 10);
    }
}
