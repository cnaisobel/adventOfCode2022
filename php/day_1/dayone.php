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
$info = file('one.txt');

$count = 0;
foreach($info as $calorie){
    if(ctype_space($calorie)){
        $count++;
    }else{
        $allElves[$count][] = $calorie;
    }
}

foreach($allElves as $elf){
    $value = 0;
    foreach($elf as $fruit){
        $value = (int)$fruit + $value;
    }
    $totals[] = $value;
}

arsort($totals);
$keys = array_keys($totals);

$highestCalorieCount = $totals[$keys[0]];
$top3Combined = $totals[$keys[0]] + $totals[$keys[1]] + $totals[$keys[2]];

echo 'Highest Calorie Count: ' . $highestCalorieCount;
echo '<br>';
echo 'Top 3 Calorie Counts Combined : ' . $top3Combined;

?>
<script>
info = <?php echo json_encode(isset($info)?$info:array()); ?>;

alert(info);

</script>

