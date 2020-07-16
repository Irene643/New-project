
$( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
    $("#sign-up").css("display","none");
} );
//check if password match
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
//Display signup form
$("#signup").click(function(){
  $("#sign-up").css("display","block");
  $("#login").css("display","none");
});
//show various pr
// var source;
// $(document).ready(function() {
//   $("#sign-up").css("display","none");
  
//   $("#addproject").hide();
 
//   $("#userDetails").hide();

//   $('.all').click(function() {
//     $("#addproject").show();
//     source = "home/all";
//     showData();
//   });

//   $('#unassigned').click(function() {
//     source = "home/unassigned";
//     showData();
//   });

//   $('#inprogress').click(function() {
//     source = "home/in_progress";
//     showData();
//   });

//   $('#waiting').click(function() {
//     source = "home/waiting_for_client";
//     showData();
//   });

//   $('#completed').click(function() {
//     source = "home/completed";
//     showData();
//   });

//   // $('#viewproject').click(function(){
//   //   var id = table.row( this ).id();
//   //   alert('clicked');
//   //   $.ajax({
//   //     url: 'home/view_single/'+id,
//   //     success: function(data) {
//   //       alert('Directory created');
//   //     }
//   //   });
//   // });

// });


// var showData = (function(){
//   $("#userDetails").show();
//   $('#userDetails').dataTable( {
//     "bJQueryUI": true,
//     "scrollX":   true,
//     "bPaginate": true,
//     "bProcessing": true,
//     "display": 'envelope',
//     "bServerSide": false,
//     "sAjaxSource": source,
//     "aoColumns": [
//         { "mData": "title" },
//         { "mData": "category" },
//         { "mData": "reference" },
//         { "mData": "size" },
//         { "mData": "status" },
//         { "mData": "due_date" },
//         { "mData": "budget" }
//     ],
//     destroy : true
//   });
// }); 

// $('#userDetails').on( 'click', 'tr', function () {
//   // Get the rows id value
//   var id = table.row( this ).id();
//   // Filter for only numbers
//   id = id.replace(/\D/g, '');
//   // Transform to numeric value
//   id = parseInt(id, 10);
//   alert( 'Clicked row id '+id );
// });

$('.project-holder').hover(
  function(){
  	   $('.btn-bid').css('display', 'block')
   });
$('#bid-not-loggedin').click(function(e){
  e.preventDefault();
  alert('Please login to apply for this job');
});
// Variable to hold request

// Bind to the submit event of our form
// $("#bid").click(function(event){
//   alert('1')

//     // Prevent default posting of form - put here to work in case of errors
//     event.preventDefault();

//     // Abort any pending request
//     // setup some local variables
//     var $form = $(this);
//     alert('here')

//     // Let's select and cache all the fields
//     // var $inputs = $form.find("input, select, button, textarea");

//     // Serialize the data in the form
//     var serializedData = $form.serialize();

//     // Let's disable the inputs for the duration of the Ajax request.
//     // Note: we disable elements AFTER the form data has been serialized.
//     // Disabled form elements will not be serialized.
//     // $inputs.prop("disabled", true);

//     // Fire off the request to /form.php
//     $.ajax({
//         url: "index.php/writer/bid",
//         type: "post",
//         data: serializedData
//     });
//   }
  $("#bid").click(function(){
    alert('1')
  });

