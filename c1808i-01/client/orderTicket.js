let url = "http://localhost:81/c1808i-01/ticketOrders.php"
$(document).ready(function(){
    $("#orderTicket").click(function(){
      let userPhone = $("#userPhone").val()
	    let ticketTypeId = $("#ticketTypeId").val()
	    let description = $("#description").val()
	    let numberOfTickets = $("#numberOfTickets").val()
      $.post(url,
        {userPhone,ticketTypeId,description,numberOfTickets},
        function (data, status) {
          alert(`response == ${JSON.stringify(data)}`)
        });
    });
});