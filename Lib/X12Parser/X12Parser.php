<?php
 /**
  * X12 Parse
  *
  * @package default
  * @author  Paul Makarov
  */
  
require_once('DO_Transaction.php');
 
class X12Parser {
	
	private $count = 0;
	private $transaction_list;
	
	public function __construct($file = array()) {
	   	// parent::__construct($collection, $settings);
	   	// $this->settings = array_merge($this->__defaults, $settings);
	   	//echo "X12Parser Constructor <br/>";
	   	$this->transaction_list =  array();
		set_time_limit(480);
	}
	
	public function parse($folder) {
		$path_to_check = $folder;
			echo "<pre>";
			
			//echo "looking in folder: " . $path_to_check."\n";
			$xml_count = 0;
			$udf_count = 0;
			$x12_count = 0;
			
			/**
			 * Parse x12 data -
			 * 1. Do basic checksums on file counts while building the x12 
			 * 	  master transaction list by looping over x12/edi, xml, and udf
			 * 
			 * 2. Loop over zip file again, first looking for the transaction 
			 *    number in xml, then udf, and finally parsing the reveal text files.
			 */
			
			foreach(glob($path_to_check.DS.'*.{edi,udf,xml,x12}',GLOB_BRACE) as $file) {
				$file_parts = pathinfo($file);
				switch($file_parts['extension']) {
					case "xml":
						$xml_count++;
						break;
						
					case "edi":
					case "x12":
						$this->parseX12($file, $this->transaction_list);
						$x12_count++;
						break;
						
					case "udf":
						$udf_count++;
						break;
						
					default:		
				}
			}
			
			//$this->transaction_list = array_unique($this->transaction_list);
			echo "*********END OF FIRST*************************\n";
			echo "************************************************\n\n";
			
			echo "x12 count: " . $x12_count . "\n";
			echo "XML count: " . $xml_count . "\n";
			echo "UDF count: " . $udf_count . "\n";
			echo "Total unique transaction count: " . count($this->transaction_list) . "\n\n";
			
			echo "*********BEGIN FILE SCRUB***********************\n";
			
			//Find in UDF
			$cnt = count($this->transaction_list);
			$pattern = "";
			for( $i =0; $i < $cnt; $i++) {
				//echo "looking in folder: " . $path_to_check.DS . " for transaction#: " . $this->transaction_list[$i]->piin . $this->transaction_list[$i]->spiin. "<br/>";
				foreach(glob($path_to_check.DS.'*.{udf}', GLOB_BRACE) as $filename) {
				  foreach(file($filename) as $fli=>$fl) {
				  	$p = $this->transaction_list[$i]->piin;
					$a = substr($p,0,6);
					$b = substr($p,6,2);
					$c = substr($p,8,1);
					$d = substr($p,9,4);
					//$d = substr_replace(substr($p,9,4), '(.)',0,1);
					$e = substr($p,13);
					$f = $this->transaction_list[$i]->spiin;
					$pfill = '.{0,4}';
					$pattern = $a . '-*' . $b . '-*' . $c . '-*' . $d . '-*'. $e .'-*'. $pfill.$f;
				    if(preg_match_all( '/'.$pattern.'/', $fl, $matches)) {
						$file_parts = pathinfo($filename);
						$this->transaction_list[$i]->udf = basename($filename);
						break;
				    }
				  }
				}
			}

			//Find in XML
			for( $i =0; $i < $cnt; $i++) {
				foreach(glob($path_to_check.DS.'*.{xml}', GLOB_BRACE) as $filename) {
					
					$p = $this->transaction_list[$i]->piin;
					$a = substr($p,0,6);
					$b = substr($p,6,2);
					$c = substr($p,8,1);
					$d = substr($p,9,4);;
					$e = substr($p,13);
					$f = $this->transaction_list[$i]->spiin;
					$pattern = $a . '-*' . $b . '-*' . $c . '-*' . $d . '-*'. $e .'-*'.$f;	
				  
					// load the document
					$xml = simplexml_load_file($filename);
					$root =  $xml->getName();
					$piin= "";
					$spiin = "";
					switch($root) {
						case "DocumentChain":
							$AwardBasicNumber = $xml->xpath('/DocumentChain/ProcurementDocument/Document/Award/AwardDetail/AwardBasicNumber');
							$AwardDoNumber = $xml->xpath('/DocumentChain/ProcurementDocument/Document/Award/AwardDetail/AwardDoNumber');
							$AwardModNumber = $xml->xpath('/DocumentChain/ProcurementDocument/Document/Award/AwardDetail/AwardModNumber');
							$piinspiin = $AwardBasicNumber[0][0] . $AwardDoNumber[0][0] . $AwardModNumber[0][0];
							
						    if(preg_match( '/'.$pattern.'/', $piinspiin, $matches)) {
								$file_parts = pathinfo($filename);
								//print_r($matches);
								$this->transaction_list[$i]->xml = basename($filename);
						    }
							break;
							
						case "ZRR_EDI860_MOCAS":
							$PO_NUMBER = $xml->xpath('/ZRR_EDI860_MOCAS/IDOC/Z1RR_EDI860_BCH/BCH03_PO_NUMBER');
							$RELEASE_NO = '';
							if($xml->xpath('/ZRR_EDI860_MOCAS/IDOC/Z1RR_EDI860_BCH/BCH04_RELEASE_NO') ){
								$tmp =  $xml->xpath('/ZRR_EDI860_MOCAS/IDOC/Z1RR_EDI860_BCH/BCH04_RELEASE_NO');
								$RELEASE_NO = $tmp[0];
							}
							
							$SEQ_NO = $xml->xpath('/ZRR_EDI860_MOCAS/IDOC/Z1RR_EDI860_BCH/BCH05_SEQ_NO');
							$piinspiin = $PO_NUMBER[0][0] . $RELEASE_NO . $SEQ_NO[0][0];
							 if(preg_match( '/'.$pattern.'/', $piinspiin, $matches)) {
								$file_parts = pathinfo($filename);
								//print_r($matches);
								$this->transaction_list[$i]->xml = basename($filename);
						    }
							break;
							
						case "Document":
							$AwardBasicNumber = $xml->xpath('/Document/Award/AwardDetail/AwardBasicNumber');
							$AwardDoNumber = $xml->xpath('/Document/Award/AwardDetail/AwardDoNumber');
							$piinspiin = $AwardBasicNumber[0][0] . $AwardDoNumber[0][0];
							 if(preg_match( '/'.$pattern.'/', $piinspiin, $matches)) {
								$file_parts = pathinfo($filename);
								//print_r($matches);
								$this->transaction_list[$i]->xml = basename($filename);
						    }
							break;
						
						//TODO: Build PDS PIIN/SPIIN case
							
						default:
							die("Do not recognize XML transaction root node [ $root ] \n Total System Failure!");
							break;
							
					}
					
				}
			}
			
			//print_r($this->transaction_list);
		echo "</pre>";
	}
	
	public function getTransactions() {
		return $this->transaction_list;
	}
	public function getTotal(){
		return $this->count;
	}
	
	private function parseX12($file, &$transaction_list) {
		$line = file($file);
		$delimiter = substr($line[0], 3,1);
				$foo = strrpos($line[0], $delimiter);
				$comp_separator = substr($line[0], $foo+1, 1);
				$endLine = substr($line[0], 105, 1);
				//$line = explode($endLine,$line[0]);
				/*
				echo "***************************************************************\n";
				echo "*\tFile: " . basename($file) . "\n";
				echo "*\tSegment Separator [Delimiter]: " . $delimiter. "\n";
				echo "*\tComponent (Sub) Element Separator [Transaction Separator]: " . bin2hex($comp_separator) . "\n";
				echo "*\tSegment Terminator [End Line]: " . bin2hex(substr($line[0], 105, 1)) . "\n";
				echo "***************************************************************\n";
				*/
				
				$ST = explode($delimiter, $line[2]);
				$edi_type = $ST[1];
				$transaction_number = "";
				$PIIN = "";
				$SPIIN = "";
				if($edi_type === "860") {
					
					$BCH = explode($delimiter, $line[3]);
					$marker = substr($BCH[3], 8,1);
					
					switch($marker) {
						
						case 'A':
						case 'D':
						case 'G':
						case 'H':
							$transaction_number = $BCH[3] . $BCH[4] . $BCH[5];
							$PIIN = $BCH[3];
							$SPIIN = $BCH[4] . $BCH[5];
							break;
							
						default:
							$transaction_number = $BCH[3] . $BCH[5];
							$PIIN = $BCH[3];
							$SPIIN = $BCH[5];
							
					}
				
				} else {//850 trans#
					$BEG = explode($delimiter, $line[3]);
					$transaction_number = $BEG[3] . $BEG[4];
					$PIIN = $BEG[3];
					$SPIIN = $BEG[4];
				}
				
				//echo "Transaction#: ". $transaction_number . "\n";
				$tmp = new DO_Transaction(trim($PIIN),trim($SPIIN));
				//echo (string)$tmp ."\n";
				//array_push($transaction_list, $tmp);
				
				if(!$this->foundDuplicates($tmp, $transaction_list)) {
					//echo "added: " . (string)$tmp . "\n";
					$tmp->edi = basename($file);
					array_push($transaction_list, $tmp);
				} else {
					echo "Found duplicate PIIN SPIIN in file: " . basename($file) . "\n";
				}
				
				//$f = file_get_contents($file);
				//$tmp = explode($endLine, $f);
				//print_r($tmp);
				$this->count++;
	}

	private function foundDuplicates($obj, $trannie) {
	
		$oso = $obj->piin . $obj->spiin;
		$cnt = count($trannie);
		for ($i=0; $i < $cnt; $i++) {
			$trans = $trannie[$i]->piin . $trannie[$i]->spiin;
			if($trans === $oso){
				//echo "tranie had: " . $trans . " and new object had: " .  $oso . "\n";
				return true;
			}
		}	
		
		return false;
	}

}
?>
