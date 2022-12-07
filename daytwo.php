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

//get info
$strategy = fopen("two.txt", "r");

function getNumber($letter){
    switch($letter){
        case 'A':
        case 'X':
            return 1; //rock
        break;
        case 'B':
        case 'Y':
            return 2; //paper
        break;
        case 'C':
        case 'Z':
            return 3; //scissors
        break;
    }
}

while(!feof($strategy)){
    $opponentPlay[] = getNumber(fgetc($strategy)); 
    fgetc($strategy);
    $playersPlays[] = getNumber(fgetc($strategy)); 
    fgetc($strategy);
    fgetc($strategy);
}

$count = count($opponentPlay);
$score = 0;

for($x = 0; $x < $count; $x++){
    if($opponentPlay[$x] == $playersPlays[$x]){
        $result = 'draw';
    }else{
        if(($opponentPlay[$x] == 1 && $playersPlays[$x] == 2) || ($opponentPlay[$x] == 2 && $playersPlays[$x] == 3) || ($opponentPlay[$x] == 3 && $playersPlays[$x] == 1)){
            $result = 'win';
        }else{
            $result = 'loss';
        }
    }

    switch($result){
        case 'draw':
            $points = 3;
        break;
        case 'win':
            $points = 6;
        break;
        case 'loss':
            $points = 0;
        break;
    }

    $score = ($score + $playersPlays[$x] + $points);
}

echo 'Total overall score for this strategy : ' . $score;



fclose($strategy);