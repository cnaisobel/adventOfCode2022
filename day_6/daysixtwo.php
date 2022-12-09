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

$count = 0;
$fourteen = array();
$check = array();

$file = fopen("six.txt", "r");

while(!feof($file)){

    $fourteen[] = fgetc($file);
    $count++;
    if(count($fourteen) == 14){
        $check = array_unique($fourteen);
        
        if(count($check) == 14){
            echo $count;
        }else{
            array_shift($fourteen);
        }
    }
}