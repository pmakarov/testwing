<?php
App::uses('AppController', 'Controller');
/**
 * TransactionRejectionTypes Controller
 *
 * @property TransactionRejectionType $TransactionRejectionType
 * @property PaginatorComponent $Paginator
 */
class TransactionRejectionTypesController extends AppController {

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
		$this->TransactionRejectionType->recursive = 0;
		$this->set('transactionRejectionTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransactionRejectionType->exists($id)) {
			throw new NotFoundException(__('Invalid transaction rejection type'));
		}
		$options = array('conditions' => array('TransactionRejectionType.' . $this->TransactionRejectionType->primaryKey => $id));
		$this->set('transactionRejectionType', $this->TransactionRejectionType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransactionRejectionType->create();
			if ($this->TransactionRejectionType->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction rejection type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction rejection type could not be saved. Please, try again.'));
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
		if (!$this->TransactionRejectionType->exists($id)) {
			throw new NotFoundException(__('Invalid transaction rejection type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TransactionRejectionType->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction rejection type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction rejection type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TransactionRejectionType.' . $this->TransactionRejectionType->primaryKey => $id));
			$this->request->data = $this->TransactionRejectionType->find('first', $options);
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
		$this->TransactionRejectionType->id = $id;
		if (!$this->TransactionRejectionType->exists()) {
			throw new NotFoundException(__('Invalid transaction rejection type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransactionRejectionType->delete()) {
			$this->Session->setFlash(__('The transaction rejection type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transaction rejection type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
