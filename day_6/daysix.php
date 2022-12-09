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
$four = array();
$check = array();

$file = fopen("six.txt", "r");

while(!feof($file)){

    $four[] = fgetc($file);
    $count++;
    if(count($four) == 4){
        $check = array_unique($four);
        
        if(count($check) == 4){
            echo $count;
        }else{
            array_shift($four);
        }
    }
}