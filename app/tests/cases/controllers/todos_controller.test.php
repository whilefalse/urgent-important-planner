<?php
/* Todos Test cases generated on: 2010-07-19 11:07:19 : 1279534579*/
App::import('Controller', 'Todos');

class TestTodosController extends TodosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TodosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.todo');

	function startTest() {
		$this->Todos =& new TestTodosController();
		$this->Todos->constructClasses();
	}

	function endTest() {
		unset($this->Todos);
		ClassRegistry::flush();
	}

}
?>