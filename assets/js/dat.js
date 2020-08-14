var editor; // use a global for the submit and return data rendering in the userDetailss
var source;
$(document).ready(function() {
    $('#admin-projects').hide();
    
    $('#all').click(function() {
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
    $('#writerall').click(function() {
        source = "writer/all";
        showWriterData();
    });

    $('#bids').click(function() {
        source = "writer/unassigned";
        showWriterData();
    });

    $('#writerinprogress').click(function() {
        source = "writer/in_progress";
        showWriterData();
    });

    $('#writerwaiting').click(function() {
        source = "writer/waiting_for_client";
        showWriterData();
    });

    $('#writercompleted').click(function() {
        source = "writer/completed";
        showWriterData();
    });
  
    // Edit record
    $('#userDetails').on('click', 'a.editor_edit', function (e) {
        e.preventDefault();
 
        editor.edit( $(this).closest('tr'), {
            title: 'Edit record',
            buttons: 'Update'
        } );
    } );
 
    // Delete a record
    $('#userDetails').on('click', 'a.editor_remove', function (e) {
        e.preventDefault();
 
        editor.remove( $(this).closest('tr'), {
            title: 'Delete record',
            message: 'Are you sure you wish to remove this record?',
            buttons: 'Delete'
        } );
    } );
 
} );

var showData = (function(){
    $('#admin-projects').show();
    var table = $('#userDetails').DataTable( {
        "dom": '<"top"i>rt<"top"flp><"clear">',
        "pagingType": "full_numbers",
        ajax: source,
        columns: [
            // { data: null, render: function ( data, type, row ) {
            //     // Combine the first and last names into a single table field
            //     return data.first_name+' '+data.last_name;
            // } },
            { "data": "title" },
            { "data": "category" },
            { "data": "reference" },
            { "data": "size" },
            { "data": "status" },
            { "data": "due_date" },
            { "data": "budget" },
            {"data":"bids"},
            {
                className: "center",
                defaultContent: '<button class="editor_view">View</button> <button class="editor_edit">Edit</button> <button class="editor_remove">Delete</button>'
                }
        ],
        destroy : true
    } );
   $('#userDetails tbody').on( 'click', 'button', function (e) {
    var action = this.className;
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    baseurl = '<?php echo base_url(); ?>';
    
    var row_data = table.row( $(this).parents('tr') ).data();
    var jsonData = { [csrfName]: csrfHash, id: row_data.id};
    console.log(jsonData)
    if(action == "editor_edit"){
         window.open("home/edit/"+row_data.id, "_self");
    }else if(action == "editor_remove"){
        if(confirm("Are You sure you want to delete this Project?")){
            window.open("home/delete/"+row_data.id, "_self");
        }
        
    }else{
        window.open("home/view_single/"+row_data.id, "_self"); 
    }
    
        // var data_row = table.row($(this).closest('tr')).data();
    } );
   // $('#userDetails').on('click', 'tbody .editor_edit', function () {
   //      var data_row = table.row($(this).closest('tr')).data();
   //      alert(data_row);
   //  })
} );
var showWriterData = (function(){
    // alert('here');
    $('.project-card').hide();
    $('#form-search').hide();
    $('#writerDetails').show();
    
    var table = $('#writerDetails').DataTable( {
        "dom": '<"top"i>rt<"bottom"flp><"clear">',
        "pagingType": "full_numbers",
        ajax: source,
        columns: [
            // { data: null, render: function ( data, type, row ) {
            //     // Combine the first and last names into a single table field
            //     return data.first_name+' '+data.last_name;
            // } },
            { "data": "title" },
            { "data": "category" },
            { "data": "reference" },
            { "data": "size" },
            { "data": "status" },
            { "data": "due_date" },
            // 
            {
                className: "center",
                defaultContent: '<button class="editor_view">View</button>'
                } 
        ],
        destroy : true
    } );
    $('#writerDetails tbody').on( 'click', 'button', function (e) {
        var action = this.className;
        baseurl = '<?php echo base_url(); ?>';
        
        var row_data = table.row( $(this).parents('tr') ).data();
             window.open("home/view_single/"+row_data.id, "_self");
        
            // var data_row = table.row($(this).closest('tr')).data();
        } );
} );
