<html>
    <style>
        body {
        background-color: black;
        color: white;
        }
        @media screen and (prefers-color-scheme: light) {
        body {
            background-color: white;
            color: black;
        }
        }
    </style>
</html>
<?php

$increased = 0;
$previousValue = null;

$totals = array();

$file = file("one.txt");

foreach($file as $key=>$line){
    $totals[$key][] = $file[$key];
    $totals[$key][] = $file[$key + 1];
    $totals[$key][] = $file[$key + 2];
    $totals[$key] = array_sum($totals[$key]);
}

foreach($totals as $total){

    if(!is_null($previousValue)){
        if($total > $previousValue){
            $increased++;
        }
    }
    $previousValue = $total;
}

echo $increased;
