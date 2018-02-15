     <html>
     <head>
      <title>How to Read Mysql Data by using PHP PDO with Ajax - PHP PDO CRUD with Ajax</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <style>
       body
       {
        margin:0;
        padding:0;
        background-color:#f1f1f1;
       }
       .box
       {
        width:1270px;
        padding:20px;
        background-color:#fff;
        border:1px solid #ccc;
        border-radius:5px;
        margin-top:100px;
       }
      </style>
     </head>
     <body>
      <div class="container box">
       <h1 align="center">  </h1>
       <br />
       <div align="right">
        <button type="button" id="modal_button" class="btn btn-info">Create Records</button>
        <!-- It will show Modal for Create new Records !-->
       </div>
       <br />
       <div id="result" class="table-responsive"> <!-- Data will load under this tag!-->

       </div>
      </div>
     </body>
    </html>

    <!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
    <div id="customerModal" class="modal fade">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <h4 class="modal-title">Create New Records</h4>
       </div>
       <div class="modal-body">
        <label>Enter First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control" />
        <br />
        <label>Enter Last Name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" />
        <br />
       </div>
       <div class="modal-footer">
        <input type="hidden" name="customer_id" id="customer_id" />
        <input type="submit" name="action" id="action" class="btn btn-success" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>

  <script>
    $(document).ready(function(){
     fetchUser(); 
     function fetchUser() 
     {
      var action = "Load";
      $.ajax({
       url : "action.php", 
       method:"POST", 
       data:{action:action}, 
       success:function(data){
        $('#result').html(data);
       }
      });
     }

     //This code will Reset value of Modal item when modal will load for create new records
     $('#modal_button').click(function() {
        $('#customerModal').modal('show'); 
        $('#first_name').val(''); 
        $('#last_name').val('');
        $('.modal-title').text("Create New Records"); //change Modal title to Create new Records
        $('#action').val('Create'); //This will reset Button value ot Create
     });

     //This JQuery code is for Click on Modal action button for Create new records or Update existing records.
     $('#action').click(function() {
      var firstName = $('#first_name').val(); //Get the value of first name textbox.
      var lastName = $('#last_name').val(); //Get the value of last name textbox
      var id = $('#customer_id').val();  //Get the value of hidden field customer id
      var action = $('#action').val();  //Get the value of Modal Action button and stored into action variable
      if(firstName != '' && lastName != '') //This condition will check both variable has some value
      {
       $.ajax({
        url : "action.php",    //Request send to "action.php page"
        method:"POST",     //Using of Post method for send data
        data:{firstName:firstName, lastName:lastName, id:id, action:action}, //Send data to server
        success:function(data){
         alert(data);    //It will pop up which data it was received from server side
         $('#customerModal').modal('hide'); //It will hide Customer Modal from webpage.
         fetchUser();    // Fetch User function has been called and it will load data under divison tag with id result
        }
       });
      }
      else
      {
       alert("Both Fields are Required"); //If both or any one of the variable has no value them it will display this message
      }
     });

     //This JQuery code is for Update customer data. If we have click on any customer row update button then this code will execute
     $(document).on('click', '.update', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      var action = "Select";   //We have define action variable value is equal to select
      $.ajax({
       url:"action.php",   //Request send to "action.php page"
       method:"POST",    //Using of Post method for send data
       data:{id:id, action:action},//Send data to server
       dataType:"json",   //Here we have define json data type, so server will send data in json format.
       success:function(data){
        $('#customerModal').modal('show');   //It will display modal on webpage
        $('.modal-title').text("Update Records"); //This code will change this class text to Update records
        $('#action').val("Update");     //This code will change Button value to Update
        $('#customer_id').val(id);     //It will define value of id variable to this customer id hidden field
        $('#first_name').val(data.first_name);  //It will assign value to modal first name texbox
        $('#last_name').val(data.last_name);  //It will assign value of modal last name textbox
       }
      });
     });

     //This JQuery code is for Delete customer data. If we have click on any customer row delete button then this code will execute
     $(document).on('click', '.delete', function(){
      var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
      if(confirm("Are you sure you want to remove this data?")) //Confim Box if OK then
      {
       var action = "Delete"; //Define action variable value Delete
       $.ajax({
        url:"action.php",    //Request send to "action.php page"
        method:"POST",     //Using of Post method for send data
        data:{id:id, action:action}, //Data send to server from ajax method
        success:function(data)
        {
         fetchUser();    // fetchUser() function has been called and it will load data under divison tag with id result
         alert(data);    //It will pop up which data it was received from server side
        }
       })
      }
      else  //Confim Box if cancel then 
      {
       return false; //No action will perform
      }
     });
    });
  </script>