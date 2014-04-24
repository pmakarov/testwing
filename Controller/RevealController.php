<?php
App::uses('AppController', 'Controller');
App::uses('Reveal', 'Lib/Reveal');
/**
 * Contacts  Controller
 * Use: For contacting the site for any reason
 */

class RevealController extends Controller {
 
    public $uses = null;
	
	public function view() {
		 //$this->autoRender = false;
		 $this->layout = "default";
		// debug($this->request->query);
		//debug($this->request->params['pass'][0]);
		$r = new Reveal(null);
		$r->Path(urldecode($this->request->query['folder']));
		//echo '<pre>';
		$r->getRevealDataByTransactionId($this->request->query['id']);
		//echo '</pre>';
		
		$tenA = $r->get10AReveal();
		$thirtyA = $r->get30AReveal();
		$this->set('tenA', $tenA);
		$this->set('thirtyA', $thirtyA);
	}
 
}
?>