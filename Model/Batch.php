<?php
App::uses('AppModel', 'Model');
/**
 * Batch Model
 *
 */
class Batch extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'window' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'path' => array(
		    'extension' => array(
		        'rule' => array('extension', array('zip')),
		        'message' => 'Only zip files',
		         ),
		     'upload-file' => array(
		        'rule' => array('uploadFile'),
		        'message' => 'Error uploading file'
		         )
		),
	
	);
	
	public function uploadFile( $check ) {
/*
	if($_FILES["data"]["name"]["Batch"]["path"]) {
		$filename = $_FILES["data"]["name"]["Batch"]["path"];
		$source = $_FILES["data"]["tmp_name"]["Batch"]["path"];
		$type = $_FILES["data"]["type"]["Batch"]["path"];
		$name = explode(".", $filename);
		$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
		foreach($accepted_types as $mime_type) {
			if($mime_type == $type) {
				$okay = true;
				break;
			} 
		}
		
		$continue = strtolower($name[1]) == 'zip' ? true : false;
		if(!$continue) {
			$message = "The file you are trying to upload is not a .zip file. Please try again.";
		}
		
		//$target_path = "/home/var/yoursite/httpdocs/".$filename;  // change this to the correct site path
		$target_path =  WWW_ROOT . 'files'. DS;
		echo $target_path . "<br/>" . $source . "<br/>";
		if( !file_exists($target_path) ){
	        mkdir($target_path);
			echo "making dir $target_path\n";
	    }
		if(move_uploaded_file($source, $target_path)) {
			$zip = new ZipArchive();
			$x = $zip->open($target_path);
			if ($x === true) {
				$zip->extractTo($target_path); // change this to the correct site path
				$zip->close();
		
				unlink($target_path);
			}
			$message = "Your .zip file was uploaded and unpacked.";
			$this->set('path', $fileName);
			return true;
		} else {	
			$message = "There was a problem with the upload. Please try again.";
			return false;
		}
		*/
	debug($check);
	    $uploadData = array_shift($check);
		debug($uploadData);
	    if ( $uploadData['size'] == 0 || $uploadData['error'] !== 0) {
	        return false;
	    }
	
	    $uploadFolder = WWW_ROOT . 'files'. DS .'your_directory';
	    $fileName = time() . '.zip';
	    $uploadPath =  $uploadFolder . DS . $fileName;
	
	    if( !file_exists($uploadFolder) ){
	        mkdir($uploadFolder);
	    }
	
	    if (move_uploaded_file($uploadData['tmp_name'], $uploadPath)) {
	        $this->set('path', $fileName);
	        return true;
	    } 
	
	    return false;
	    }
	    
}
