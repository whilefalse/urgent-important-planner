<?php
class TasksController extends AppController {

	var $name = 'Tasks';
    var $helpers = array('Js');
    var $components = array('RequestHandler');

    function add(){
      #No GET's please
      $this->_noGET();

      #check for ownership and create
      if ($this->userOwnsTodo($this->data['Task']['todo_id'])){
          $this->Task->save($this->data);
          $this->set('object', array('html' => $this->_renderTask($this->Task->id),
                                     'success' => true));
          $this->_ajaxOrRefresh();
      }
      else{
        $this->set('object', array('success' => false));
        $this->_ajaxOrRefresh();
      }
    }

    function move($id){
      $this->_noGET();

      $task = $this->Task->findById($id);
      if ($task && $this->userOwnsTodo($task['Task']['todo_id'])){
        $this->Task->read(null, $id);
        $this->Task->save($this->data);
        $this->set('object', $task);
      }
      else{
        $this->set('object', false);
      }

      #Render
      $this->_ajaxOrRefresh();
    }

    function delete(){
      $this->_noGET();

      $task_id = $this->data['Task']['id'];
      $task = $this->Task->findById($task_id);
      if ($task && $this->userOwnsTodo($task['Task']['todo_id'])){
        $this->Task->delete($task_id);
        $this->set('object', !$this->Task->findById($task_id));
      }
      else{
        $this->set('object', false);
      }

      #Render
      $this->_ajaxOrRefresh();
    }

    function _renderTask($task_id){
      $this->set('task', $this->Task->findById($task_id));
      $this->set('new', true);
      $this->render('/elements/task', null);
      $output = $this->output;
      $this->output = '';
      return $output;
    }

    function _noGET(){
      if (empty($this->data)){
        $this->redirect(array('controller' => 'pages', 'action' => 'home'));
      }
    }

    function _ajaxOrRefresh($view='/elements/json',  $layout='json'){
      if ($this->RequestHandler->isAjax()){
        $this->render($view, $layout);
      }
      else{
        $this->redirect(array('controller' => 'todos', 'action' => 'view',
                              $this->data['Task']['todo_id']));
      }
    }
}
?>
