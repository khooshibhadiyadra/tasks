<?php 
include ('con.php');




include ("htmlstyle.html");
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

?>
<html>
  <head>
    <title>Display Data</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="card mb-4">
        <div class="card-header"><h3 class="card-title">User Details</h3></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Gender</th>
                  <th>Hobbies</th>
                  <th>Country</th>
                  <th>Profile Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class ="userdata">
              </tbody>
            </table>
          </div>      
    </div>
</div>

    <script>
        $(document).ready(function () {
            getdata();
        });

        function getdata()
        {
            $.ajax({
                url: "getuser.php",
                type: "GET",
                dataType: "json",
                success: function (response){
            
                    $('.userdata').empty();
                    $.each(response, function(key ,value){
                     
                        $('.userdata').append('<tr>' +
                            '<td>'+value['first_name']+'</td>\
                            <td>'+value['last_name']+'</td>\
                            <td>'+value['email']+'</td>\
                            <td>'+value['address']+'</td>\
                            <td>'+value['phone']+'</td>\
                            <td>'+value['gender']+'</td>\
                            <td>'+value['hobbies']+'</td>\
                            <td>'+value['country']+'</td>\
                            <td><img src="uploads/'+value['profile_image']+'" width="100" height="100" alt="profile image"</td>\
                            <td>\
                           <button class="primary" id="update"> <a style="text-decoration:None;color:white" href="updateform.php?id='+value['id']+'" title="Edit">Edit</a></button>\
                           <button class="danger" id="delete"><a style="text-decoration:None;color:white" href="#" data-id="'+value['id']+'" title="Delete">Delete</a></button>\
                            </td>\
                            </tr>');
                        
                    });
                }
            });
        }
        </script>
</body>

  </html>
  <script>
  $("body").on("click","#delete",function(event){
          event.preventDefault();
          var id=$(event.target).attr('data-id');
          var cls=$(event);
          if(confirm("Are You Sure")){
            $.ajax({
              url:"delete.php",
              type:"post",
              data:{id:id,action:'Delete'},

              success:function(res){
                if(res){
                  $(cls).closest("tr").remove();
                }else{
                  alert("Failed TryAgain");
                  $(cls).text("Try Again");
                }
              }
            });
          }
        });
  </script>
