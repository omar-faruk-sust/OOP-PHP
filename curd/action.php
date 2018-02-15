<?php
require 'functions.php';
$query = require 'bootstrap.php';


$customer = $query->getRowById('customers', $id = 1);

if(isset($_POST["action"]))
{
 //For Load All Data
 if($_POST["action"] == "Load") 
 {

  $result = $query->selectAll('customers');
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
     <th width="40%">First Name</th>
     <th width="40%">Last Name</th>
     <th width="10%">Update</th>
     <th width="10%">Delete</th>
    </tr>
  ';
	if(count($result) > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<tr>
			 <td>'.$row["first_name"].'</td>
			 <td>'.$row["last_name"].'</td>
			 <td><button type="button" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button></td>
			 <td><button type="button" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button></td>
			</tr>
			';
		}
	}
	else
	{
		$output .= '
		<tr>
		 <td align="center">Data not Found</td>
		</tr>
		';
	}

	$output .= '</table>';
	echo $output;

	}

 	//This code for Create new Records
	if($_POST["action"] == "Create")
	{
		$result = $query->insertRow('customers', $_POST);

		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}

	//This Code is for fetch single customer data for display on Modal
	if($_POST["action"] == "Select")
	{
		$output = $query->getRowById('customers',$_POST["id"]);
		echo json_encode($output);
	}

	if($_POST["action"] == "Update")
	{

		$result = $query->updateRow('customers',$_POST);

		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}

	if($_POST["action"] == "Delete")
	{
		$result = $query->deleteRow('customers', $_POST['id']);

		if(!empty($result))
		{
			echo 'Data Deleted';
		}
	}

}
