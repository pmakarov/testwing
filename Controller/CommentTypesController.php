<?php
App::uses('AppController', 'Controller');
/**
 * CommentTypes Controller
 *
 * @property CommentType $CommentType
 * @property PaginatorComponent $Paginator
 */
class CommentTypesController extends AppController {

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
		$this->CommentType->recursive = 0;
		$this->set('commentTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CommentType->exists($id)) {
			throw new NotFoundException(__('Invalid comment type'));
		}
		$options = array('conditions' => array('CommentType.' . $this->CommentType->primaryKey => $id));
		$this->set('commentType', $this->CommentType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CommentType->create();
			if ($this->CommentType->save($this->request->data)) {
				$this->Session->setFlash(__('The comment type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment type could not be saved. Please, try again.'));
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
		if (!$this->CommentType->exists($id)) {
			throw new NotFoundException(__('Invalid comment type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CommentType->save($this->request->data)) {
				$this->Session->setFlash(__('The comment type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CommentType.' . $this->CommentType->primaryKey => $id));
			$this->request->data = $this->CommentType->find('first', $options);
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
		$this->CommentType->id = $id;
		if (!$this->CommentType->exists()) {
			throw new NotFoundException(__('Invalid comment type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CommentType->delete()) {
			$this->Session->setFlash(__('The comment type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comment type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
