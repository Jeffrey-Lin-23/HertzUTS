<?php
    // Start Session
    session_start();
    // Close useless warning notificaiton
    error_reporting(E_ERROR); 
    ini_set("display_errors","Off");
?>

<?php
$to = $_POST[email];
$subject = "The Involce of Hertz-UTS";
$message ='<!DOCTYPE html><html><head><title></title></head><body>';
$message .= '<h4>Thanks for renting car from <span style="color:#F00">Hertz-UTS</span>! </h4>';
$message .= '<h4>Your order number is <b>13023484</b></h4>';
$message .= '<h4>The Total is <b>'.$_SESSION['total'].'</b> </h4>';

$message .= '<h4>The detial show as below: </h4>';
for($i=0;$i<count($_SESSION['cart']);$i++){
    $message .='<h5>Car: '.$_SESSION['cart'][$i][1].'</h5>';
    $message .='<h5>Price: '.$_SESSION['cart'][$i][2].'</h5>';
    $message .='<h5>Day: '.$_SESSION['day'][$i].'</h5>';
    $message .='<br>';
    
}


$message .='</body></html>';

$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

mail($to,$subject,$message,$headers);
$_SESSION['cart']=array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="">
<head>
    
    <title>Thank you for booking</title>
</head>

<body>
    <table width="100%" height="70" bgcolor="black">
    <td>
        <div style="position:absolute;top: 0px;left: 10px;"><a href="index.html"><img src="image/Logo-01.png" width="180" height="90"></a></div>
            <h1 style="color: white;margin:auto;"align="center">Car Rental Center</h1>
        
    </td>
    </table>
    <h3 align="center">Your order number is <b>13023484</b>.<br> Please check your email for the invoice.</h3>
    <h3 align="center">Thank you for making reservation with <span style="color:#F00">Hertz-UTS.</span> </h3>
    
</body>
</html>