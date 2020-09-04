<?php
session_start();
error_reporting(E_ERROR); 
ini_set("display_errors","Off");

$number = $_GET['number'];

$doc = new DOMDocument('1.0', 'utf-8');
$doc->load('cars.xml');
$collection = $doc->documentElement;






$model = $collection->getElementsByTagName('model')->item($number)->nodeValue;


$brand = $collection->getElementsByTagName('brand')->item($number)->nodeValue;

$year =$collection->getElementsByTagName('modelYear')->item($number)->nodeValue;

$price = $collection->getElementsByTagName('pricePerDay')->item($number)->nodeValue;


$carName= $model."-".$brand."-".$year;

if(empty($_SESSION['cart'])){
   
    $arr_temp = array($model,$carName,$price);
    $_SESSION['cart'] = array($arr_temp);
    
}
else{
    $exist = false;
    foreach ($_SESSION['cart'] as $rent){
        if($rent[0] == $model){
            $exist = true;
        }
    }
    if($exist == false){
        $arr_temp = array($model,$carName,$price);
        $_SESSION['cart'][] = $arr_temp;
    }
}

$url = "index.html";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";

?>