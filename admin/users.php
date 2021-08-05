<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>




  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="users.php">Users <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="core/actions.php?signout=1">Sign Out</a>
        </li>

      </ul>

    </div>
  </nav>
  <?php
include '../assets/db.php';
$sql = "SELECT * FROM users ";
$query = mysqli_query($GLOBALS['conn'], $sql);
$s = 1 ;
?>
  <div class="row mt-5">

    <div class="col-md-10 ">
      <table class="table ml-3">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Age</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col">User Type</th>
            <th scope="col">Timestamp</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($query)) { ?>
          <tr>
            <td><?php echo $s++ ?></td>
            <td class="editname" uid=<?php echo $data['id'] ?>><?php echo $data['name'] ?></td>
            <td class="editmail" uid=<?php echo $data['id'] ?>><?php echo $data['email'] ?></td>
            <td class="editpass" uid=<?php echo $data['id'] ?>><?php echo $data['password'] ?></td>
            <td class="editage" uid=<?php echo $data['id'] ?>><?php echo $data['age'] ?></td>
            <td class="editaddress" uid=<?php echo $data['id'] ?>><?php echo $data['address'] ?></td>
            <td><?php echo $data['status'] ?></td>
            <td class="edittype" uid=<?php echo $data['id'] ?>><?php echo $data['user_type'] ?></td>
            <td><?php echo $data['timestamp'] ?></td>
            <td>
              <button uid=<?php echo $data['id'] ?> class="btn btn-md btn-danger delUser">Delete</button>
            </td>
          </tr>
          <?php } ;?>
        </tbody>
      </table>

    </div>
    <div class="col-md-2">

      <div class="container">
        <h2>Add New User</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg mt-3 ml-5" data-toggle="modal" data-target="#myModal">Add
          User</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-header" id="modal-header" style="display:none;">
                <div class="alert alert-primary" data-dismiss="modal" style="width:100%;" id="alert" role="alert">
                  <strong id="txt">User Added Right Now!</strong>
                </div>
              </div>
              <div class="modal-body">
                <h1 class="text-center">Add New Users</h1>
                <div style="height:630px; width:100%; padding:50px;  ">
                  <form id="signUp" method="post">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Name</label>
                      <input class="form-control" type="text" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Age</label>
                      <input class="form-control" type="number" name="age" placeholder="Age">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <input class="form-control" type="text" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                        <label><input type="radio" checked name="user_type" value="admin">SignUp As Admin</label>
                      </div>
                      <input type="hidden" name="signUp" value="1">
                      <button type="submit" class="btn btn-primary" id="submit">Add User</button>
                  </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>



    </div>

    <script>
      $('#signUp').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          type: 'post',
          url: '../core/actions.php',
          data: $('#signUp').serialize(),
          success: function (val) {
            if (val == 1) {
              //$('').reset();
              $('#modal-header').addClass("show");
              $('#alert').addClass("alert-success");
              $('#alert').removeClass("alert-primary");
              $("#modal-header").css("display", "block");
              setTimeout(function () {
                $('#modal-header').removeClass("show");
                $("#modal-header").css("display", "none");
              }, 3000);
              setTimeout(function () {
                location.reload();
              }, 1500);
            } else {
              $('#modal-header').addClass("show");
              $('#alert').addClass("alert-warning");
              $('#alert').removeClass("alert-primary");
              $("#modal-header").css("display", "block");
              setTimeout(function () {
                $('#modal-header').removeClass("show");
                $("#modal-header").css("display", "none");
              }, 3000);
              $("#txt").html("Something Went Wrong Try Again!");
            }
          }
        });
      });
      $(document).ready(function () {
        $('.delUser').on('click', function (e) {
          e.preventDefault();
          var uid = $(this).attr('uid').trim();
          $.ajax({
            type: 'post',
            url: '../core/actions.php',
            data: {
              delUser: uid
            },
            success: function (val) {
              console.log(val);
              if (val == 1) {
                //$('').reset();
                alert('Done Operation Successfull!');
                location.reload();
              } else {
                alert('Fail Something Went Wrong. Try Later!');
              }
            }
          });
        });
      });
      $('.edittype').on('dblclick', function (e) {
      e.preventDefault();
      ele = $(this);
      var uid = $(this).attr('uid');
      var preValue = $(this).text();
      $(this).html("<input type='text' value='"+preValue+"' class='form-control typefield' style='width:180px'>");
      console.log(uid+preValue);
      
      $(".typefield").on('focusout', function (eq) {
        eq.preventDefault();
        postVal = ele.children().val();
        
        ele.text(postVal);
        console.log(postVal);
        $.ajax({
          type: 'post',
          url: '../core/actions.php',
          data: {edittype:uid, newval:postVal},
          success: function (val) {
            console.log(val);
            if (val == 0) {
              alert('Fail Something Went Wrong. Try Later!');
            }else {
              alert('User Type Updated!');
            }
          }
        });
        
      });
    });
      $('.editname').on('dblclick', function (e) {
      e.preventDefault();
      ele = $(this);
      var uid = $(this).attr('uid');
      var preValue = $(this).text();
      $(this).html("<input type='text' value='"+preValue+"' class='form-control namefield' style='width:180px'>");
      console.log(uid+preValue);
      
      $(".namefield").on('focusout', function (eq) {
        eq.preventDefault();
        postVal = ele.children().val();
        
        ele.text(postVal);
        console.log(postVal);
        $.ajax({
          type: 'post',
          url: '../core/actions.php',
          data: {editname:uid, newval:postVal},
          success: function (val) {
            console.log(val);
            if (val == 0) {
              alert('Fail Something Went Wrong. Try Later!');
            }else {
              alert('Name Updated!');
            }
          }
        });
        
      });
    });
      $('.editmail').on('dblclick', function (e) {
      e.preventDefault();
      ele = $(this);
      var uid = $(this).attr('uid');
      var preValue = $(this).text();
      $(this).html("<input type='email' value='"+preValue+"' class='form-control emailfield' style='width:180px'>");
      console.log(uid+preValue);
      
      $(".emailfield").on('focusout', function (eq) {
        eq.preventDefault();
        postVal = ele.children().val();
        
        ele.text(postVal);
        console.log(postVal);
        $.ajax({
          type: 'post',
          url: '../core/actions.php',
          data: {editmail:uid, newval:postVal},
          success: function (val) {
            console.log(val);
            if (val == 0) {
              alert('Fail Something Went Wrong. Try Later!');
            }else {
              alert('User Updated!');
            }
          }
        });
        
      });
    });
    $('.editpass').on('dblclick', function (e) {
      e.preventDefault();
      ele = $(this);
      var uid = $(this).attr('uid');
      var preValue = $(this).text();
      $(this).html("<input type='password' value='"+preValue+"' class='form-control passfield' style='width:180px'>");
      console.log(uid+preValue);
      
      $(".passfield").on('focusout', function (eq) {
        eq.preventDefault();
        postVal = ele.children().val();
        
        ele.text(postVal);
        console.log(postVal);
        $.ajax({
          type: 'post',
          url: '../core/actions.php',
          data: {editpass:uid, newval:postVal},
          success: function (val) {
            console.log(val);
            if (val == 0) {
              alert('Fail Something Went Wrong. Try Later!');
            }else {
              alert('Password Updated!');
            }
          }
        });
        
      });
    });
    $('.editage').on('dblclick', function (e) {
      e.preventDefault();
      ele = $(this);
      var uid = $(this).attr('uid');
      var preValue = $(this).text();
      $(this).html("<input type='number' value='"+preValue+"' class='form-control agefield' style='width:180px'>");
      console.log(uid+preValue);
      
      $(".agefield").on('focusout', function (eq) {
        eq.preventDefault();
        postVal = ele.children().val();
        
        ele.text(postVal);
        console.log(postVal);
        $.ajax({
          type: 'post',
          url: '../core/actions.php',
          data: {editage:uid, newval:postVal},
          success: function (val) {
            console.log(val);
            if (val == 0) {
              alert('Fail Something Went Wrong. Try Later!');
            }else {
              alert('Age Updated!');
            }
          }
        });
        
      });
    });
    $('.editaddress').on('dblclick', function (e) {
      e.preventDefault();
      ele = $(this);
      var uid = $(this).attr('uid');
      var preValue = $(this).text();
      $(this).html("<input type='text' value='"+preValue+"' class='form-control addressfield' style='width:180px'>");
      console.log(uid+preValue);
      
      $(".addressfield").on('focusout', function (eq) {
        eq.preventDefault();
        postVal = ele.children().val();
        
        ele.text(postVal);
        console.log(postVal);
        $.ajax({
          type: 'post',
          url: '../core/actions.php',
          data: {editaddress:uid, newval:postVal},
          success: function (val) {
            console.log(val);
            if (val == 0) {
              alert('Fail Something Went Wrong. Try Later!');
            }else {
              alert('Address Updated!');
            }
          }
        });
        
      });
    });
  
    </script>


</body>

</html>