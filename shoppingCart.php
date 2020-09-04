<?php
session_start();
error_reporting(E_ERROR); 
ini_set("display_errors","Off");
?>
<!DOCTYPE html>
<html>
<head>
    <title>shopping cart</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css">
    <script type="text/javascript">
    function Validate(){
        
        <?php 
            $carNum = count($_SESSION['cart']);
            if(empty($_SESSION['cart'])){
                echo "alert(\"Your shopping cart is empty. You should reserve at least one\");";
                echo "window.location.href='index.html';";
                echo "return false;";
            }else{
                for ($i=0;$i<$carNum;$i++)
                {
                    echo "if(document.cartForm.day".$i.".value == ''){";
                    echo "alert('Cannot leave blank on days');";
                    echo "return false;}";
                    
                    echo "if(isNaN(document.cartForm.day".$i.".value)){";
                    echo "alert('please enter number!');";
                    echo "return false;}";
                    
                    echo "if(document.cartForm.day".$i.".value<=0 || document.cartForm.day".$i.".value>30){";
                    echo "alert('The day should within 0 to 30 days!');";
                    echo "return false;}";
                } 
            }

        
        ?>
        
    }

    
</script>
</head>


    
    
<body>
    <table width="100%" height="70" bgcolor="black">
    <td>
             <div style="position:absolute;top: 0px;left: 10px;"><a href="index.html"><img src="image/Logo-01.png" width="180" height="90"></a></div>
            <h1 style="color: white;margin:auto;" align="center">Car Rental Center</h1>
        
    </td>
</table>
<h1 align="center">Car Reservation</h1>
<table align="center">
    <tr>
        <th width="150">Thumbnail</th>
        <th width="150">Vehicle</th>
        <th width="150">Price Per Day</th>
        <th>Rental Days</th>
        <th>Actions</th>
    </tr>
    <form name="cartForm" id="cartForm" method="post" action="info.php" onsubmit="return Validate();">
    <?php
        $i = 0;
        foreach($_SESSION['cart'] as $car){
        echo "<tr align='center'>";
        echo "<td align='center'>".'<img src="image/'.$car[0].".jpg\" width=\"130\" height=\"97.5\"></td>";
        echo "<td align='center'>".$car[1]."</td>";
        echo "<td align='center'>".$car[2]."</td>";
        echo "<td align='center'><input type=\"text\" name=\"day".$i."\" id=\"day".$i."\"/></td>";
        echo "<td align='center'><a href='delete.php?number=".$i."' class='myButton'>Delete</a></td>";
        echo "</tr>";
        $i++;
        }
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td><button type='submit' class='myButton'>Proceeding to Checkout</button></td>";

    ?>
    
    
    </form>
</table>
   
    
</body>
</html>
