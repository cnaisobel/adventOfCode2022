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

$file = fopen("three.txt", "r");

$totalones[1] = 0;
$totalzeros[1] = 0;
$index = 1;

while(!feof($file)){
    //get current character
    $currentCharacter = fgetc($file);

    switch($currentCharacter){
        case '0':
            $totalzeros[$index]++;
            if($index < 12){
                $index++;
            }
        break;
        case '1':
            $totalones[$index]++;
            if($index < 12){
                $index++;
            }
        break;
        default:
            $index = 1;
        break;
    }

    if(!isset($totalzeros[$index]) && !ctype_space($currentCharacter)){
        $totalzeros[$index] = 0;
        $totalones[$index] = 0;
    }
}


$gamma = '';
$epsilon = '';

for($i = 1; $i <= count($totalones); $i++){
    if($totalones[$i] > $totalzeros[$i]){
        $gamma .= 1;
        $epsilon .= 0;
    }else{
        $gamma .= 0;
        $epsilon .= 1;
    }
}

$gamma = bindec($gamma);
$epsilon = bindec($epsilon);

echo 'Gamma rate: ' . $gamma;
echo '<br>';
echo 'Epsilon rate: ' . $epsilon;
echo '<br>';

$answer = ($gamma * $epsilon);
echo 'Answer: ' . $answer;