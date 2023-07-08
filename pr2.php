// Author: Vinit Patel
// Aim : PHP program that uses functions and arrays in PHP.

<?php
function sumArray($arr) 
{
    $sum = 0;
    foreach ($arr as $value) 
    {
        $sum += $value;
    }
    return $sum;
}

$numbers = array(1, 2, 3, 4, 5);
$sum = sumArray($numbers);
echo "The sum of the numbers in array is: " . $sum;
?>