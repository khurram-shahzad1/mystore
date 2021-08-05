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
    <div class="container">
        <center>
            <!--  center Begin  -->

            <h1> My Orders </h1>

            <p class="lead"> Your orders on one place</p>

            <p class="text-muted">

                If you have any questions, feel free to Contact Us. Our Customer Service work <strong>24/7</strong>

            </p>

        </center><!--  center Finish  -->


        <hr>


        <div class="table-responsive">
            <!--  table-responsive Begin  -->

            <table class="table table-bordered table-hover">
                <!--  table table-bordered table-hover Begin  -->

                <thead>
                    <!--  thead Begin  -->

                    <tr>
                        <!--  tr Begin  -->

                        <th> No: </th>
                        <th> Total Amount: </th>
                        <th> Qty: </th>
                        <th> Size: </th>
                        <th> Order Date:</th>
                        <th> Paid / Unpaid: </th>
                        <th> Status: </th>


                    </tr><!--  tr Finish  -->

                </thead><!--  thead Finish  -->

                <tbody>
                    <!--  tbody Begin  -->

                    <?php include '../assets/db.php';
            
         
            
            $get_orders = "select * from orders ";
            
            $run_orders = mysqli_query($GLOBALS['conn'],$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['id'];
                
                $due_amount = $row_orders['amount'];
                
                $qty = $row_orders['qty'];
                
                $size = $row_orders['size'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
               
               
            
            ?>

                    <tr>
                        <!--  tr Begin  -->

                        <th> <?php echo $i; ?> </th>
                        <td> $<?php echo $due_amount; ?> </td>
                        <td> <?php echo $qty; ?> </td>
                        <td> <?php echo $size; ?> </td>
                        <td> <?php echo $order_date; ?> </td>
                        <td class="status" uid=<?php echo $order_status?>>

                            <?php if($order_status=='0'){
                    
                    echo "Unpaid";
                    
                }else{
                    
                   echo "Paid";
                    
                } ?>
                        </td>
                        <td>

                            <button uid=<?php echo $order_id; ?> target="_blank" class="btn btn-primary btn-sm order">
                            <?php if($order_status=='0'){
                    
                    echo "Confirm Payment";
                    
                }else{
                    
                   echo "Paid";
                    
                } ?> </button>

                        </td>

                    </tr><!--  tr Finish  -->

                    <?php } ?>

                </tbody><!--  tbody Finish  -->

            </table><!--  table table-bordered table-hover Finish  -->

        </div><!--  table-responsive Finish  -->
    </div>
    <script>
        $(".order").on("click", function (order) {
            order.preventDefault();
            var uid = $(this).attr('uid').trim();
            var prnt = $(this).parent().siblings(".status");
            var status = 1;
            $.ajax({
                type: 'post',
                url: '../core/actions.php',
                data: {
                    order: uid,
                    status: status
                },
                success: function (val) {
                    console.log(val);
                    if (val == 1) {
                        location.reload();
                    } else {

                    }
                }
            });
        });
    </script>
</body>

</html>