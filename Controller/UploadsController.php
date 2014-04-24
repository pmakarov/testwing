<?php
App::uses('AppController', 'Controller');
App::uses('X12Parser','Lib/X12Parser');
App::uses('Reveal', 'Lib/Reveal');
/**
 * Uploads Controller
 *
 * @property Upload $Upload
 * @property PaginatorComponent $Paginator
 */
class UploadsController extends AppController {

	private $transaction_list;
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Upload->recursive = 0;
		$this->set('uploads', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Upload->exists($id)) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$options = array('conditions' => array('Upload.' . $this->Upload->primaryKey => $id));
		$this->set('upload', $this->Upload->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Upload->create();
			if ($this->uploadFile() && $this->Upload->save($this->request->data)) {
				$this->loadModel('Transaction');
				$data = array();
				$upload_id = $this->Upload->id;
				for($i =0; $i < count($this->transaction_list); $i++) {
					
					$formData = array(
						'upload_id' => $upload_id, 
						'name' => $this->transaction_list[$i]->piin . $this->transaction_list[$i]->spiin, 
						'xmlfile' => $this->transaction_list[$i]->xml, 
						'edifile' => $this->transaction_list[$i]->edi, 
						'udffile' => $this->transaction_list[$i]->udf);	
					
					array_push($data, $formData);
				}
				if($this->Transaction->saveAll($data)) {
					$message = "Your .zip file was uploaded and unpacked and the Transactions have been Entered.";
					$this->Session->setFlash(__($message));	
					
					//HACK in Reveal Parse
					$r = new Reveal($this->transaction_list);
					$r->parse($this->request->data['Upload']['filepath']);
					$big_list = $r->getRevealErrors();
					
					if(is_array($big_list)) {
						foreach ($big_list as $key => $value) {
							$reports = $this->Transaction->find('first',
							array(
							    'conditions' => array('Transaction.name' => $value->transaction_id,'Transaction.upload_id' => $upload_id)
							));
							
							if($reports) { // 
								//debug($reports);
								$this->Transaction->id = $reports['Transaction']['id'];
								$rejected = ($value->fail)? "2" : "1";
								$this->Transaction->set('transaction_status_id',$rejected);
								if($this->Transaction->save()) {
									$this->loadModel('Comment');
									
									/** 
									 * TODO: write more robust error system 
									 * like writing a link to open reveal report type 
									 * maybe???
									 */
										for($i =0; $i < sizeof($value->errors); $i++) {
											//echo $value->errors[$i]->errorType . "\n";	
											//echo "\t". $value->errors[$i]->revealLine . "\n";		
											$this->Comment->create();
											$formData = array(
												'transaction_id' => $this->Transaction->id, 
												'text' => 'Reveal reports:' .$value->errors[$i]->errorType,
												'comment_type_id' => '2' //1 = STANDARD, 2 = ERROR
											);
											$this->Comment->save($formData);	
											
										} 
										
								}
							} 
						}	
					}
					
					return $this->redirect(array('controller'=>'users','action' => 'dashboard'), null, false);
				} else {
					$this->Session->setFlash(__('The transactions could not be saved. Please, try again.'));
				}
				
				
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		}
		
		$users = $this->Upload->User->find('list');
		$customers = $this->Upload->Customer->find('list');
		$ediTypes = $this->Upload->EdiType->find('list');
		$this->set(compact('users', 'customers', 'ediTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Upload->exists($id)) {
			throw new NotFoundException(__('Invalid upload'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The upload has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Upload.' . $this->Upload->primaryKey => $id));
			$this->request->data = $this->Upload->find('first', $options);
		}
		$users = $this->Upload->User->find('list');
		$customers = $this->Upload->Customer->find('list');
		$this->set(compact('users', 'customers', 'customers', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Upload->delete()) {
			$this->Session->setFlash(__('The upload has been deleted.'));
		} else {
			$this->Session->setFlash(__('The upload could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function uploadFile() {
	  	$file = $this->data['Upload']['file'];
	  	if ($file['error'] === UPLOAD_ERR_OK) {
			$filename = $file['name'];
	    	$id = String::uuid(); 
			$target_path = WWW_ROOT.'files'.DS.'uploads'.DS.'zips'.DS.$filename;
			$target_folder = WWW_ROOT.'files'.DS.'uploads'.DS.'test_batches'.DS.$id; // ? WWW_ROOT : APP
	    	if (move_uploaded_file($file['tmp_name'], $target_path)) {
				$zip = new ZipArchive();
				$x = $zip->open($target_path);
				if ($x === true) {
					$zip->extractTo($target_folder); 
					$zip->close();
					unlink($target_path);	
						
					$this->request->data['Upload']['filepath'] = $target_folder;
			      	$this->request->data['Upload']['user_id'] = $this->Auth->User('id');
			      	$this->request->data['Upload']['filename'] = $file['name'];
			      	$this->request->data['Upload']['filesize'] = $file['size'];
			      	$this->request->data['Upload']['filemime'] = $file['type'];
					
					$x = new X12Parser();
					$x->parse($target_folder);
					$this->transaction_list = $x->getTransactions();
			      	return true;
		      	}
				else return false;
	    	}
			else return false;
	  	}
	  	return false;
	}

	public function rrmdir($dir) {
	    foreach(glob($dir . '/*') as $file) {
	        if(is_dir($file))
	            rrmdir($file);
	        else
	            unlink($file);
	    }
	    rmdir($dir);
	}
}
