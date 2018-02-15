<?php

function IsPrime($n)
{
	if($n < 2) {
		return 0;
	}
	for($x=2; $x < $n; $x++)
	{
	  if($n % $x ==0)
      {
	   return 0;
	  }
	}

	return 1;
}

$a = IsPrime(3);
if ($a==0) {
	echo 'This is not a Prime Number.....'."\n";
} else {
	echo 'This is a Prime Number..'."\n";
}

// find prime numbers from 1 => 100
$m = 3;
$n = 50;
$primList = [];
for($m; $m < $n; $m++) {
	$primeCheck = IsPrime($m);
	
	if($primeCheck==1) {
		$primList[] = $m;
	}
}

var_dump($primList);


function factorial($n) {
  if ($n === 0) { // our base case
     return 1;
  }
  else {
     return $n * factorial($n-1); // <--calling itself.
  }
}

echo "factorial of 5 is: ". factorial(5). "\n";
echo "</br>";
/**
 * Fibonacci using recursion
 */
function fibonacci($n)
{
    if ($n == 0) {
        return 0;
    }
    if ($n == 1) {
        return 1;
    }
    return fibonacci($n - 1) + fibonacci($n - 2);
}

$number = 12;
echo "fibonacci series is: ";
for($i = 0; $i <= $number; $i++) {
	echo fibonacci($i) . " ";
}

/*
* function gcd()
*
* returns greatest common divisor
* between two numbers
* tested against gmp_gcd()
*/
function gcd($a, $b)
{
    if ($a == 0 || $b == 0)
        return abs( max(abs($a), abs($b)) );
       
    $r = $a % $b;
    return ($r != 0) ?
        gcd($b, $r) :
        abs($b);
}

/*
* function gcd_array()
*
* gets greatest common divisor among
* an array of numbers
*/
function gcd_array($array, $a = 0)
{
    $b = array_pop($array);
    return ($b === null) ?
        (int)$a :
        gcd_array($array, gcd($a, $b));
}


