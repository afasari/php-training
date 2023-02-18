<?php
function isPangram($text) {
$bitset = null;
    foreach (str_split($text) as $c) {
        if ($c >= 'a' && $c <= 'z')
            $bitset |= (1 << (ord($c) - ord('a')));
        else if ($c >= 'A' && $c <= 'Z')
            $bitset |= (1 << (ord($c) - ord('A')));
    }
    return $bitset == 0x3ffffff;
}
 
$test = array(
    "We promptly judged antique ivory buckles for the next prize",
    "We promtply judged antique ivory buckles for the prize"
);
foreach ($test as $str)
    echo "$str : ", isPangram($str) ? 'Pangram' : 'Not Pangram', "\n";
 
   	$S = readline('Enter the sentence: ');
    echo "$S : ", isPangram($S) ? 'Pangram' : 'Not Pangram', "\n";
   	$N = readline('Again: (Yes) or (No) '."\n");
	while (($N == "Yes") || ($N == "Y") || ($N == "YES")|| ($N == "y") || ($N == "yes"))
	{
   	$S = readline('Enter the sentence: ');
    echo "$S : ", isPangram($S) ? 'Pangram' : 'Not Pangram', "\n";
   	$N = readline('Again: (Yes) or (No)');
	}