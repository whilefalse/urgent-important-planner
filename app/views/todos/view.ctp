<?php echo $html->css('todo', null,  array('inline' => false)); ?>
<?php echo $html->script(array('jquery', 'jquery-ui', 'jquery-form', 'todo'), array('inline'=>false)); ?>
<div id="container">
  <?php
     echo $form->create('Task', array('action' => 'add', 'id' => 'new-task-form'));
     echo $form->input('description', array('type' => 'text', 'id' => 'new-task-input', 'label' => 'New Task'));
     echo $form->hidden('todo_id', array('value' => $todo['Todo']['id']));
     echo $form->end('Add');
  ?>
  <ul id="new-task-list">
    <?php echo $this->element('task_list', array('new' => true));?>
  </ul>
  <table id="task-table">
    <tr>
      <th></th>
      <th>Urgent</th>
      <th>Not Urgent</th>
    </tr>
    <tr id="important">
      <th>Important</th>
      <td>
        <?php echo $this->element('task_list', array('important' => 1, 'urgent' => 1));?>
      </td>
      <td>
        <?php echo $this->element('task_list', array('important' => 1, 'urgent' => 0));?>
      </td>
    </tr>
    <tr id="not-important">
      <th>Not Important</th>
      <td>
        <?php echo $this->element('task_list', array('important' => 0, 'urgent' => 1));?>
      </td>
      <td>
        <?php echo $this->element('task_list', array('important' => 0, 'urgent' => 0));?>
      </td>
    </tr>
  </table>
</div>
