<?php 
include "Database.php";
class TicketOrder {
	public function insertTicketOrder($userPhone,$ticketTypeId, $description,$numberOfTickets) {
		$sql = "INSERT INTO tblOrders(userPhone, ticketTypeId, description, numberOfTickets) ".
			"VALUES('$userPhone', '$ticketTypeId', '$description', '$numberOfTickets')";
		$database = new Database();
		$connection = $database->get_connection();
		$result = mysqli_query($connection, $sql);
		$error = mysqli_error($connection);
		if($error) {
			echo json_encode(array(
				"result" => "failed", 
				"data" => $result,
				"message"=>"Insert data failed: ".$error
			));
		} else {
			echo json_encode(array(
				"result" => "ok", 
				"data" => $result,
				"message"=>"Insert data successful "
			));
		}
	}
	public function updateTicketOrder($orderId, 
		$userPhone,$ticketTypeId, 
		$description,$numberOfTickets, $active) {

		$sql = "UPDATE tblOrders SET userPhone='$userPhone',".
				"ticketTypeId='$ticketTypeId'".
				",description='$description'".
				",numberOfTickets='$numberOfTickets'".
				",active='$active'".
				" WHERE id=$orderId";
		$database = new Database();
		$connection = $database->get_connection();
		$result = mysqli_query($connection, $sql);
		$error = mysqli_error($connection);
		if($error) {
			echo json_encode(array(
				"result" => "failed", 
				"message"=>"Update data failed: ".$error
			));
		} else {
			echo json_encode(array(
				"result" => "ok", 
				"data" => $result,
				"sql" => $sql,
				"message"=>"Update data successful "
			));
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