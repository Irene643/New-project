var editor; // use a global for the submit and return data rendering in the userDetailss
var source;
$(document).ready(function() {
    
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
    editor = new $.fn.dataTable.Editor( {
        "ajax": "home/saveProject",
        "table": "#userDetails",
        "fields": [ {
            "label": "First name:",
            "name": "first_name"
        }, {
            "label": "Last name:",
            "name": "category"
        }, {
            "label": "Position:",
            "name": "reference"
        }, {
            "label": "Office:",
            "name": "size"
        }, {
            "label": "Extension:",
            "name": "status"
        }, {
            "label": "Start date:",
            "name": "due_date",
            "type": "datetime"
        }, {
            "label": "Salary:",
            "name": "budget"
        }
        ]
    } );
 
    // New record
    $('a.editor_create').on('click', function (e) {
        e.preventDefault();
 
        editor.create( {
            title: 'Create new record',
            buttons: 'Add'
        } );
    } );
 
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
   
    var table = $('#userDetails').DataTable( {
        // "dom": '<"top"i>rt<"bottom"flp><"clear">',
        "pagingType": "full_numbers",
        ajax: source,
        columns: [
            // { data: null, render: function ( data, type, row ) {
            //     // Combine the first and last names into a single table field
            //     return data.first_name+' '+data.last_name;
            // } },
            {"data":"id"},
            { "data": "title" },
            { "data": "category" },
            { "data": "reference" },
            { "data": "size" },
            { "data": "status" },
            { "data": "due_date" },
            // { "data": "budget" },
            
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