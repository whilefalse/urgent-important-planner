<li class="new-task" id="task-<?php echo $task['Task']['id']?>">
   <?php echo $task['Task']['description']; ?>
   <?php
     echo $form->create('Task', array('action' => 'delete',
                                      'class'=> 'delete-task-form',
                                      'id' => 'delete-task-'.$task['Task']['id']));
     echo $form->hidden('id', array('value' => $task['Task']['id']));
     echo $form->end('X');
    ?>
</li>
