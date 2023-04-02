<?php
function encrypt($password){
    $letters = str_split($password);
    $numbers = array();
    $result="";
    foreach($letters as $letter){
        array_push($numbers, ord($letter));
    }
    $n=0;
    foreach($numbers as $number){
        $number=$number+$n;
        $n=$number;
    }
    for($i=count($numbers)-1;$i>=0;$i--){
        $numbers[$i]=$numbers[$i]+$n;
        $n=$numbers[$i];
    }
    foreach($numbers as $number){
        $result=$result.strval($number);
    }
    return $result;
}