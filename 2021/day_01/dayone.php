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

$file = fopen("one.txt", "r");

while(!feof($file)){
    $currentLine = fgets($file);
    $currentLine = trim($currentLine);

    if(!is_null($previousValue)){
        if($currentLine > $previousValue){
            $increased++;
        }
    }

    $previousValue = $currentLine;
}
echo $increased;
