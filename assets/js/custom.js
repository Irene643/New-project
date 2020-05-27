
$( function() {
    $( "#datepicker" ).datepicker();
      $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
} );
$(function() {
  $('#all').click(function() {
    alert('all projects');
      $('#allprojects').show();
      return false;
  }); 
  $('#unassigned').click(function() {
    alert('all projects');
    $('#allprojects').hide();
    $('#unassignedprojects').show();
    return false;
  });       
});
