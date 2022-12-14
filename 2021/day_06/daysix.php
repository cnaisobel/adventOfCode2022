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
$file = file("six.txt");
$startFish = explode(',', $file[0]);

$days = 256;
$count  = 0;
$fishCounts = array();

for($x = 0; $x <= 8; $x++){
    $fishCounts[$x] = 0;
}

foreach($startFish as $fish){
    $fishCounts[$fish]++;
}

for($x = 0; $x <= ($days - 1); $x++){    

    $oldCount = $fishCounts;

    $fishCounts[8] = $oldCount[0];
    $fishCounts[6] = ($oldCount[7] + $oldCount[0]);
    $fishCounts[7] = $oldCount[8];

    for($i = 0; $i <= 5; $i++){  
        $fishCounts[$i] = $oldCount[$i + 1];
    }

}

foreach($fishCounts as $f){
    $count += $f;
}

echo 'Overall number of Lanternfish after ' . $days . ' days would be '. $count;