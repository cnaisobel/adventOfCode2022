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
function getInfo($status = true){

    $file = fopen("three.txt", "r");
    $answer = '';

    while(!feof($file)){
        $currentLine = fgets($file);
        $currentLine = trim($currentLine);
        $lines[] = $currentLine;
    }

    if($status){
        $priority = array('0','1');
    }else{
        $priority = array('1','0');
    }

    for($x = 0; $x <= 12; $x++){      
    
        if(count($lines) == 1){
            $answer = $lines[0];
            break;
        }
        
        $zeros = 0;
        $ones = 0;
        $remove = null;
    
        foreach($lines as $line){
    
            $seperateLine = str_split($line, 1);
    
            if($seperateLine[$x] == '1'){
                $ones++;
            }else{
                $zeros++;
            }

        }
    
        if($ones > $zeros){
            $remove = $priority[0];
        }else{
            $remove = $priority[1];
        }
    
        if($ones == $zeros){
            $remove = $priority[0];
        }
    
        foreach($lines as $key=>$line){
    
            $seperateLine = str_split($line, 1);
    
            if($seperateLine[$x] == $remove){
                unset($lines[$key]);
            }
            
        }
    
        $lines = array_values($lines);
    }

    $answer = bindec($answer);

    return $answer;
}

$oxygenRate = getInfo();
$scrubberRate = getInfo(false);

echo 'Oyxgen Generator Rate: ' . $oxygenRate;
echo '<br>';
echo 'C02 scrubber Rate: ' . $scrubberRate;
echo '<br>';

$answer = ($oxygenRate * $scrubberRate);
echo 'Answer: ' . $answer;

