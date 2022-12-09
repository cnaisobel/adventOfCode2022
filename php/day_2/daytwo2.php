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
            return 1; //rock
        break;
        case 'B':
            return 2; //paper
        break;
        case 'C':
            return 3; //scissors
        break;
    }
}

while(!feof($strategy)){
    $opponentPlay[] = getNumber(fgetc($strategy)); 
    fgetc($strategy);
    $playersPlays[] = fgetc($strategy); 
    fgetc($strategy);
    fgetc($strategy);
}

$count = count($opponentPlay);
$score = 0;

for($x = 0; $x < $count; $x++){

    switch($playersPlays[$x]){
        case 'X': //lose
            $result = 0;

            if($opponentPlay[$x] == 1){
                $points = 3;
            }else{
                $points = $opponentPlay[$x] - 1;
            }

        break;
        case 'Y': //draw
            $result = 3;
            $points = $opponentPlay[$x];

        break;
        case 'Z': //win
            $result = 6;

            if($opponentPlay[$x] == 3){
                $points = 1;
            }else{
                $points = $opponentPlay[$x] + 1;
            }

        break;
    }

    $score = ($score + $result + $points); 
}

echo 'Total overall score for this strategy : ' . $score;

fclose($strategy);