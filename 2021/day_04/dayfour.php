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

$file = file("four.txt");

//var_dump($file);

//get bingo numbers
$bingoNumbers = explode(',', $file[0]);

$boardNumber = 0;

foreach($file as $key=>$line){
    if($key != 0){
        if(!ctype_space($line)){

            preg_match_all('/[0-9]+/', $line, $currentRow);


            foreach($currentRow[0] as $id=>$rNumber){
                $currentRow[$id] = $rNumber;
                $board[$boardNumber]['all'][] = $rNumber;
            }

            $board[$boardNumber]['row'][$rowCount] = $currentRow;

            for($x = 1; $x <= 5; $x++){ // x = column index
                $board[$boardNumber]['column'][$x][] = $currentRow[$x - 1];
            }

            $rowCount++;

        }else{
            $rowCount = 1;
            $boardNumber++;
        }
    }
}

foreach($bingoNumbers as $key=>$number){

    foreach($board as $boardID=>$bingoBoard){

        if(in_array($number, $bingoBoard['all'])){

            $remove = array_search($number, $bingoBoard['all']);
            unset($board[$boardID]['all'][$remove]);

            foreach($bingoBoard['row'] as $rowNumber=>$row){    

                if(in_array($number, $row)){
                    $numberFound = array_search($number, $row);
                    unset($board[$boardID]['row'][$rowNumber][$numberFound]);



                    if(empty($board[$boardID]['row'][$rowNumber])){
                        $winningBoard = $boardID;
                        $direction = 'Row';
                        $winningLine = $rowNumber;
                        $winningNumber = $number;
                        break 3;
                    }

                }

            }

            foreach($bingoBoard['column'] as $columnID=>$column){

                if(in_array($number, $column)){
                    $numberFound = array_search($number, $column);
                    unset($board[$boardID]['column'][$columnID][$numberFound]);

                    if(empty($board[$boardID]['column'][$columnID])){
                        $winningBoard = $boardID;
                        $direction = 'Column';
                        $winningLine = $columnID;
                        $winningNumber = $number;
                        break 3;
                    }

                }

            } 

        }

    }

}

echo 'Winning board: ' . $winningBoard;
echo '<br>';
echo $direction . ' ID : ' . $winningLine;
echo '<br>';
$answer = array_sum($board[$winningBoard]['all']);


echo 'Answer = ' . ($answer * $winningNumber);