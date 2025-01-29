<?php

$array = array(50, 51, 52, 53, 54, 55, 56, 57, 58, 59);
$list1 = implode(',', $array);
$odds = array();
$even = array();
foreach ($array as $val) {
    if ($val % 2 == 0) {
        $even[] = $val;
    } else {
        $odds[] = $val;
    }
}
$list2 = implode(',', $even);
$list3 = implode(',', $odds);
echo "orignal array is : " . $list1 . "<br>";
echo " even array is:  " . $list2 . "<br>";
echo "odd array is: " . $list3 . "<br>";

// $p="xyz";
// $q="pqr";
// $p=$q;
// echo $p;
