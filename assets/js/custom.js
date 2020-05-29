
$( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
} );

var source = "home/completed";
$(document).ready(function() {

  $("#userDetails").hide();

  $('.all').click(function() {
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
        { "mData": "budget" },
        {"mData":null,"defaultContent":"<a href='/Edit/'>Edit</a>"}
        // {"mData":null,"defaultContent":'<a id="viewproject" href="/view/+mData[0]">View</a><span> | </span><a href="#">Edit</a><span> | </span> <a href="#">Delete</a>'}
    ],
    destroy : true
  });
}); 

