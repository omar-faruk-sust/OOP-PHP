<?php

require 'functions.php';

class Task {
	
	public $description;

	protected $completed = false;

	public function __construct($description) {
		$this->description = $description;

	}

	public function complete() {
		$this->completed = true;
	}

	public function isCompleted() {
		return $this->completed;
	}
}

// $task = new Task('New task');
// $task->complete(); // complete the task
// dd($task->isCompleted()); 

$tasks = [
	new Task('New task'),
	new Task('latest task'),
	new Task('old task'),
	new Task('Add new task')
];

//dd($tasks);

require 'index-view.php';