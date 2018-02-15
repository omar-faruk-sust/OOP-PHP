<?php 

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