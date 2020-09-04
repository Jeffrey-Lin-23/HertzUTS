<?php

session_start();
$number = $_GET['number'];

//unset($_SESSION['shop_cart'][$car_number]);
//array_values($_SESSION['shop_cart']);

array_splice($_SESSION['cart'],$number,1);


$_GET['number'] = array();

echo "<script type='text/javascript'>";
echo "window.location.href='shoppingCart.php'";
echo "</script>";

?>