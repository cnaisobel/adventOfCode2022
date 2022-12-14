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

$fileLines = file('two.txt');

$pos = 0;
$depth = 0; 
$aim = 0;

foreach($fileLines as $line){
    $instruction = explode(" ", $line);

    switch($instruction[0]){
        case 'forward':
            $pos = $pos + (int)$instruction[1];
            $depth = $depth + ($aim * (int)$instruction[1]);
        break;
        case 'down':
            $aim = $aim + (int)$instruction[1];
        break;
        case 'up':
            $aim = $aim - (int)$instruction[1];
        break;
    }
}

$answer = (int)$depth * (int)$pos;

echo 'Total depth is: ' . $depth;
echo '<br>';
echo 'Forward position is: ' . $pos;
echo '<br>';
echo 'Total aim is: ' . $aim;
echo '<br>';
echo 'Answer: ' . $answer;