$(document).ready(function(){
    const limit = 10
    const page = 0
    const url = `http://localhost:81/c1808i-01/ticketOrders.php?limit=${limit}&page=${page}`
    $("#getTicketOrders").click(function(){
        $.get(url, function(data, status){
          alert(`response == ${JSON.stringify(data)}`)
        });
      });
});