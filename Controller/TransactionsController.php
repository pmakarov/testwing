<?php
App::uses('AppController', 'Controller');
/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 * @property PaginatorComponent $Paginator
 */
class TransactionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Auth', 'Paginator', 'Email', 'RequestHandler');
	public $helpers = array('Js', 'Html', 'Form', 'Session', 'Time');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transaction->recursive = 0;
		$this->set('transactions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transaction->exists($id)) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		$options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
		$this->set('transaction', $this->Transaction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transaction->create();
			if ($this->Transaction->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
			}
		}
		$uploads = $this->Transaction->Upload->find('list');
		$transactionStatuses = $this->Transaction->TransactionStatus->find('list');
		$this->set(compact('uploads', 'transactionStatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transaction->exists($id)) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transaction->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
			$this->request->data = $this->Transaction->find('first', $options);
		}
		$uploads = $this->Transaction->Upload->find('list');
		$transactionStatuses = $this->Transaction->TransactionStatus->find('list');
		$this->set(compact('uploads', 'transactionStatuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transaction->id = $id;
		if (!$this->Transaction->exists()) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Transaction->delete()) {
			$this->Session->setFlash(__('The transaction has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transaction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * get Transactions By Upload Id
 * 
 * @throws NotFoundException
 * @param string $id
 * @return JSON
 */
 public function get_transactions_by_upload_id($data = null){
		$data_back = json_decode(file_get_contents('php://input'));
		$upload_id = $data_back->{"id"};
		$this->loadModel('User');
		$id = $this->User->id = $this->Auth->user('id');
       
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		else {
			/*$response = array('success' => true, 'userId' => $this->Session->read('Auth.User.id'),  'message' => __('My success message', true),
			'status' => '200');
			$this->layout = '';
			$this->set('response', $response);*/

			//$this->User->set('location', $location);
			//$this->User->read(null, 1);
			
			//var_dump($current_user);
			
			$trans = $this->Transaction->find( 'all', 
												array(
													'conditions' => array(
																	'Transaction.upload_id' => $upload_id
																	),
													'order' => array('Transaction.name' => "ASC") 
														)
				);
			$upload_rec = $this->Transaction->Upload->find('first', array(' conditions' => array('Transaction.Upload.filepath' => $upload_id)));
			//debug($upload_rec);
			//die();
			$path = $upload_rec['Upload']['filepath'];
			$response = array('success' => true, 'userId' => $id, 'transactions' => $trans, 'path' => $path, 'message' => __('My success message', true),
				'status' => '200');
				$this->layout = 'ajax';
				$this->autoRender = false;
			    echo json_encode($response);
		}		
 	}

	public function set_transaction_data($data = null){
		$data_back = json_decode(file_get_contents('php://input'));
		$id = $data_back->{"id"};
		$status = $data_back->{"transaction_status_id"};
		$comment = $data_back->{"comment"};
		$rejection_type = $data_back->{"rejection_type"};
		$rejection_text = $data_back->{"rejection_text"};
		/*
		$response = array(
						'success' => true, 
						'userId' => $id, 
						'id' => $id, 
						'log' => $log = array(
							'comment_success' => true,
							'transaction_rejection_success' => false
						), 
						'transaction' => array(
							'post' => $data_back,
							'comment' => $commentObject,
							'rejection' => $rejectionObject
						),
						'message' => __('My success message', true),
						'status' => '200'
					);
				$this->layout = 'ajax';
				$this->autoRender = false;
			    //echo json_encode($response);
		die(json_encode($response));
		*/
		$this->Transaction->id =  $id;
		if (!$this->Transaction->exists()) {
			        throw new NotFoundException(__('Invalid report'));
		}
				
		$this->Transaction->read(null, $id);
		$log = array();
		if($this->Transaction->saveField('transaction_status_id', $status)) {
			
			if($comment!=="") {
				$this->loadModel('Comment');
				$this->Comment->create();
				$formData = array(
					'transaction_id' => $this->Transaction->id, 
					'text' => $comment
				);
				if ($this->Comment->save($formData)){
					$log['comment_success'] = true;
				} else {
					$log['comment_success'] = false;
				}
			}
			
			if($rejection_type!=="" && $rejection_text!=="") {
				$this->loadModel('TransactionRejection');
				$formData = array(
					'transaction_id' => $this->Transaction->id, 
					'transaction_rejection_type_id' => $rejection_type,
					'text' => $rejection_text
				);
				
				if($this->TransactionRejection->save($formData)) {
					$log['transaction_rejection_success'] = true;
					
				} else {
					$log['transaction_rejection_success'] = false;
				}
			}
			
			$response = array(
						'success' => true, 
						'userId' => $id, 
						'id' => $this->Transaction->id, 
						'log' => $log, 
						'transaction' => array(
							'post' => $data_back
						),
						'message' => __('My success message', true),
						'status' => '200'
					);
				$this->layout = 'ajax';
				$this->autoRender = false;
			    echo json_encode($response);
		}
		else {
			$response = array(
						'success' => false,  
						'userId' => $id, 
						'message' => __('My error message', true),
						'status' => '200'
					);
				$this->layout = 'ajax';
				$this->autoRender = false;
				echo json_encode($response);
			}
		}

	public function set_transaction_status_by_transaction_id($data = null){
		$data_back = json_decode(file_get_contents('php://input'));
		$id = $data_back->{"id"};
		$status = $data_back->{"transaction_status_id"};
		$this->Transaction->id =  $id;
		if (!$this->Transaction->exists()) {
			        throw new NotFoundException(__('Invalid report'));
		}
				
		$this->Transaction->read(null, $id);
		$log = array();
		if($this->Transaction->saveField('transaction_status_id', $status)) {
			
			$response = array(
						'success' => true, 
						'userId' => $id, 
						'id' => $this->Transaction->id, 
						'message' => __('My success message', true),
						'status' => '200'
				);
				$this->layout = 'ajax';
				$this->autoRender = false;
			    echo json_encode($response);
		}
		else {
			$response = array(
						'success' => false,  
						'userId' => $id, 
						'message' => __('My error message', true),
						'status' => '200'
					);
				$this->layout = 'ajax';
				$this->autoRender = false;
				echo json_encode($response);
			}
		}
 }
