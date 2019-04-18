<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//http://localhost:81/c1808i-01/ticketOrders.php
include "./TicketOrder.php";
if(isset($_POST) && count($_POST) > 0) {
	$userPhone = $_POST["userPhone"];
	$ticketTypeId = $_POST["ticketTypeId"];
	$description = $_POST["description"];
	$numberOfTickets = $_POST["numberOfTickets"];
	$active = isset($_POST["active"]) ? $_POST["active"] : "0";
	$ticketOrder = new TicketOrder();

	if(isset($_POST["orderId"])) {
		//update
			$orderId = $_POST["orderId"];
			$ticketOrder->updateTicketOrder($orderId, 
			$userPhone,$ticketTypeId, 
			$description,$numberOfTickets, $active);
	} else {
		//insert	
		$ticketOrder->insertTicketOrder($userPhone,$ticketTypeId, $description,$numberOfTickets);
	}
} else if(isset($_GET) && count($_GET) > 0){	
	$ticketOrder = new TicketOrder();
	$page = $_GET["page"];
	$limit = $_GET["limit"];
	$ticketOrder->queryTicketOrders($limit, $page);
}
?>