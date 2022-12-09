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

foreach($info as $id => $i){
    
    $i = trim($i);
    $split = (strlen($i) / 2);
    $chunks = str_split($i, $split);
    
    foreach($chunks as $int => $chunk){
        $chunk = str_split($chunk, 1);
        $seperated[$int] = $chunk;
        var_dump($seperated[$int]);
    }

    $common = array_intersect($seperated[0], $seperated[1]);

    $common = array_values($common);

    $allCommon[] = $common[0];
}

foreach($allCommon as $commonLetter){

    $priority = array_search($commonLetter, $priorities);

    $prioritySum = ($prioritySum + $priority + 1);
}

echo 'The total Priority Sum is : ' . $prioritySum;
