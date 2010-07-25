<?php
if (isset($new) and $new){
  $id = 'new-task-list';
}
 else {
   $id = 'important:'.$important.'-urgent:'.$urgent;
 }
?>
<ul <?php if (!isset($new) || !$new): ?> class="sortable" <?php endif; ?>id="<?php echo $id;?>">
    <?php
    forEach($tasks as $task){
      if (isset($new) && $new){
        $ok = is_null($task['Task']['important']) || is_null($task['Task']['urgent']);
      }
      else{
        $ok = !is_null($task['Task']['important']) && $task['Task']['important'] == $important
        && !is_null($task['Task']['urgent']) && $task['Task']['urgent'] == $urgent;
      }
      if ($ok){
        echo $this->element('task', array('task' => $task, 'new' => isset($new) && $new));
      }
    }
    ?>
</ul>