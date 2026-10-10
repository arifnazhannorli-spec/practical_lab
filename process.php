<?php

$firstkwh = 0;
$secondkwh = 0;
$thirdkwh = 0;
$fourthkwh = 0;
$fifthkwh = 0;

$error_message = '';
$showBill = false;

if (isset($_POST['calculate'])) {
    //echo "The input for the first kWh is ". $_POST['first'] . "<br>";

$firstkwh = $_POST['first'];
$secondkwh = $_POST['second'];
$thirdkwh = $_POST['third'];
$fourthkwh = $_POST['fourth'];
$fifthkwh = $_POST['fifth'];

if ($firstkwh =="") {
    $firstkwh = 0;
}
if ($secondkwh =="") {
    $secondkwh = 0;
}
if ($thirdkwh =="") {
    $thirdkwh = 0;
}
if ($fourthkwh =="") {
    $fourthkwh = 0;
}
if ($fifthkwh =="") {
    $fifthkwh = 0;
}

//if ($firstkwh < 0 || $secondkwh < 0 || $thirdkwh < 0 || $fourthkwh < 0 || $fifthkwh < 0) {
    $error_message = "Please enter a valid number for kWh consumption (0 or more).";
//}

if ($firstkwh > 200 || $secondkwh > 100 || $thirdkwh > 300 || $fourthkwh > 300) {
    $error_message = "Please enter a valid number for kWh consumption within the specified ranges.";
}

if ($firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh == 0) {
    $error_message = "Please enter at least one kWh consumption value greater than 0.";
} 

$charge1 = $firstkwh * 0.218;
$charge2 = $secondkwh * 0.344;
$charge3 = $thirdkwh * 0.516;
$charge4 = $fourthkwh * 0.546;
$charge5 = $fifthkwh * 0.571;

//if ($firstkwh < 200) {
    //$charge1 = $firstkwh * 0.218;
//} else {
   // $charge1 = 200 * 0.218;
//}

//if ($secondkwh < 100) {
    //$charge2 = $secondkwh * 0.344;
//} else {
    //$charge2 = 100 * 0.344;
//}

//if ($thirdkwh < 300) {
    //$charge3 = $thirdkwh * 0.516;
//} else {
 //   $charge3 = 300 * 0.516;
//}

//if ($fourthkwh < 300) {
//    $charge4 = $fourthkwh * 0.546;
//} else {
  //  $charge4 = 300 * 0.546;
$totalkwh = $firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh;
$totalcharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;
if ($totalcharge < 3) {
    $totalcharge = 3;
}

if ($totalcharge > 600) {
    $totalSst = $totalcharge * 1.06;
    $totalCharge = $totalCharge + $totalSst;

    $totalcharge = $totalCharge * 1.06;
}

$showBill = true;
}
?>
