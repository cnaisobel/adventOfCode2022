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
$info = file('three.txt');

$allCommon = array();
$prioritySum = 0;
$priorities = array_merge(range('a','z'), range('A', 'Z'));

$arrKey = 0;
foreach($info as $i){
    $i = trim($i);
    $comparing[$arrKey][] = $i;

    if(count($comparing[$arrKey]) == 3){
        $arrKey++;
    }
}

foreach($comparing as $c){
    
    foreach($c as $key => $letter){
        $letter = str_split($letter, 1);
        $seperated[$key] = $letter;
    }

    $sharedLetter = array_intersect($seperated[0], $seperated[1], $seperated[2]);
    $sharedLetter = array_values($sharedLetter);

    $commonLetters[] = $sharedLetter[0];
}

foreach($commonLetters as $letter){

    $priority = array_search($letter, $priorities);

    $prioritySum = ($prioritySum + $priority + 1);

}

echo 'The total Priority Sum for the groups is : ' . $prioritySum;

