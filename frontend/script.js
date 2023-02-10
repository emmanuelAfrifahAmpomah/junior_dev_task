
$("document").ready(function() {

  $("#dvd").hide();
  $("#book").hide();
  $("#furniture").hide();

  $("#productType").change(function() {

    let storage = $("#productType").val();

    if(storage == '') {
      $("#dvd").hide();
      $("#furniture").hide();
      $("#book").hide();
      }

    else if(storage == 'DVD') {
    $("#dvd").show();
    $("#furniture").hide();
    $("#book").hide();
    }

    else if(storage == 'Furniture') {
      $("#furniture").show();
      $("#dvd").hide();
      $("#book").hide();
      }

      else if(storage == 'Book') {
        $("#book").show();
        $("#furniture").hide();
        $("#dvd").hide();
        }
  })
})







