<?php
class Todo extends AppModel {
	var $name = 'Todo';
	var $belongsTo = 'User';
    var $hasMany = 'Task';

    function getTasks($id){
      return $this->Task->findAllByTodoId($id);
    }
}
?>