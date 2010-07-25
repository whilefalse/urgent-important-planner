<?php echo $html->css('todo', null,  array('inline' => false)); ?>
<?php echo $html->script(array('jquery', 'jquery-ui', 'jquery-form', 'todo'), array('inline'=>false)); ?>
<div id="container">
  <?php
     echo $form->create('Task', array('action' => 'add', 'id' => 'new-task-form'));
     echo $form->input('description', array('type' => 'text', 'id' => 'new-task-input', 'label' => 'New Task'));
     echo $form->hidden('todo_id', array('value' => $todo['Todo']['id']));
     echo $form->end('Add');
  ?>
  <?php echo $this->element('task_list', array('new' => true));?>
  <table id="task-table">
    <tr class="title-row">
      <th></th>
      <th id="urgent-title">Urgent</th>
      <th id="not-urgent-title">Not Urgent</th>
    </tr>
    <tr id="important">
      <th id="important-title">Important</th>
      <td id="important-urgent">
        <?php echo $this->element('task_list', array('important' => 1, 'urgent' => 1));?>
      </td>
      <td id="important-not-urgent">
        <?php echo $this->element('task_list', array('important' => 1, 'urgent' => 0));?>
      </td>
    </tr>
    <tr id="not-important">
      <th id="not-important-title">Not Important</th>
      <td id="not-important-urgent">
        <?php echo $this->element('task_list', array('important' => 0, 'urgent' => 1));?>
      </td>
      <td id="not-important-not-urgent">
        <?php echo $this->element('task_list', array('important' => 0, 'urgent' => 0));?>
      </td>
    </tr>
  </table>
</div>
