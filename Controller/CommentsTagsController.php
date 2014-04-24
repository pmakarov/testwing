<?php
App::uses('AppController', 'Controller');
/**
 * CommentsTags Controller
 *
 * @property CommentsTag $CommentsTag
 * @property PaginatorComponent $Paginator
 */
class CommentsTagsController extends AppController {

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
		$this->CommentsTag->recursive = 0;
		$this->set('commentsTags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CommentsTag->exists($id)) {
			throw new NotFoundException(__('Invalid comments tag'));
		}
		$options = array('conditions' => array('CommentsTag.' . $this->CommentsTag->primaryKey => $id));
		$this->set('commentsTag', $this->CommentsTag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CommentsTag->create();
			if ($this->CommentsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The comments tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comments tag could not be saved. Please, try again.'));
			}
		}
		$comments = $this->CommentsTag->Comment->find('list');
		$tags = $this->CommentsTag->Tag->find('list');
		$this->set(compact('comments', 'tags'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CommentsTag->exists($id)) {
			throw new NotFoundException(__('Invalid comments tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CommentsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The comments tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comments tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CommentsTag.' . $this->CommentsTag->primaryKey => $id));
			$this->request->data = $this->CommentsTag->find('first', $options);
		}
		$comments = $this->CommentsTag->Comment->find('list');
		$tags = $this->CommentsTag->Tag->find('list');
		$this->set(compact('comments', 'tags'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CommentsTag->id = $id;
		if (!$this->CommentsTag->exists()) {
			throw new NotFoundException(__('Invalid comments tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CommentsTag->delete()) {
			$this->Session->setFlash(__('The comments tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comments tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
