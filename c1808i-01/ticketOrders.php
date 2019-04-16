<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//http://localhost:81/c1808i-01/ticketOrders.php
include "./TicketOrder.php";
if(isset($_POST)) {
	echo "<h1>hello </h1>";
	$userPhone = $_POST["userPhone"];
	$ticketTypeId = $_POST["ticketTypeId"];
	$description = $_POST["description"];
	$numberOfTickets = $_POST["numberOfTickets"];

	$ticketOrder = new TicketOrder();
	$ticketOrder->insertTicketOrder($userPhone,$ticketTypeId, $description,$numberOfTickets);
}
?>