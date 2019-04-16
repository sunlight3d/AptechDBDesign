<?php 
include "Database.php";
class TicketOrder {
	public function insertTicketOrder($userPhone,$ticketTypeId, $description,$numberOfTickets) {
		$sql = "INSERT INTO tblOrders(userPhone, ticketTypeId, description, numberOfTickets) VALUES('$userPhone', '$ticketTypeId', '$description', '$numberOfTickets')";
		$database = new Database();
		$connection = $database->get_connection();
		$result = mysqli_query($connection, $sql);
		if(!mysqli_error()) {
			echo json_encode(array(
				"result" => "ok", 
				"sql" => $sql,
				"message"=>"Insert data successfully"
			));
		} else {
			echo json_encode(array("result" => "failed", "message"=>"Insert data failed"));
		}
	}
}
?>