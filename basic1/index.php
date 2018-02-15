<?php
require 'functions.php';
$query = require 'bootstrap.php';

$tasks = $query->selectAll('todos');
//dd($tasks);

require 'index-view.php';