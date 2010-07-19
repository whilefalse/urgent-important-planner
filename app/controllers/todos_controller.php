<?php
class TodosController extends AppController {

	var $name = 'Todos';

    function view($id = null){
      $user = $this->Auth->user();
      #Redirect to correct todo list if a user is logged in
      if ($id === null){
        if ($user){
          $todo = $this->Todo->findByUserId($user['User']['id']);
          $this->redirect(array('controller' => 'todos', 'action' => 'view', $todo['Todo']['id']));
        }
        else{
          $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
      }

      #Check that the user has authority to view this todo list
      if ($this->userOwnsTodo($id)){
        $this->set('tasks', $this->Todo->getTasks($id));
        $this->set('todo', $this->Todo->findById($id));
      }
      else{
        $this->render('missing');
      }
    }

    function missing(){

    }
}