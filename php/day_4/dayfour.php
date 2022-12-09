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


$file = file('four.txt');
$containedSections = 0;
$overlapedSections = 0;

foreach($file as $id => $string){
    $string = trim($string);

    $array = explode(',', $string);

    $rangeOne = range(explode('-', $array[0])[0], (explode('-', $array[0])[1]));
    $rangeTwo = range(explode('-', $array[1])[0], (explode('-', $array[1])[1]));

    $sections[$id] = array($rangeOne, $rangeTwo);
}

foreach($sections as $section){
    //get the numbers the ranges share
    $intersect = array_intersect($section[0], $section[1]);

    //check if sections are overlapping - part 2 
    if(!empty($intersect)){
        $overlapedSections++;
    }

    //check for differences between range and shared numbers - part 1
    $diff1 = array_diff($section[0], $intersect);
    $diff2 = array_diff($section[1], $intersect);

    //if either diff is empty - means they are the same as the intersect array which contains all shared numbers etc idk how to explain this it just works
    if((empty($diff1)) || (empty($diff2))){
        $containedSections++;
    }
}

echo 'Total sections containing another section is ' . $containedSections;
echo '<br>';
echo 'Total overlapped sections is ' . $overlapedSections;