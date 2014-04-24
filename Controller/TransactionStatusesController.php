<?php
App::uses('AppController', 'Controller');
/**
 * TransactionStatuses Controller
 *
 * @property TransactionStatus $TransactionStatus
 * @property PaginatorComponent $Paginator
 */
class TransactionStatusesController extends AppController {

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
		$this->TransactionStatus->recursive = 0;
		$this->set('transactionStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransactionStatus->exists($id)) {
			throw new NotFoundException(__('Invalid transaction status'));
		}
		$options = array('conditions' => array('TransactionStatus.' . $this->TransactionStatus->primaryKey => $id));
		$this->set('transactionStatus', $this->TransactionStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransactionStatus->create();
			if ($this->TransactionStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction status could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransactionStatus->exists($id)) {
			throw new NotFoundException(__('Invalid transaction status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TransactionStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TransactionStatus.' . $this->TransactionStatus->primaryKey => $id));
			$this->request->data = $this->TransactionStatus->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TransactionStatus->id = $id;
		if (!$this->TransactionStatus->exists()) {
			throw new NotFoundException(__('Invalid transaction status'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransactionStatus->delete()) {
			$this->Session->setFlash(__('The transaction status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transaction status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
