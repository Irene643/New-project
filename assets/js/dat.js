var editor; // use a global for the submit and return data rendering in the userDetailss
 
$(document).ready(function() {
    var source;
    $('#all').click(function() {
        source = "home/in_progress";
        showData();
    });

    $('#unassigned').click(function() {
        alert('here')
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
        "ajax": "home/create",
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
   
    $('#userDetails').DataTable( {
        // "dom": '<"top"i>rt<"bottom"flp><"clear">',
        "pagingType": "full_numbers",
        ajax: "home/in_progress",
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
            
            {
            data: null,
            className: "center",
            defaultContent: '<a href="" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
            }
        ],
        destroy : true
    } );
} );