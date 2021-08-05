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
$sql = "SELECT * FROM categories ";
$query = mysqli_query($GLOBALS['conn'], $sql);
$s = 1 ;
?>

  <div class="row mt-5">

    <div class="col-md-9 ">
      <table class="table ml-3">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_array($query)) { ?>
          <tr>
            <td><?php echo $s++ ?></td>
            <td class="editcat" uid=<?php echo $data['id'] ?>><?php echo $data['name'] ?></td>
            <td><button cid=<?php echo $data['id'] ?> class="btn btn-md btn-danger delCat">Delete</button></td>
          </tr>
          <?php } ;?>

        </tbody>
      </table>

    </div>
    <div class="col-md-3">

      <div class="container">
        <h2>Add New Category</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg mt-3 ml-5" data-toggle="modal" data-target="#myModal">Add
          Category</button>

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
                  <strong id="txt">Category Added!</strong>
                </div>
              </div>
              <div class="modal-body">
                <h1 class="text-center">Add New Category</h1>
                <div style="height:250px; width:100%; padding:50px;  ">
                  <form id="addCategory" method="post">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Category</label>
                      <input class="form-control" type="text" name="category" placeholder="Category">
                    </div>

                    <input type="hidden" name="addCategory" value="1">
                    <button type="submit" class="btn btn-primary" id="submit">Add Category</button>
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
      $('#addCategory').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
          type: 'post',
          url: '../core/actions.php',
          data: $('#addCategory').serialize(),
          success: function (val) {
            console.log(val);
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
        $('.delCat').on('click', function (e) {
          e.preventDefault();
          var cid = $(this).attr('cid').trim();
          $.ajax({
            type: 'post',
            url: '../core/actions.php',
            data: {
              delCat: cid
            },
            success: function (val) {
              console.log(val);
              if (val == 1) {
                //$('').reset();
                alert('done Operation Successfull!');
                location.reload();
              } else {
                alert('fail Something Went Wrong. Try Later!');
              }
            }
          });
        });
      });
      $('.editcat').on('dblclick', function (e) {
      e.preventDefault();
      ele = $(this);
      var uid = $(this).attr('uid');
      var preValue = $(this).text();
      $(this).html("<input type='text' value='"+preValue+"' class='form-control catfield' style='width:180px'>");
      console.log(uid+preValue);
      
      $(".catfield").on('focusout', function (eq) {
        eq.preventDefault();
        postVal = ele.children().val();
        
        ele.text(postVal);
        console.log(postVal);
        $.ajax({
          type: 'post',
          url: '../core/actions.php',
          data: {editcat:uid, newval:postVal},
          success: function (val) {
            console.log(val);
            if (val == 0) {
              alert('Fail Something Went Wrong. Try Later!');
            }else {
              alert('Category Updated!');
            }
          }
        });
        
      });
    });
    </script>

</body>

</html>