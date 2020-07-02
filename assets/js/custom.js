
$( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
} );
$("#signup").click(function(){
  $("#sign-up").css("display","block");
  $("#login").css("display","none");
});

var source;
$(document).ready(function() {
  $("#sign-up").css("display","none");
  
  $("#addproject").hide();
 
  $("#userDetails").hide();

  $('.all').click(function() {
    $("#addproject").show();
    source = "home/all";
    showData();
  });

  $('#unassigned').click(function() {
    source = "home/unassigned";
    showData();
  });

  $('#inprogress').click(function() {
    source = "home/in_progress";
    showData();
  });

  $('#waiting').click(function() {
    source = "home/waiting_for_client";
    showData();
  });

  $('#completed').click(function() {
    source = "home/completed";
    showData();
  });

  // $('#viewproject').click(function(){
  //   var id = table.row( this ).id();
  //   alert('clicked');
  //   $.ajax({
  //     url: 'home/view_single/'+id,
  //     success: function(data) {
  //       alert('Directory created');
  //     }
  //   });
  // });

});


var showData = (function(){
  $("#userDetails").show();
  $('#userDetails').dataTable( {
    "bJQueryUI": true,
    "scrollX":   true,
    "bPaginate": true,
    "bProcessing": true,
    "display": 'envelope',
    "bServerSide": false,
    "sAjaxSource": source,
    "aoColumns": [
        { "mData": "title" },
        { "mData": "category" },
        { "mData": "reference" },
        { "mData": "size" },
        { "mData": "status" },
        { "mData": "due_date" },
        { "mData": "budget" }
    ],
    destroy : true
  });
}); 

$('#userDetails').on( 'click', 'tr', function () {
  // Get the rows id value
  var id = table.row( this ).id();
  // Filter for only numbers
  id = id.replace(/\D/g, '');
  // Transform to numeric value
  id = parseInt(id, 10);
  alert( 'Clicked row id '+id );
});

$('.project-holder').hover(
  function(){
  	   $('.btn-bid').css('display', 'block')
   });

