<?php
class AppController extends Controller{
  var $components = array('Auth');
  var $uses = array('User');

  function beforeFilter(){
    $this->set('user', $this->Auth->user());
    $this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'home');
  }

  function userOwnsTodo($todo_id){
    $user = $this->Auth->user();
    return $this->User->ownsToDoList($user['User']['id'], $todo_id);
  }
}