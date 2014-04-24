<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

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
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
		$transactions = $this->Comment->Transaction->find('list');
		$commentTypes = $this->Comment->CommentType->find('list');
		$tags = $this->Comment->Tag->find('list');
		$this->set(compact('transactions', 'commentTypes', 'tags'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$transactions = $this->Comment->Transaction->find('list');
		$commentTypes = $this->Comment->CommentType->find('list');
		$tags = $this->Comment->Tag->find('list');
		$this->set(compact('transactions', 'commentTypes', 'tags'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('The comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function set_comment_data_by_transaction_id($data = null){
		$data_back = json_decode(file_get_contents('php://input'));
		if(!isset($data_back->{"id"})) {
			
		}
		$id = $data_back->{"id"};
		$status = $data_back->{"transaction_status_id"};
		$this->Comment->id =  $id;
		if (!$this->Comment->exists()) {
			        //throw new NotFoundException(__('Invalid report'));
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
