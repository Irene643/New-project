
$( function() {
    $( "#datepicker" ).datepicker();
      $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
} );
$(function() {
  $('#all').click(function() {
      // $.ajax({
      //     type: "GET",
      //     // token:csrfHash,
      //     url: "home/completed",
      //     dataType:'JSON',
      //     success: function(response, status, xhr) {
      //       if (data[0] === undefined) return;
      //       alert("here "+data[0]);
      //       console.log(response);
      //         // $("#completed").html(data);
      //     }
      // });
      var oTable = $('#userDetails').dataTable( {
        "bJQueryUI": true,
        "bPaginate": true,
        "language": {
                      oPaginate: {
                          sNext: '<i class="fa fa-forward"></i>',
                          sPrevious: '<i class="fa fa-backward"></i>',
                          sFirst: '<i class="fa fa-step-backward"></i>',
                          sLast: '<i class="fa fa-step-forward"></i>' 
                      }
      
                   } ,
        "bProcessing": true,
        "display": 'envelope',
        "bServerSide": false,
        "sAjaxSource": "home/completed",
        "aoColumns": [
             { "mData": "title" },
             { "mData": "category_id" },
             { "mData": "status_id" },
             { "mData": "size" },
             { "mData": "budget" }
        ]
             });
      
    });
});


// $(document).ready(function() {
//   var oTable = $('#userDetails').dataTable( {
//   "bJQueryUI": true,
//   "bPaginate": true,
//   "language": {
//                 oPaginate: {
//                     sNext: '<i class="fa fa-forward"></i>',
//                     sPrevious: '<i class="fa fa-backward"></i>',
//                     sFirst: '<i class="fa fa-step-backward"></i>',
//                     sLast: '<i class="fa fa-step-forward"></i>' 
//                 }

//              } ,
//   "bProcessing": true,
//   "display": 'envelope',
//   "bServerSide": false,
//   "sAjaxSource": "home/completed",
//   "aoColumns": [
//        { "mData": "title" },
//        { "mData": "category_id" },
//        { "mData": "status_id" },
//        { "mData": "size" },
//        { "mData": "budget" }
//   ]
//        });

//   });
