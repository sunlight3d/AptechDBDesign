<?php 
include "Database.php";
class TicketOrder {
	public function insertTicketOrder($userPhone,$ticketTypeId, $description,$numberOfTickets) {
		$sql = "INSERT INTO tblOrders(userPhone, ticketTypeId, description, numberOfTickets) ".
			"VALUES('$userPhone', '$ticketTypeId', '$description', '$numberOfTickets')";
		$database = new Database();
		$connection = $database->get_connection();
		$result = mysqli_query($connection, $sql);
		if(!mysqli_error()) {
			echo json_encode(array(
				"result" => "ok", 
				"data" => $result,
				"message"=>"Insert data successfully"
			));
		} else {
			echo json_encode(array("result" => "failed", "message"=>"Insert data failed"));
		}
	}
	public function updateTicketOrder($orderId, 
		$userPhone,$ticketTypeId, 
		$description,$numberOfTickets, $active) {

		$sql = "UPDATE tblOrders SET userPhone='$userPhone',".
				"ticketTypeId='$ticketTypeId'".
				",description='$description'".
				",numberOfTickets='$numberOfTickets'".
				" WHERE id='$orderId'";
		$database = new Database();
		$connection = $database->get_connection();
		$result = mysqli_query($connection, $sql);
		if(!mysqli_error()) {
			echo json_encode(array(
				"result" => "ok", 
				"data" => $sql,
				"message"=>"Update data successfully"
			));
		} else {
			echo json_encode(array("result" => "failed", "message"=>"Update data failed"));
		}
	}
	public function queryTicketOrders($limit, $page) {
		$offset = $limit * $page;
		$sql = "SELECT * FROM tblOrders LIMIT $limit OFFSET $offset";
		$database = new Database();
		$connection = $database->get_connection();
		$result = mysqli_query($connection, $sql);
		$ticketOrders = array();
		while($row = mysqli_fetch_assoc($result)) {
			array_push($ticketOrders, $row);
		}

		if(!mysqli_error($connection)) {
			echo json_encode(array(
				"result" => "ok", 
				"data" => $ticketOrders,
				"message"=>"Query data successfully"
			));
		} else {
			echo json_encode(array("result" => "failed", "message"=>"Query data failed"));
		}
	}
}
?>