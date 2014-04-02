<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Auth', 'Paginator', 'Email', 'RequestHandler', 'MathCaptcha' => array('timer' => 3));
	public $helpers = array('Js', 'Html', 'Form', 'Session', 'Time');
	
	public function beforeFilter() {
	    parent::beforeFilter();
	  	$this->Auth->allow('register', 'recover', 'verify');
	   
	}
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
   		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * login method
 * 
 */
	public function login() {
		if ($this->Session->read('Auth.User')) {
			if ($this->request->is('ajax')) {
		        $this->layout = 'ajax';
				$this->autoRender = false;
				$role_name = $this->User->Group->field('name', array('id' => $this->Auth->User('group_id')));
				$action = 'dashboard_' . $role_name;
				$arr = array("login" => "false" , "redirect" => Router::url(array("controller"=>"users","action"=>$action)), "error" => "Already Logged in");
			  	echo json_encode($arr);
			}
			else{
				$this->Session->setFlash('You are logged in!');
				$role_name = $this->User->Group->field('name', array('id' => $this->Auth->User('group_id')));
				//group selection logic here
				$action = 'dashboard_' . $role_name;
			   // $this->redirect('controller' => 'users' => 'action' => $action);
				$this->redirect(array('controller'=>'users','action' => $action), null, false);
				//$this->redirect(array('controller'=>'reports','action' => 'index'), null, false);
			}
		}
		 
		
		else if ($this->request->is('ajax')){
		        $this->layout = 'ajax';
				$this->autoRender = false;
				//$data_back = json_decode(file_get_contents('php://input'));
				//echo $this->request->data['time_zone'];
				
				$this->Session->write('User.time_zone', $this->request->data['User']['timezone']);
				//var_dump($data_back);
				// $tmp = $this->Auth->User();
		        if ($this->Auth->login())  
			    {  
					//echo AuthComponent::password($this->data['User']['password']);
					// Set User's ID in model which is needed for validation
					$this->User->id = $this->Auth->user('id');
					
					 
					// Load the user (avoid populating $this->data)
					$current_user = $this->User->findById($this->User->id);
					$this->set('current_user', $current_user);
					if ($this->User->saveField('lastlogin', date('Y-m-d H:i:s')))
					{
						
						//Add in the timezone
						$this->User->saveField('timezone', $this->request->data['User']['timezone']);
						//$this->Auth->User()
						$role_name = $this->User->Group->field('name', array('id' => $this->Auth->User('group_id')));
						//group selection logic here
						$action = 'dashboard_' . $role_name;
					   // $this->redirect('controller' => 'users' => 'action' => $action);
						//$this->redirect(array('controller'=>'users','action' => $action), null, false);
						 $arr = array("login" => "true" , "redirect" => Router::url(array("controller"=>"users","action"=>$action)));
						// $this->redirect(array('controller'=>'reports','action' => 'index'));
						 echo json_encode($arr);
					}
					else
					{
						$arr = array("login" => "false" , "error" => "Login service unvailable <br> Please try again.");
						echo json_encode($arr);
					}
					
					
					//$id = $this->Auth->user('id'); 
					//$fields = array('lastlogin' => date('Y-m-d H:i:s'), 'modified' => false);
					//$this->User->id = $id;
					//$this->User->save($fields, false, array('lastlogin'));
				
					
			    }  
			    else  
			    {  
			         $arr = array("login" => "false" , "redirect" => Router::url(array("controller"=>"users","action"=>'login')), "error" => "Invalid Username or Password <br> Please try again.");
			         echo json_encode($arr);
			    } 
		 }
		else if ($this->request->is('post')) {
			if ($this->Auth->login()) {
					$id = $this->Auth->user('id'); 
					$fields = array('lastlogin' => date('Y-m-d H:i:s'), 'modified' => false);
					$this->User->id = $id;
					$this->User->save($fields, false, array('lastlogin'));
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Your username or password was incorrect.');
			}
		}
	}
/**
 * logout method
 */
	public function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->Auth->logout();
		$this->redirect("../");
	}
	
	/**
     * Registration page for new users
     */
    public function register()
    {
    	
		
		if($this->request->is('post') && $this->request->data) {
			if ($this->request->data['User']['password'] == $this->request->data['User']['password_confirm']){
				$this->User->create();
				//$roleId = array('role_id'=> '3');
				//array_push($this->data, $roleId);
				if ($this->MathCaptcha->validate($this->request->data['User']['captcha'])) {
					if ($this->User->save($this->data)) {
						//$this->Session->setFlash(__('The user has been saved'));
						$id = $this->User->id;
				        $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
				        $this->Auth->login($this->request->data['User']);
				        //$this->redirect('/users/home');
						$this->redirect(array('controller'=>'users','action' => 'dashboard_users'), null, false);
						
					} else {
						$message = 'The user could not be saved. Please, try again.';
						$this->Session->setFlash($message, 'default',  array('class' => 'flash'));
					}
				}
				else {
					 $this->Session->setFlash('Could not complete registration!');
				}
			}
		}
		
		//$roles = $this->Role->findById('3');
		//$roles = $this->User->Role->field('id', array('id' => '3'));
		//var_dump($roles);
		$captcha = $this->MathCaptcha->getCaptcha();
		$roles = $this->User->Group->find('list');
		$this->set(compact('roles', 'captcha'));
	}
	
	/**
     * Allows the user to email themselves a password redemption token
     */
    public function recover()
    {
        if ($this->Auth->user()) {
            $this->redirect(array('controller' => 'users', 'action' => 'account'));
        }
         
        if (!empty($this->data['User']['email'])) {
            $Token = ClassRegistry::init('Token');
            $user = $this->User->findByEmail($this->data['User']['email']);
             
            if (count($user) === 0) {
                $this->Session->setFlash('No matching user found');
                return false;
            }
			else {
             
	            $token = $Token->generate(array('User' => $user['User']));
	            $this->Session->setFlash('An email has been sent to your account, please follow the instructions in this email.');
	            $this->Email->to = $user['User']['email'];
	            $this->Email->subject = 'Password Recovery';
	            $this->Email->from = 'Support <support@critter.com>';
	            $this->Email->template = 'recover';
	            $this->set('user', $user);
	            $this->set('token', $token);
	            $this->Email->send();
			}
		}
    }
     
    /**
     * Accepts a valid token and resets the users password
     */
    public function verify($token_str = null)
    {
        if ($this->Auth->user()) {
            $this->redirect(array('controller' => 'users', 'action' => 'account'));
        }
 
        $Token = ClassRegistry::init('Token');
         
        $res = $Token->get($token_str);
        if ($res) {
            // Update the users password
            $password = $this->User->generatePassword();
            $this->User->id = $res['User']['id'];
			
	        $this->User->saveField('password', $password);
            //$this->User->saveField('password', $this->Auth->password($password));
            $this->set('success', true);
 
            // Send email with new password
            $this->Email->to = $res['User']['email'];
            $this->Email->subject = 'Password Changed';
            $this->Email->from = 'Support <support@example.com>';
            $this->Email->template = 'verify';
            $this->set('user', $res);
            $this->set('password', $password);
            $this->Email->send();
        }
    }
	
	/**
     * Account details page (change password)
     */
    public function account()
    {
    	$this->layout = "dashboard";
        // Set User's ID in model which is needed for validation
        $this->User->id = $this->Auth->user('id');
        if ($this->Auth->user()) {
        // Load the user (avoid populating $this->data)
	        $current_user = $this->User->findById($this->User->id);
	        $this->set('current_user', $current_user);
	 
	        $this->User->useValidationRules('ChangePassword');
	        $this->User->validate['password_confirm']['compare']['rule'] = array('password_match', 'password', false);
	 
	        $this->User->set($this->data);
	        if (!empty($this->data) && $this->User->validates()) {
			
				// old algorithm asked to hass $password w/ Auth comp but no need.
			   $password = $this->data['User']['password'];
				//echo AuthComponent::password($password) . "<br/>";
				//die(); //23bd3f160cd86e6f3ef90c0d11c64d797eaa71d9 for password hash
	            $this->User->saveField('password', $password);
	 
	            $this->Session->setFlash('Your password has been updated');
	            $this->redirect(array('action' => 'account'));
	        }       
    	}
		   else{
		   		 $this->redirect(array('action' => 'login'));
		   }
	}
	
	/**
* Dashboards
*/
	public function dashboard() {
      //get user's group (role)
      $this->layout = 'default_OLD';
    $role_name = $this->User->Group->field('name', array('id' => $this->Auth->User('group_id')));
    //group selection logic here
    $action = 'dashboard_' . $role_name;
   // $this->redirect('controller' => 'users' => 'action' => $action);
	$this->redirect(array('controller'=>'users','action' => $action), null, false);
  }
  
 public function dashboard_administrators() {
	// $this->layout = 'dashboard';
	$this->layout = 'default_OLD';
}
 
 
		
 public function dashboard_users() {
	 $this->layout = 'dashboard';
	 
	 
	 if(is_null($this->Session->read('Auth.User.id')== null))
	 {
	 	$this->Session->setFlash(__("you've been logged out of the system"));
		$this->redirect(array('controller'=>'users', 'action'=>'login'));
	 }
	 
	
	 /*
		 $this->loadModel('Child');
		 $childrenOptions = $this->Child->find('list'); 
		 $childrenOptions = $this->Child->find('all',array('fields' => array('first_name','last_name','id')));
		 $childrenOptions_list = Set::combine($childrenOptions, '{n}.Child.id', array('{0} {1}', '{n}.Child.first_name', '{n}.Child.last_name'));
		 $this->set('childrenOptions', $childrenOptions_list);
	 
	 
	 */
	 
		//$this->loadModel('Report');
		//$reports = 
		$start = date('Y-m-d');
		//$end = date('Y-m-d', strtotime('+1 month'));
		//$conditions = array('Event.start <=' => $end, 'Event.end >=' => $start);
		//$conditions = array($start);
		//$reports = $this->Report->find('all', array('conditions' => array('DATE(Report.created)' => $start)));
		//var_dump($reports);
		//$this->set('reports', $reports);
		//$children = $this->Report->Child->find('list');
		//$rooms = $this->Report->Room->find('list');
		//$daycareCenters = $this->Report->DaycareCenter->find('list');
		//$teachers = $this->Report->Teacher->find('list');
		//$this->set(compact('children', 'rooms', 'daycareCenters', 'teachers', 'childrenOptions_list'));
		
	 }
  
}


