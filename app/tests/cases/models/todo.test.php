<?php
/* Todo Test cases generated on: 2010-07-19 11:07:01 : 1279534621*/
App::import('Model', 'Todo');

class TodoTestCase extends CakeTestCase {
	var $fixtures = array('app.todo', 'app.user');

	function startTest() {
		$this->Todo =& ClassRegistry::init('Todo');
	}

	function endTest() {
		unset($this->Todo);
		ClassRegistry::flush();
	}

}
?>