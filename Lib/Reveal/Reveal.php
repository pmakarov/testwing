<?php
/**
 * Reveal
 *
 * @package default
 * @author  Paul Makarov
 */

require_once ('DO_Report.php');

class Reveal {

	private $count = 0;
	public $transaction_list;
	public $tenA_list;
	public $thirtyA_list;
	private $big_list;
	//private members for getting data by transaction number
	private $folder;
	private $tenAReveal;
	private $thirtyAReveal;

	public function __construct($file = array()) {

		for ($i = 0; $i < sizeof($file); $i++) {
			$name = $file[$i] -> piin . $file[$i] -> spiin;
			$this -> transaction_list[$name] = $file[$i];
		}
		//$this->transaction_list = $file;
		set_time_limit(480);
		$this -> tenA_list = array();
		$this -> thirtyA_list = array();
		$this -> big_list = array();
		$this->tenAReveal = array();
		$this->thirtyAReveal = array();
	}

	public function parse($folder) {

		$path_to_check = $folder;
		//echo "<pre>";
		//echo "Folder: " . $path_to_check . "\n";
		foreach (glob($path_to_check.DS.'*.{txt}',GLOB_BRACE) as $file) {
			$this -> parseReveal($file);
		}

		//print_r($this->tenA_list);
		//print_r($this->thirtyA_list);

		$this -> big_list = array_merge($this -> thirtyA_list, $this -> tenA_list);
		/*
		 echo "Total in 10a list: " . sizeof($this->tenA_list) . "\n";
		 echo "Total in 30a list: " . sizeof($this->thirtyA_list) . "\n";
		 $not_common = array_diff_assoc($this->tenA_list, $this->thirtyA_list);
		 $not_common2 = array_diff_assoc($this->thirtyA_list, $this->tenA_list);
		 $common = array_intersect_assoc($this->thirtyA_list, $this->tenA_list);
		 $common2 = array_intersect_assoc($this->tenA_list,$this->thirtyA_list);

		 echo "\ns10a diff 30a total:  " . sizeof($not_common). "\n";
		 foreach ($not_common as $key => $value) {
		 echo $value->transaction_id . "\n";
		 }
		 echo "\n30a diff 10a total: " . sizeof($not_common2). "\n";
		 foreach ($not_common2 as $key => $value) {
		 echo $value->transaction_id . "\n";
		 }
		 echo "\n30a common 10a total: " . sizeof($common). "\n";
		 foreach ($common as $key => $value) {
		 echo $value->transaction_id . "\n";
		 }

		 echo "*********************************************************************\n";
		 echo "Total master transactions: " . sizeof($this->transaction_list) . "\n";
		 echo "Total transactions found in combined Reveal reports: " . sizeof($this->big_listt) . "\n";

		 $not_common = array_diff_assoc($this->big_list, $this->transaction_list);
		 $common = array_intersect_assoc($this->big_list, $this->transaction_list);
		 echo "\n";
		 echo sizeof($common) . " Transactions common to both Reveal Transaction List and Master Transaction List \n";
		 foreach ($common as $key => $value) {
		 echo $value->transaction_id . "\n";
		 }

		 $count = 0;
		 $pass = 0;
		 $fail = 0;
		 echo "*******************************************************************************\n";
		 foreach ($this->big_list as $key => $value) {
		 echo "****************************** " . $value->transaction_id . " ************************** \n";
		 $count++;
		 $failed = ($value->fail)? "true" : "false";
		 ($value->fail)? $fail++ : $pass++;
		 echo "Failed : " . $failed . "\n";

		 for($i =0; $i < sizeof($value->errors); $i++) {
		 echo $value->errors[$i]->errorType . "\n";
		 echo "\t". $value->errors[$i]->revealLine . "\n";
		 }
		 echo "*************************************************************************************\n";
		 echo "\n";
		 }

		 echo "count: $count\n";
		 echo "pass: $pass\n";
		 echo "fail: $fail\n";
		 echo "</pre>";
		 */
	}

	public function parseReveal($file) {
		$list = $transaction = array();
		$ficFound = false;
		$ficCount = 0;
		$file_array = file($file);
		$tmp = count($file_array);
		$section = "header";
		$currentTransaction;
		//$report_list = array();

		echo "File: " . basename($file) . "\n";

		//check what reveal report we have 10a, 30a, etc..
		$reveal_file = basename($file, ".txt");
		$report_type = substr($reveal_file, -4);

		echo "**************************** " . $report_type . " **********************\n";
		//Based on report type, supply the appropriate array to store the transaction report data

		switch($report_type) {

			case "010a" :
				//echo " hit 010a in switch.\n";
				$report_list = $this -> tenA_list;
				break;

			case "030a" :
				//echo "hit 030a in switch. \n";
				$report_list = $this -> thirtyA_list;
				break;

			default :
				//echo "WTF?!?\n";
				break;
		}

		for ($i = 0; $i < $tmp; $i++) {

			//** Remove any line that starts with non-printing ASCII chars (new line set)
			if (isset($file_array[$i]) and bin2hex($file_array[$i]) === "1a0d0a") {
				array_splice($file_array, $i, 1);
			}

			//** If we find a "FIC" line, flag true condition so we can grab inerior lines
			if (isset($file_array[$i]) and substr($file_array[$i], 1, 3) === "FIC" and !$ficFound) {
				$ficFound = true;
				continue;
			}

			//** If we are inside a FIC block
			if ($ficFound && isset($file_array[$i])) {

				//** If we hit a new page with a REPORT line
				if ($file_array[$i][0] !== "i" and substr($file_array[$i], 1, 6) !== "REPORT" and substr($file_array[$i], 47, 8) !== "REJECTED" and substr($file_array[$i], 47, 8) !== "ACCEPTED" and substr($file_array[$i], 10, 4) !== "PIIN" and substr($file_array[$i], 15, 3) !== "F S" and substr($file_array[$i], 41, 3) !== "P A" and substr($file_array[$i], 10, 11) !== "...DISCOUNT" and substr($file_array[$i], 6, 5) !== "BATCH" and substr($file_array[$i], 5, 9) !== "...IBOP.." and substr($file_array[$i], 62, 17) !== "...CONTRACTOR...." and substr($file_array[$i], 13, 9) !== "NON CLIN/" and substr($file_array[$i], 7, 8) !== "I   C  C" and substr($file_array[$i], 15, 7) !== "L  F  W" and substr($file_array[$i], 7, 8) !== "N   N  A" and substr($file_array[$i], 79, 5) !== "R P G" and substr($file_array[$i], 11, 4) !== "CLIN" and substr($file_array[$i], 6, 3) !== "REC" and substr($file_array[$i], 7, 4) !== "CLIN" and substr($file_array[$i], 1, 4) !== "LAST" and substr($file_array[$i], 46, 3) !== "ACT") {

					//** If we hit a new FIC, close current line grab
					if (substr($file_array[$i], 1, 3) === "FIC") {
						$ficFound = false;
					} else {//** Else, keep grabbing the lines.

						if (substr($file_array[$i], 1, 3) === "NBT" and preg_match('/[A-Z0-9]{13}[\s]{3}[A-Z0-9]{6}/', substr($file_array[$i], 7, 24))) {
							//** strip whitespace and commented out insert delimeter for wild card searching
							$item = preg_replace('/\s+/', '', substr($file_array[$i], 7, 24));
							//echo "File: " . $item . "\n";
							/*$item = substr_replace($bar, "-", 6, 0);
							 $item = substr_replace($item, "-", 9, 0);
							 $item = substr_replace($item, "-", 11, 0);
							 $item = substr_replace($item, "-", 16, 0);
							 $item = substr_replace($item, "-", 21, 0);*/
							if (!in_array($item, $list, true)) {
								//echo "File: " . $item . "\n";
								$currentTransaction = $item;
								array_push($list, $item);
								$s = new DO_Report();
								$s -> transaction_id = $item;
								$s -> fail = ($report_type == "010a") ? true : false;
								$report_list[$currentTransaction] = $s;
							}
							if (preg_match('/^[^\s](.)+/', substr($file_array[$i], 97))) {//get Errors
								$stripped = preg_replace('/[\x00-\x1f]/', '', substr($file_array[$i], 97));
								//echo "$currentTransaction had an Error: " . $stripped . " on NBT line\n";
								//echo "LINE [".$i."]: " . $file_array[$i] . "\n";
								$blah = new Object();
								$blah -> errorType = $stripped;
								$blah -> revealLine = $file_array[$i] = preg_replace('/[\x00-\x1f]/', '', $file_array[$i]);
								array_push($report_list[$currentTransaction] -> errors, $blah);
							}

						} elseif (preg_match('/[A-Z0-9]{13}[\s]{3}[A-Z0-9]{6}/', substr($file_array[$i], 6, 24))) {
							//** \s+ = strip whitespace and commented out insert delimeter for wild card searching
							$value = preg_replace('/\s+/', '', substr($file_array[$i], 6, 24));
							//echo "File: " . $value . "\n";
							/*$value = substr_replace($foo, "-", 6, 0);
							 $value = substr_replace($value, "-", 9, 0);
							 $value = substr_replace($value, "-", 11, 0);
							 $value = substr_replace($value, "-", 16, 0);
							 $value = substr_replace($value, "-", 21, 0);*/
							if (!in_array($value, $transaction, true)) {
								//echo "File: " . $value . "\n";
								$currentTransaction = $value;
								array_push($transaction, $value);
								$s = new DO_Report();
								$s -> transaction_id = $value;
								$s -> fail = ($report_type == "010a") ? true : false;
								$report_list[$currentTransaction] = $s;

							}
						} elseif (preg_match('/^[^\s](.)+/', substr($file_array[$i], 97))) {//get Errors
							$stripped = preg_replace('/[\x00-\x1f]/', '', substr($file_array[$i], 97));
							//echo "$currentTransaction had an Error: " . $stripped . " -- pushed to $currentTransaction error list \n";
							//echo "LINE [".$i."]: " . $file_array[$i] . "\n";
							$blah = new Object();
							$blah -> errorType = $stripped;
							$blah -> revealLine = $file_array[$i] = preg_replace('/[\x00-\x1f]/', '', $file_array[$i]);
							array_push($report_list[$currentTransaction] -> errors, $blah);
						} else {
							//echo "ELSE: " .$file_array[$i] . "\n";

						}

						//$list[] = $file_array[$i];
					}
				}
			} else {//Catching case in unma030a.txt where the NBTs violate the new FIC segment rule from uptop
				if (!$ficFound && isset($file_array[$i])) {
					if (substr($file_array[$i], 1, 3) === "NBT") {
						$item = preg_replace('/\s+/', '', substr($file_array[$i], 7, 24));
						//echo "File: " . $item . "\n";
						if (!in_array($item, $list, true)) {
							//echo "File: " . $item . "\n";
							$currentTransaction = $item;
							array_push($list, $item);
							$s = new DO_Report();
							$s -> transaction_id = $item;
							$s -> fail = ($report_type == "010a") ? true : false;
							$report_list[$currentTransaction] = $s;
						}
					} elseif (preg_match('/[A-Z0-9]{13}[\s]{3}[A-Z0-9]{6}/', substr($file_array[$i], 6, 24))) {
						$value = preg_replace('/\s+/', '', substr($file_array[$i], 6, 24));
						//echo "File: " . $value . "\n";
						if (!in_array($value, $transaction, true)) {
							//echo "File: " . $value . "\n";
							$currentTransaction = $value;
							array_push($transaction, $value);
							$s = new DO_Report();
							$s -> transaction_id = $value;
							$s -> fail = ($report_type == "010a") ? true : false;
							$report_list[$currentTransaction] = $s;

						}
					}
				}
			}
		}

		if ($report_type === "010a") {
			$this -> tenA_list = $report_list;
		} elseif ($report_type === "030a") {
			$this -> thirtyA_list = $report_list;
		}

	}

	public function getRevealErrors() {
		return $this -> big_list;
	}

	/*
	 * TODO: Find 030A report that has soft rejects and  see if this will result in having merged errors from
	 * both reports.
	 */
	public function array_merge_assoc($array1, $array2) {

		if (sizeof($array1) > sizeof($array2)) {
			echo $size = sizeof($array1);
		} else {
			$a = $array1;
			$array1 = $array2;
			$array2 = $a;

			echo $size = sizeof($array1);
		}

		$keys2 = array_keys($array2);

		for ($i = 0; $i < $size; $i++) {
			//when a key (transaction number) collides, merge the errors array together
			$array1[$keys2[$i]] -> errors = array_merge($array1[$keys2[$i]] -> errors, $array2[$keys2[$i]] -> errors);
		}

		$array1 = array_filter($array1);
		return $array1;
	}

	public function Path($folder) {
		$this -> folder = $folder;
	}
	
	public function get10AReveal() {
		return $this->tenAReveal;
	}
	public function get30AReveal() {
		return $this->thirtyAReveal;
	}
	
	/**
	 * getRevealDataByTransactionid
	 */
	public function getRevealDataByTransactionId($id) {
		$path_to_check = $this -> folder;
		//echo "Got it: $path_to_check\n";
		//echo "Got it: $id\n";
		//mod the transaction name to provide a 3 empty space split betweein PIIN and SPIIN
		$nameMod = substr_replace($id, "   ", 13, 0);
		foreach (glob($path_to_check.DS.'*.{txt}',GLOB_BRACE) as $file) {
			$this -> findInReveal($file, $nameMod);
		}
	}

	/**
	 * findInReveal - f
	 * @param string file - reveal report file
	 * @return void
	 * @author
	 */
	function findInReveal($file, $id) {
		$list = $transaction = array();
		$ficFound = false;
		$ficCount = 0;
		$file_array = file($file);
		$tmp = count($file_array);
		
		$report_list = array();
		//echo "File: " . basename($file) . "\n";

		//check what reveal report we have 10a, 30a, etc..
		$reveal_file = basename($file, ".txt");
		$report_type = substr($reveal_file, -4);

		//echo "**************************** " . $report_type . " **********************\n";
		//Based on report type, supply the appropriate array to store the transaction report data


		for ($i = 0; $i < $tmp; $i++) {

			//** Remove any line that starts with non-printing ASCII chars (new line set)
			if (isset($file_array[$i]) and bin2hex($file_array[$i]) === "1a0d0a") {
				array_splice($file_array, $i, 1);
			}

			
			if(isset($file_array[$i])){
				if (substr($file_array[$i], 1, 3) === "NBT" and preg_match('/' . $id . '/', substr($file_array[$i], 7, 24))) {
					//echo "Header:\n";
					//echo $file_array[$i] = preg_replace('/[\x00-\x1f]/', '', $file_array[$i]) . "\n";
					array_push($report_list, preg_replace('/[\x00-\x1f]/', '', $file_array[$i]));
				} elseif (preg_match('/' . $id . '/', substr($file_array[$i], 6, 24))) {
					if(!$ficFound){
						//echo $file_array[$i-1] = preg_replace('/[\x00-\x1f]/', '', $file_array[$i-1]) . "\n";
						array_push($report_list, preg_replace('/[\x00-\x1f]/', '', $file_array[$i-1]));
					}
					
					$ficFound = true;
					//echo $file_array[$i] = preg_replace('/[\x00-\x1f]/', '', $file_array[$i]) . "\n";
					array_push($report_list, preg_replace('/[\x00-\x1f]/', '', $file_array[$i]));
					
				} elseif (preg_match('/[A-Z0-9]{13}[\s]{3}[A-Z0-9]{6}/', substr($file_array[$i], 6, 24)) && $id !== substr($file_array[$i], 6, 24)) {
					if($ficFound===true) {
							//We hit a new PIIN SPIIN so stop grabbing text by quitting the loop.
						break;
					}
				}
				else {
					if($ficFound===true){
						//echo $file_array[$i] = preg_replace('/[\x00-\x1f]/', '', $file_array[$i]) ."\n";
						array_push($report_list, preg_replace('/[\x00-\x1f]/', '', $file_array[$i]));
					}
				}
			}

		}
		if ($report_type === "010a") {
				$this->tenAReveal = $report_list;
			} elseif ($report_type === "030a") {
				$this->thirtyAReveal = $report_list;
			}
	
	}//end function
}
?>
