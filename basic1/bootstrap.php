<?php

$config = require "config.php";
require 'database/Connection.php';
require 'database/QueryBuilder.php';

// This file is like an factory worker where it builds a querybuilder obj
return new QueryBuilder(
	Connection::make($config['database'])
);