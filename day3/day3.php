<?php
/*
    37  36  35  34  33  32  31
    38  17  16  15  14  13  30
    39  18   5   4   3  12  29
    40  19   6   1   2  11  28
    41  20   7   8   9  10  27
    42  21  22  23  24  25  26 (26 = 5*5+1)
    43  44  45  46  47  48  49 50
*/

function getBase($value){
    $i = 3;
    $count = 0; 
    while(true){
        if(($i*$i) > $value){
            return array($i-2, $count);
        }
        $i = $i+2;
        $count++;
    }
}


function calcResult($steps){

    $base = getBase($steps);
    $start_base = $base[0];

    $pos = array('x' => $base[1], 'y' => -$base[1]);

    //echo  '<br>Startpos: x: ' . $pos['x'] . '  y: ' . $pos['y'];
    $steps_remaining = $steps - ($start_base*$start_base);

    // Move right one step
    if($steps_remaining > 0){
        $pos['x']++;
        $steps_remaining--;
    }

    //Move up
    for($i = 0; $i < $start_base; $i++){
        if($steps_remaining > 0){
            $pos['y']++;
            $steps_remaining--;
        }
    }

    //Move left
    for($i = 0; $i < ($start_base+1); $i++){
        if($steps_remaining > 0){
            $pos['x']--;
            $steps_remaining--;
        }
    }

    //Move down
    for($i = 0; $i < ($start_base+1); $i++){
        if($steps_remaining > 0){
            $pos['y']--;
            $steps_remaining--;
        }
    }

    //Move right
    for($i = 0; $i < ($start_base+1); $i++){
        if($steps_remaining > 0){
            $pos['x']++;
            $steps_remaining--;
        }
    }

    $distance = abs($pos['y']) + abs( $pos['x'] );
    return $distance; 
}

echo '<h1>Day 3</h1>';
$d = calcResult(1);
echo '<br><br>distance: ' . $d;

$d = calcResult(12);
echo '<br><br>distance: ' . $d;

$d = calcResult(23);
echo '<br><br>distance: ' . $d;

$d = calcResult(1024);
echo '<br><br>distance: ' . $d;

$d = calcResult(361527);
echo '<br><br>distance: ' . $d;