<?php 
	if(isset($_POST)){ 
	  	$data_back = json_decode(file_get_contents('php://input'));
		//$data_back-> key / value pairs
		$success = isset($data_back->{"bool"});
		
		if ($success == true){
		
			// Set up associative array
			$data = array('success'=> true,'message'=>'Success message: hooray!');
		
			// JSON encode and send back to the server
			echo json_encode($data);
		}
		else{
			// Set up associative array
			$data = array('success'=> false,'message'=>'Failure message: boo!');
		
			// JSON encode and send back to the server
			echo json_encode($data);
		}
	}
?>