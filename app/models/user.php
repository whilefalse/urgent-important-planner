<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'openid';
    var $hasOne = 'Todo';
    var $uses = array('Todo');

    function getTodoLists($user_id){
      return array($this->Todo->findByUserId($user_id));
    }
    function ownsToDoList($user_id, $todo_id){
      $todoLists = $this->getTodoLists($user_id);
      forEach($todoLists as $todoList){
        if ($todoList['Todo']['id'] == $todo_id){
            return true;
        }
      }
      return false;
    }
}