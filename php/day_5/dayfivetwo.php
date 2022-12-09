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

$stacks = array();
$count = 0;
$index = 1;
$file = fopen("five.txt", "r");

while(!feof($file)){
    //get current character
    $currentCharacter = fgetc($file);
    
    //switch on character
    switch($currentCharacter){
        case "[": 
            $stacks[$index][] = fgetc($file);
            $count++;
        break;
        case "\n": //reset to next line
            $index = 1;
            $count = 0;
        break;
    }

    //increment count
    $count++;

    //if count is 4, reset
    if($count == 4){
        $count = 0;
        $index ++;
    }

    if($currentCharacter == '9'){
        //until the end of the file
        while(!feof($file)){
            $currentLine = fgets($file);
            if(!ctype_space($currentLine)){
                $line[] = $currentLine;
                $key = array_key_last($line);
                $explodedLine = explode(' ', $line[$key]);
                $explodedLine[5] = trim($explodedLine[5]);
                $instructions[] = array("count" => $explodedLine[1], "from" => $explodedLine[3], "to" => $explodedLine[5]);
            }
        }
        break;
    }
}

ksort($stacks);
foreach($stacks as $index =>$stack){
    $stacks[$index] = array_reverse($stack);
}

foreach($instructions as $instruction){
    $temp = array();
    $count = $instruction['count'];
    $from = $instruction['from'];
    $to = $instruction['to'];

    for($x = 0; $x < $count; $x++){
        array_unshift($temp, array_pop($stacks[$from]));
    }
    $stacks[$to] = array_merge($stacks[$to], $temp); 
    
}

foreach($stacks as $index => $stack){
    $key = array_key_last($stack);
    echo $stack[$key];
}
echo '<br>';
