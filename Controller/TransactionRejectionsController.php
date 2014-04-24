<?php
App::uses('AppController', 'Controller');
/**
 * TransactionRejections Controller
 *
 * @property TransactionRejection $TransactionRejection
 * @property PaginatorComponent $Paginator
 */
class TransactionRejectionsController extends AppController {

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
		$this->TransactionRejection->recursive = 0;
		$this->set('transactionRejections', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransactionRejection->exists($id)) {
			throw new NotFoundException(__('Invalid transaction rejection'));
		}
		$options = array('conditions' => array('TransactionRejection.' . $this->TransactionRejection->primaryKey => $id));
		$this->set('transactionRejection', $this->TransactionRejection->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransactionRejection->create();
			if ($this->TransactionRejection->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction rejection has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction rejection could not be saved. Please, try again.'));
			}
		}
		$transactions = $this->TransactionRejection->Transaction->find('list');
		$transactionRejectionTypes = $this->TransactionRejection->TransactionRejectionType->find('list');
		$this->set(compact('transactions', 'transactionRejectionTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransactionRejection->exists($id)) {
			throw new NotFoundException(__('Invalid transaction rejection'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TransactionRejection->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction rejection has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction rejection could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TransactionRejection.' . $this->TransactionRejection->primaryKey => $id));
			$this->request->data = $this->TransactionRejection->find('first', $options);
		}
		$transactions = $this->TransactionRejection->Transaction->find('list');
		$transactionRejectionTypes = $this->TransactionRejection->TransactionRejectionType->find('list');
		$this->set(compact('transactions', 'transactionRejectionTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TransactionRejection->id = $id;
		if (!$this->TransactionRejection->exists()) {
			throw new NotFoundException(__('Invalid transaction rejection'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransactionRejection->delete()) {
			$this->Session->setFlash(__('The transaction rejection has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transaction rejection could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
