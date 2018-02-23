<?php
 
if( isset( $_POST['voice'] ) )
{
	$number_1 = $_POST['num1'];
	$number_2 = $_POST['num2'];
    switch( $_POST['voice'] )
    {
        case 'plus':
        	$sum = $number_1 + $number_2;
            echo $sum;
            break;
        case 'minus':
        	$min = $number_1 - $number_2;
            echo $min;
            break;
    }
}
?>