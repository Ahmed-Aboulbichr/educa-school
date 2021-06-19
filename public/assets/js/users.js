
    var table = $('#customDatatable').DataTable({
        serverSide: true,
        responsive: true,

        ajax: config.routes.getUsers,
        columns: [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
           

        ],

        "initComplete": function(settings, json) {
            console.log('dt complet');
            $('tbody > tr:first-child').click();
        },
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
            $(nRow).attr('id', aData.id);
        },

        "language": {
            "url": url,
            "paginate": {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            }
        },
        "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
    });











    $('tbody').on('click', 'tr', function() {
        $('tr').removeClass('activeRow')
        $(this).addClass('activeRow')
        var id = $(this).attr('id');
        $.ajax({
        url: config.routes.getUser ,
        type: "GET",
        data : {
            id : id,
        },
        success: function(data) {
            $("#firstName").attr('value',data.user['firstName']);
            $("#lastName").attr('value',data.user['lastName']);
            $("#email").attr('value',data.user['email']);
            $("#userid").attr('value',data.user['id']);
        },

        error: function(data){
            alert(data.error);
        }
        });
    });







  $('#userInfoForm').on("submit",function(e){
   
       e.preventDefault();
       
       var clicked = $(this).find("button[type=submit]:focus" ).attr('name');

       function success(data){
            $("#firstName").attr('value',data.user['firstName']);
            $("#lastName").attr('value',data.user['lastName']);
            $("#email").attr('value',data.user['email']);
            $("#userid").attr('value',data.user['id']);

       } 
      if(clicked=='adduser'){

       var url = config.routes.addUser ; 
       var method = "POST";
      }else if(clicked=='edituser'){
        
        var url = config.routes.editUser ;  
        var method = "PUT";
      } else if(clicked=='deleteuser'){

        var url = config.routes.deleteUser ; 
        var method = "DELETE";
        function success(data){
            $("#firstName").attr('value',"");
            $("#lastName").attr('value',"");
            $("#email").attr('value',"");
            $("#userid").attr('value',"");
            alert("user deleted successfully!");
       }
      }
      var id = $(this).attr('id');
        $.ajax({
        url: url,
        type: method,
        data : $(this).serialize(),
        success: function(data) {
            
        
           success(data);
        },

        error: function(data){
            console.log(data);
        }
        });
  });



