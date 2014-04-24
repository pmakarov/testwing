<?php
App::uses('AppController', 'Controller');
/**
 * EdiTypes Controller
 *
 * @property EdiType $EdiType
 * @property PaginatorComponent $Paginator
 */
class EdiTypesController extends AppController {

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
		$this->EdiType->recursive = 0;
		$this->set('ediTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EdiType->exists($id)) {
			throw new NotFoundException(__('Invalid edi type'));
		}
		$options = array('conditions' => array('EdiType.' . $this->EdiType->primaryKey => $id));
		$this->set('ediType', $this->EdiType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EdiType->create();
			if ($this->EdiType->save($this->request->data)) {
				$this->Session->setFlash(__('The edi type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edi type could not be saved. Please, try again.'));
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
		if (!$this->EdiType->exists($id)) {
			throw new NotFoundException(__('Invalid edi type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EdiType->save($this->request->data)) {
				$this->Session->setFlash(__('The edi type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The edi type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EdiType.' . $this->EdiType->primaryKey => $id));
			$this->request->data = $this->EdiType->find('first', $options);
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
		$this->EdiType->id = $id;
		if (!$this->EdiType->exists()) {
			throw new NotFoundException(__('Invalid edi type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EdiType->delete()) {
			$this->Session->setFlash(__('The edi type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The edi type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
