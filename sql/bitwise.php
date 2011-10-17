<?php 

$control = 0;
for ($i = 1; $i <= 10; $i++)
{
	$control ^= 1;

	// Check the number is ODD
	$result = ( is_odd($i) ) ? 'Odd' : 'Even';

	echo $i . " is " . $result . "\n";
}

// 
function is_odd( $number )
{
	return ( $number & 1 ) ? TRUE : FALSE;
}


