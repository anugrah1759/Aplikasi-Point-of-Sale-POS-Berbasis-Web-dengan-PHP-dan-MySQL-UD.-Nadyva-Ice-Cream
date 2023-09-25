<?php

function kode_pembelian($length) {
    $data = '1234567890';
    $string = 'PB-'.date("Ymd");
    
    for ($i=0; $i < $length ; $i++) { 
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }

    return $string;
}

$kodePB = kode_pembelian(2);