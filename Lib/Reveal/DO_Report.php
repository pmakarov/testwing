<?php
/**
 * DO_Report
 * 
 * @package default
 * @author  Paul Makarov
 * 
 */
 
class DO_Report{
   public $transaction_id; // the piin spiin combo transaction name
   public $fail; // stores if transaction passed or failed
   public $errors;

    function __construct(){
       $this->fail = true;
	   $this->errors = array();
    }
	
 	public function __toString() {
      return $this->transaction_id;
    }
    
}
?>