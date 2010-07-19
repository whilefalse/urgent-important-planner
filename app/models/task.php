<?php
class Task extends AppModel {
	var $name = 'Task';
	var $displayField = 'description';
	var $belongsTo = 'Todo';
}
?>