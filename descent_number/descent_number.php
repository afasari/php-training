<?php


// Declare Globals
	$DecentNumber = "";
	$Max5s = 0;
	$Max3s = 0;
	$SolutionFound = FALSE;
	// Be Greedy, get as many 5's as you can up front. That will give you a larger number.
	// The Optimal Case would be if (($N MOD 3) == 0) then we have found the quickest way for this $N
	// Get T (first record, the number of tests in the file)
	// Loop thru T numbers in file / array, starting with record (2 -> T+1)
	// In PHP arrays start with [0], so records [1] -> [T])
	// Check for special cases
	
	function TestNumber($N) {	
		global $DecentNumber, $Max5s, $Max3s, $SolutionFound;
		switch ($N) {
		// Too small to start
			Case ($N <= 2):
				$SolutionFound = FALSE;
				$Max5s = 0;
				$Max3s = 0;
				$DecentNumber = "-1";
				break;
	
		// Check for 3 - early success exit

			Case ($N == 3):
				$SolutionFound = TRUE;
				$Max5s = 1;
				$Max3s = 0;
				$DecentNumber = "555";
				break;
	
		// Check for 4 - Fail
	
			Case ($N == 4):
				$SolutionFound = FALSE;
				$Max5s = 0;
				$Max3s = 0;
				$DecentNumber = "-1";
				break;
	
		// Check for Special Success MOD 3 = 0, If this is true, then we found a special case of all 5's.
		
			Case (($N % 3) == 0):
				$SolutionFound = TRUE;
				$Max5s = $N / 3;
				$Max3s = 0;
				$DecentNumber = AssembleString($Max5s, $Max3s);
				break;

			default:
				$SolutionFound = FALSE;
				GeneralCase ($N);
				break;
		}

	}; // End Function TestNumber


function GeneralCase($N) {
	global $DecentNumber, $Max5s, $Max3s, $SolutionFound;
//	If (($N % 3) == 0 ) // Nailed it! (This will succeed 1 out of 3 times)
//		return / break;
//		else
		
		$xxx=round($N/3+1);		//	Limit of 3 chunked "555"s
		for (;$xxx>=0;$xxx--)	{
			// Loop y
			$yyyyy=round($N/5+1);		//	Limit of 5 chunked "33333"s
				for (;$yyyyy>=0;$yyyyy--){
					echo "xxx = " . $xxx . ", yyyyy = " . $yyyyy . "\n";	//	For testing
					if (($xxx * 3) + ($yyyyy * 5) == $N) {
						$SolutionFound = TRUE;
						$Max5s = $xxx;
						$Max3s = $yyyyy;
						$DecentNumber = AssembleString($Max5s, $Max3s);
						return;
					};	// End If
				};	//	End $yyyyy Loop
			};	//	End $xxx Loop
		
		// both x and y loops searched, no answer found
		$DecentNumber = "Fail -1 (General Case Loop Completion \n\n";
		//	return fail;

}

function ShowAnswer($N) {
	global $DecentNumber, $Max5s, $Max3s, $SolutionFound;
	$SolutionFoundAsAString = ($SolutionFound) ? 'Yes' : 'No';
	echo $DecentNumber. "\n";
};

function AssembleString($N5, $N3){
	global $DecentNumber;
	$Fives = "";
	For ($iii=1; $iii<=$N5; $iii++)		{
		$Fives = $Fives . "555" . " ";
	};
	$Threes = "";
	For ($iii=1; $iii<=$N3; $iii++)		{
		$Threes = $Threes . "33333" . " ";
	};
	$DecentNumber = $Fives . $Threes;
	echo "$DecentNumber \n" . "\n";
};

//  Main
//	OpenInputFile;
//	$T = GetFirstRecord; // The first record is the Number of records in the input file
    	$T = readline('Please enter how many case: '); // Use ($i<=$T) for Testing all
for ($i=1;$i<=$T;$i++){
	$N = readline('How Many Digit: ');
	$PotentialDecentNumber = $N;	// Use $iii for Testing all configs
	TestNumber($N);		// Use $iii for Testing all configs
	ShowAnswer($N);		// Use $iii for Testing all configs
};
