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
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getRowById($tableName, $id) {
		$statement = $this->pdo->prepare("SELECT * FROM {$tableName} WHERE id={$id} LIMIT 1"); 
		$statement->execute();

		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	public function insertRow($tableName, $data) {
		$statement = $this->pdo->prepare("
		   INSERT INTO {$tableName} (first_name, last_name) 
		   VALUES (:first_name, :last_name)
		");

		return $statement->execute(
		   array(
		    ':first_name' => $data["firstName"],
		    ':last_name' => $data["lastName"]
		   )
		);
	}

	public function updateRow($tableName, $data) {

		$statement = $this->pdo->prepare(
			"UPDATE {$tableName} 
			SET first_name = :first_name, last_name = :last_name 
			WHERE id = :id
			"
		);

		$result = $statement->execute(
			array(
			':first_name' => $data["firstName"],
			':last_name' => $data["lastName"],
			':id'   => $data["id"]
			)
		);

		return $result;
	}

	public function deleteRow($tableName, $id) {
		$statement = $this->pdo->prepare(
			"DELETE FROM {$tableName} WHERE id = :id"
		);

		$result = $statement->execute(
			array(
			':id' => $id
			)
		);

		return $result;
	}



}