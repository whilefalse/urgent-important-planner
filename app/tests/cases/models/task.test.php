<?php
/* Task Test cases generated on: 2010-07-19 12:07:19 : 1279538719*/
App::import('Model', 'Task');

class TaskTestCase extends CakeTestCase {
	var $fixtures = array('app.task', 'app.todo', 'app.user');

	function startTest() {
		$this->Task =& ClassRegistry::init('Task');
	}

	function endTest() {
		unset($this->Task);
		ClassRegistry::flush();
	}

}
?>