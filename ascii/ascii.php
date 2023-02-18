<?php
    $errorMessage = false;
    $attempts = 1;
    $maxAttempts = 5;
	$limitT = 10;
	$limitS = 10000;

    function validateS($string , $limit)
    {
        global $errorMessage; //tell this function to use global errormessage
        if (($string > $limit) || ($string < 2)) {
            $errorMessage = 'Exceeded String Length. Please ensure 2 until '.$limit.' length characters are entered'. '\n';
            return false;
        }
        $errorMessage = false;
        return true;
    }

    function validateR($string , $limit)
    {
        global $errorMessage; //tell this function to use global errormessage
        if (strlen($string) != $limit) {
            $errorMessage = 'Exceeded String Length. Please ensure '.$limit.' length characters are entered (same with 1st word)'. '\n';
            return false;
        }
        $errorMessage = false;
        return true;
    }

    function validateT($string , $limit)
    {
        global $errorMessage; //tell this function to use global errormessage
        if ($string > $limit) {
            $errorMessage = 'Exceeded String Length. Please ensure no more '. $limit.' characters are entered'. "\n" . strlen($string)  ;
            return false;
        }
        $errorMessage = false;
        return true;
    }

    	$T = readline('please enter how many case: ');
	while (!validateT($T , $limitT) && $attempts < $maxAttempts)
	{
        echo "\n";
        echo '*******************************************';
        echo "\n";
        echo 'Attempts  Left (' . ($maxAttempts - $attempts) . ')';
        echo "\n";
    	$T = readline($errorMessage . '. Please try again; Enter how many case: ');
		
	}


for($i=0; $i<$T; $i++){
    	$S = readline('Input 1st word: ');
	$Slength = strlen($S);
	while (!validateS($Slength , $limitS) && $attempts < $maxAttempts)
	{
        echo "\n";
        echo '*******************************************';
        echo "\n";
        echo 'Attempts  Left (' . ($maxAttempts - $attempts) . ')';
        echo "\n";
    	$S = readline($errorMessage . '. Please try again; Input 1st word: ');
	}

    	$R = readline('Input 2nd word: ');
	while (!validateR($R , $Slength) && $attempts < $maxAttempts)
	{
        echo "\n";
        echo '*******************************************';
        echo "\n";
        echo 'Attempts  Left (' . ($maxAttempts - $attempts) . ')';
        echo "\n";
    	$R = readline($errorMessage . '. Please try again; Input 2nd word: ');
	}


    if ($attempts >= $maxAttempts) {
        echo 'Failed, too many attempts';
    } else {
	$arr1 = str_split($S);
	$arr2 = str_split($R);
	//echo $arr1[0];
	//echo $arr2[0];
$arhas1 = ord($arr1[$Slength-1]) - ord($arr1[$Slength-2]);
$arhas2 = ord($arr2[$Slength-1]) - ord($arr2[$Slength-2]);
$arhas3 = ord($arr2[$Slength-2]) - ord($arr1[$Slength-1]);
$arhas4 = ord($arr1[$Slength-1]) - ord($arr2[$Slength-2]);
$testhas1 = abs($arhas1)-abs($arhas2);
$testhas2 = abs($arhas2)-abs($arhas1);
$testhas3 = abs($arhas3)-abs($arhas4);

	if(($testhas1==0)&&($testhas2==0)&&($testhas3==0))
	{
		echo "Funny";
	}
	else
	{
		echo "Not Funny";
	}    
   	echo "\n";
	echo '*******************************************';
        echo "\n";
    }
    echo "\n";

}
//end i