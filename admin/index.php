<?php 
     
     if(!isset($_COOKIE['admin_id'])){
        header("Location: ../");
         }else{

         }
    
?>
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- file input css -->
    <link rel="stylesheet" type="text/css" href="../assets/fileinput/css/fileinput.min.css">

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
$sql = "SELECT * FROM products ";
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
                        <th scope="col">Discription</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_array($query)) { 
      $catid = $data['cat_id'];
      $getName = mysqli_query($GLOBALS['conn'], "SELECT name FROM categories WHERE id = '$catid'");
      $catName = mysqli_fetch_array($getName)[0];
      $img = $data['image'];
    ?>
                    <tr>
                        <td><?php echo $s++ ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['discription'] ?></td>
                        <td><?php echo $catName ?></td>
                        <td>
                            <img class="img-responsive" src="uploads/<?php echo $img; ?>" height="80px;">
                        </td>
                        <td>Rs. <?php echo $data['price'] ?></td>
                        <td><button pid=<?php echo $data['id'] ?> class="btn btn-md btn-danger delProd">Delete</button></td>
                    </tr>
                    <?php } ;?>
                </tbody>
            </table>

        </div>



        <div class="col-md-2 ">
            <h2>Add Post</h2>
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Open modal
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Post Here</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div id="messages"> </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="container">
                                <h2>Add Post Here</h2>


                                <div id="messages"></div>

                                <form action="core/actions.php" method="post" enctype="multipart/form-data"
                                    id="uploadImageForm">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Discription</label>
                                        <input class="form-control" type="text" name="discription"
                                            placeholder="Discription">
                                    </div>

                                    <div class="form-group">
                                        <label for="sel1">Category</label>
                                        <select class="form-control" id="sel1" name="category">
                                            <?php $cat = "SELECT * FROM categories";
							                     	$result = mysqli_query($GLOBALS['conn'],$cat)or die(mysqli_error());
							                          while ($row = mysqli_fetch_array($result)){
							                       ?>
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?>
                                            </option>
                                            <?php }; ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">OrginalPrice</label>
                                        <input class="form-control" type="number" name="orginalprice" placeholder="Orginal Price">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Price</label>
                                        <input class="form-control" type="number" name="price" placeholder="Price">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for=name>Upload Image:</label>
                                        <input name="userImage" type="file" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div><br>
                            <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                            <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
                            <!-- bootsrap js -->
                            <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
                            <!-- file input -->
                            <script src="../assets/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript">
                            </script>
                            <script src="../assets/fileinput/js/plugins/sortable.min.js" type="text/javascript">
                            </script>
                            <script src="../assets/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
                            <script src="../assets/fileinput/js/fileinput.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    $("#uploadImageForm").unbind('submit').bind('submit', function () {

                                        var form = $(this);
                                        var formData = new FormData($(this)[0]);

                                        $.ajax({
                                            url: form.attr('action'),
                                            type: form.attr('method'),
                                            data: formData,
                                            dataType: 'json',
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            async: false,
                                            success: function (response) {
                                                if (response.success == true) {
                                                    $("#messages").html(
                                                        '<div class="alert alert-success alert-dismissible" role="alert">' +
                                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                                        response.messages +
                                                        '</div>');

                                                    $('input[type="text"]').val('');
                                                    $(".fileinput-remove-button").click();
                                                    setTimeout(function () {
                                                        location.replace(
                                                            'index.php');
                                                    }, 1500);
                                                } else {
                                                    $("#messages").html(
                                                        '<div class="alert alert-warning alert-dismissible" role="alert">' +
                                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                                        response.messages +
                                                        '</div>');
                                                }
                                            }
                                        });

                                        return false;
                                    });
                                });
        $(document).ready(function () {
        $('.delProd').on('click', function (e) {
          e.preventDefault();
          var pid = $(this).attr('pid').trim();
          $.ajax({
            type: 'post',
            url: '../core/actions.php',
            data: {
              delProd: pid
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
                            </script>

</body>

</html>