<?php
require 'functions.php';
$query = require 'bootstrap.php';

$tasks = $query->selectAll('todos');

$task = $query->getRowById('todos', $id = 1);

dd($task);

require 'index-view.php';