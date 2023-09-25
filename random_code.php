<?php

function code_random($length) {
    $data = '1234567890';
    $string = 'PJ-'.date("Ymd");
    
    for ($i=0; $i < $length ; $i++) { 
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }

    return $string;
}

$kode = code_random(2);

