<?php 

class QueryBuilder {

	protected $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function selectAll($tableName) {
		$statement = $this->pdo->prepare("select * from {$tableName}");
		$statement->execute();
		//$statement->setFetchMode(PDO::FETCH_ASSOC);
		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function getRowById($tableName, $id) {
		$stmt = $this->pdo->prepare("SELECT * FROM {$tableName} WHERE id={$id} LIMIT 1"); 
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insertRow() {

	}



}