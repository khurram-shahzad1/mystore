<?php 
     if(!isset($_COOKIE['user_id'])){
        header("Location: index.php");
         }else{

         }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Playfair+Display&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Playfair+Display:ital@1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <title>SHOPPINGSTORE</title>
    <style>
        .navbar {

            background-color: rgb(203, 203, 206) !important;
        }

        .navbar_left .nav-item .nav-link {

            font-size: 25px;
            margin-left: 15px;
        }

        .navbar_right .nav-item .nav-link {

            font-size: 25px;
            margin-right: 15px;
        }

        .nav-item {
            letter-spacing: 2px;
        }
    </style>
</head>

<body>
    <div class="main_header ">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

            <!--  Show this only on mobile to medium screens  -->
            <a class="navbar-brand d-lg-none" href="#"><img src="assets/image/logo.png" alt=""></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle"
                aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--  Use flexbox utility classes to change how the child elements are justified  -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">

                <ul class="navbar-nav navbar_left ">
                    <li class="nav-item">
                        <a class="nav-link active" href="Shop.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myorders.php">My Orders</a>
                    </li>
                </ul>


                <!--   Show this only lg screens and up   -->

                <div class="brand_name">
                    <a class="navbar-brand d-none d-lg-block" href="#"><img src="assets/image/logo.png" class=""
                            alt=""></a>

                </div>


                <ul class="navbar-nav navbar_right ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="core/actions.php?signout=1">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container new_arival ">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 bounce-in-top ">
                    <div class="text_arival mt-5">
                        <h1>Best New Arival</h1>
                        <span class="off">70% OFF THIS WINTER</span>
                        <p class="mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum accusantium ea,
                            officiis odit ipsam pariatur dignissimos atque..</p>
                        <button class="btn hvr-radial-out">REED MORE</button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 slide-in-elliptic-left-bck">
                    <div class="img_arival ml-5">
                        <img src="assets/image/kurta.png" class="img-fluid " alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="New_Arriwal mb-5">
        <div class="row w-50 m-auto">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                <h1>New Arival Ladies Purse</h1>
            </div>
        </div>
    </div>
    <?php
include 'assets/db.php';
$sql = "SELECT * FROM products ";
$query = mysqli_query($GLOBALS['conn'], $sql);
$s = 1 ;


?>
    <!-- Product cart -->
    <div class="product_combo mb-5">
        <!-- 1st row -->
        <div class="row w-100 m-auto">
            <?php while ($data = mysqli_fetch_array($query)) { 
            $userId = $_COOKIE['user_id'];
            $prodId = $data['id'];
            ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="product-card" data-aos="fade-down-left">
                    <div class="badge">Hot</div>
                    <div class="product-tumb">
                        <img src="admin/uploads/<?php echo $data['image']; ?>" alt="">
                    </div>
                    <div class="product-details">
                        <h4><a href=""><?php echo $data['name']; ?></a></h4>
                        <p><?php echo $data['discription']; ?></p>
                        <div class="product-bottom-details">
                            <div class="product-price"><small>$<?php echo  $data['orginal_price']; ?></small>$<?php echo  $data['price']; ?></div>
                            <div class="product-links">
                                <a href=""><i title="favorite" class="fa fa-heart"></i></a>
                                <a href="details.php?prodid=<?php echo $prodId; ?>"><i
                                        class="fa fa-shopping-cart"></i></a>
                                <a href="" class="pdtModal" prodId="<?php echo $prodId; ?>"><i
                                        class="fa fa-search-plus"></i></a>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="cart_content">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <h1>Image</h1>
                                        <img src="" id="prodImage" height="200px;" width="200px" alt="">
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                                        <div class="cart_content_body">
                                            <h1 id="prodH1"></h1>
                                            <p id="prodPrice" style="font-size:27px; font-weight: bold;"></p>
                                            <p id="prodDesc"></p>
                                        </div>
                                        <form id="fupForm" name="form1" method="post">
                                            <div class="cart_content_view">
                                                <div class="row">
                                                    <div class="select_size">
                                                        <div class="col-lg-6 mt-5">

                                                            <select name="product_size" class="select"
                                                                id="product_size">
                                                                <option>select size</option>
                                                                <option>S</option>
                                                                <option>M</option>
                                                                <option>L</option>
                                                                <option>XL</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6 mt-5">
                                                        <select name="product_qty" class="select_quantity"
                                                            id="product_qty">
                                                            <option>select quantity </option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                        </select>
                                                    </div>
                                                    

                                                </div>
                                                <input type="hidden" class="form-control" id="productId" value="" name="productId" />
                                            </div>
                                            <div class="addtocart mt-5">
                                                <button class="btn btn-dark" id="AddtoCart">Add to cart</button>
                                                
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Detal modal end -->
        </div>
    </div>


    <!-- product cart end -->



    <!-- slider card -->
    <div class="slider_product w-100 m-auto mt-5 mb-5" style="background:#e7e8e8">
        <div class="row w-100 m-auto mt-5 mb-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="cd-slider " data-aos="fade-down">
                    <ul>
                        <li class="item current" style="background: #e7e8e8;">
                            <div class="card" style="background: #343535; color: cornsilk;">
                                <!-- <img src="url"> -->
                                <div class="img">
                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                        <path fill="#FFFFFF"
                                            d="M18.21,16.157v-8.21c0-0.756-0.613-1.368-1.368-1.368h-1.368v1.368v1.368v6.841l-1.368,3.421h5.473L18.21,16.157z">
                                        </path>
                                        <path fill="#FFFFFF"
                                            d="M4.527,9.316V7.948V6.579H3.159c-0.756,0-1.368,0.613-1.368,1.368v8.21l-1.368,3.421h5.473l-1.368-3.421V9.316z">
                                        </path>
                                        <path fill="#FFFFFF"
                                            d="M14.766,5.895h0.023V5.21c0-2.644-2.145-4.788-4.789-4.788S5.211,2.566,5.211,5.21v0.685h0.023H14.766zM12.737,3.843c0.378,0,0.684,0.307,0.684,0.684s-0.306,0.684-0.684,0.684c-0.378,0-0.684-0.307-0.684-0.684S12.358,3.843,12.737,3.843z M10,1.448c0.755,0,1.368,0.613,1.368,1.368S10.755,4.185,10,4.185c-0.756,0-1.368-0.613-1.368-1.368S9.244,1.448,10,1.448z">
                                        </path>
                                        <path fill="#FFFFFF"
                                            d="M14.789,6.579H5.211v9.578l1.368,1.368h6.841l1.368-1.368V6.579z M12.052,12.052H7.948c-0.378,0-0.684-0.306-0.684-0.684c0-0.378,0.306-0.684,0.684-0.684h4.105c0.378,0,0.684,0.306,0.684,0.684C12.737,11.746,12.431,12.052,12.052,12.052z M12.052,9.316H7.948c-0.378,0-0.684-0.307-0.684-0.684s0.306-0.684,0.684-0.684h4.105c0.378,0,0.684,0.307,0.684,0.684S12.431,9.316,12.052,9.316z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="info">
                                    <h1 class="mt-5">Product Title </h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet dolorem aperiam
                                        eos beatae inventore ad non, sunt quo minima dolor. Voluptatibus quisquam, sunt
                                        officiis a reiciendis ex eaque doloremque consectetur?</p>
                                    <a href="#">Buy Now</a>
                                </div>
                            </div>
                        </li>
                        <li class="item" style="background: #e7e8e8;">
                            <div class="card" style="background: #343535;">
                                <!-- <img src="url"> -->
                                <div class="img">
                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                        <path fill="#FFFFFF"
                                            d="M16.853,8.355V5.888c0-3.015-2.467-5.482-5.482-5.482H8.629c-3.015,0-5.482,2.467-5.482,5.482v2.467l-2.741,7.127c0,1.371,4.295,4.112,9.594,4.112s9.594-2.741,9.594-4.112L16.853,8.355z M5.888,17.367c-0.284,0-0.514-0.23-0.514-0.514c0-0.284,0.23-0.514,0.514-0.514c0.284,0,0.514,0.23,0.514,0.514C6.402,17.137,6.173,17.367,5.888,17.367z M5.203,10c0-0.377,0.19-0.928,0.423-1.225c0,0,0.651-0.831,1.976-0.831c0.672,0,1.141,0.309,1.141,0.309C9.057,8.46,9.315,8.938,9.315,9.315v1.028c0,0.188-0.308,0.343-0.685,0.343H5.888C5.511,10.685,5.203,10.377,5.203,10z M7.944,16.853H7.259v-1.371l0.685-0.685V16.853z M9.657,16.853H8.629v-2.741h1.028V16.853zM8.972,13.426v-1.028c0-0.568,0.46-1.028,1.028-1.028c0.568,0,1.028,0.46,1.028,1.028v1.028H8.972z M11.371,16.853h-1.028v-2.741h1.028V16.853z M12.741,16.853h-0.685v-2.056l0.685,0.685V16.853z M14.112,17.367c-0.284,0-0.514-0.23-0.514-0.514c0-0.284,0.23-0.514,0.514-0.514c0.284,0,0.514,0.23,0.514,0.514C14.626,17.137,14.396,17.367,14.112,17.367z M14.112,10.685h-2.741c-0.377,0-0.685-0.154-0.685-0.343V9.315c0-0.377,0.258-0.855,0.572-1.062c0,0,0.469-0.309,1.141-0.309c1.325,0,1.976,0.831,1.976,0.831c0.232,0.297,0.423,0.848,0.423,1.225S14.489,10.685,14.112,10.685z M18.347,15.801c-0.041,0.016-0.083,0.023-0.124,0.023c-0.137,0-0.267-0.083-0.319-0.218l-2.492-6.401c-0.659-1.647-1.474-2.289-2.905-2.289c-0.95,0-1.746,0.589-1.754,0.595c-0.422,0.317-1.084,0.316-1.507,0C9.239,7.505,8.435,6.916,7.492,6.916c-1.431,0-2.246,0.642-2.906,2.292l-2.491,6.398c-0.069,0.176-0.268,0.264-0.443,0.195c-0.176-0.068-0.264-0.267-0.195-0.444l2.492-6.401c0.765-1.911,1.824-2.726,3.543-2.726c1.176,0,2.125,0.702,2.165,0.731c0.179,0.135,0.506,0.135,0.685,0c0.04-0.029,0.99-0.731,2.165-0.731c1.719,0,2.779,0.814,3.542,2.723l2.493,6.404C18.611,15.534,18.524,15.733,18.347,15.801z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="info">
                                    <h1 class="mt-5">Product Title </h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, magni, corporis
                                        perferendis sit libero ducimus fuga cupiditate officiis dolore deserunt at.
                                        Adipisci iste sint repellat eos optio, nulla doloremque vitae.</p>
                                    <a href="#">Buy Now</a>
                                </div>
                            </div>
                        </li>
                        <li class="item" style="background: #e7e8e8">
                            <div class="card" style="background: #343535">
                                <!-- <img src="url"> -->
                                <div class="img">
                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                        <path fill="#FFFFFF"
                                            d="M5.177,17.658c0,0,3.445,1.987,4.823,1.987c2.067,0,4.823-1.987,4.823-1.987c0.024-0.025,0.044-0.054,0.068-0.08H5.109C5.133,17.604,5.153,17.633,5.177,17.658z M8.622,1.583V0.531C6.496,0.973,2.539,2.521,1.376,7.933H0.699c-0.189,0-0.344,0.155-0.344,0.344v1.378C0.354,9.845,0.509,10,0.699,10h0.392c-0.016,0.224-0.026,0.454-0.033,0.689H0.699c-0.189,0-0.344,0.155-0.344,0.344v1.378c0,0.189,0.155,0.344,0.344,0.344h0.439c0.089,0.79,0.262,1.804,0.594,2.849v2.663H4.34c-2.233-2.449-2.264-6.822-2.264-7.01C2.077,4.052,6.353,2.108,8.622,1.583zM10.689,0.354H9.311v2.059h1.378V0.354z M11.378,2.63v0.472H8.622V2.63C6.612,3.147,3.11,4.951,3.11,11.258c0,0,0.004,3.373,1.47,5.632h4.042v-0.689h2.756v0.689h4.042c1.466-2.259,1.47-5.632,1.47-5.632C16.89,4.951,13.388,3.147,11.378,2.63z M5.005,12.035c-0.318-0.364-0.517-0.833-0.517-1.354S4.687,9.69,5.005,9.327V12.035zM6.383,10.026c-0.295,0.078-0.517,0.335-0.517,0.654c0,0.319,0.222,0.576,0.517,0.654v1.395c-0.384-0.032-0.738-0.163-1.033-0.377V9.008c0.296-0.214,0.649-0.345,1.033-0.377V10.026z M7.761,12.353c-0.296,0.214-0.649,0.345-1.033,0.377v-1.395C7.022,11.257,7.244,11,7.244,10.681c0-0.319-0.222-0.576-0.517-0.654V8.631c0.384,0.032,0.738,0.163,1.033,0.377V12.353zM8.105,12.035V9.327c0.318,0.363,0.517,0.833,0.517,1.354S8.423,11.671,8.105,12.035z M10,13.445l-1.378,0.689L10,12.756l1.378,1.378L10,13.445z M11.895,12.035c-0.318-0.364-0.517-0.833-0.517-1.354s0.199-0.991,0.517-1.354V12.035z M13.273,10.026c-0.295,0.078-0.517,0.335-0.517,0.654c0,0.319,0.222,0.576,0.517,0.654v1.395c-0.384-0.032-0.738-0.163-1.033-0.377V9.008c0.296-0.214,0.649-0.345,1.033-0.377V10.026z M14.651,12.353c-0.296,0.214-0.649,0.345-1.033,0.377v-1.395c0.295-0.078,0.517-0.335,0.517-0.654c0-0.319-0.222-0.576-0.517-0.654V8.631c0.384,0.032,0.738,0.163,1.033,0.377V12.353zM14.995,12.035V9.327c0.318,0.363,0.517,0.833,0.517,1.354S15.313,11.671,14.995,12.035z M19.646,9.656V8.278c0-0.189-0.155-0.344-0.344-0.344h-0.678c-1.163-5.413-5.12-6.96-7.246-7.402v1.052c2.269,0.525,6.545,2.469,6.545,9.675c0,0.188-0.031,4.561-2.264,7.01h2.608v-2.663c0.333-1.044,0.505-2.058,0.594-2.849h0.439c0.189,0,0.344-0.155,0.344-0.344v-1.378c0-0.189-0.155-0.344-0.344-0.344h-0.359c-0.007-0.235-0.017-0.465-0.033-0.689h0.392C19.491,10,19.646,9.845,19.646,9.656z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="info">
                                    <h1 class="mt-5">Product Title </h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum harum enim
                                        cumque, dolore repellat quidem, qui eligendi ipsa mollitia, laborum quo animi
                                        eaque eius rem odit, quas eum. Praesentium, perferendis.</p>
                                    <a href="#">Buy Now</a>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <nav>
                        <a href="#" class="prev">
                            <svg viewBox="0 0 20 20">
                                <path fill="#FFFFFF" stroke-width="0"
                                    d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="next">
                            <svg viewBox="0 0 20 20">
                                <path fill="#FFFFFF" stroke-width="0"
                                    d="M11.611,10.049l-4.76-4.873c-0.303-0.31-0.297-0.804,0.012-1.105c0.309-0.304,0.803-0.293,1.105,0.012l5.306,5.433c0.304,0.31,0.296,0.805-0.012,1.105L7.83,15.928c-0.152,0.148-0.35,0.223-0.547,0.223c-0.203,0-0.406-0.08-0.559-0.236c-0.303-0.309-0.295-0.803,0.012-1.104L11.611,10.049z">
                                </path>
                            </svg>
                        </a>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            $('.pdtModal').on('click', function(e){
                e.preventDefault();
                var prodId = $(this).attr('prodId');
                $.ajax({
                    url: "core/actions.php",
                    type: "POST",
                    data: {
                        showModalData:prodId
                    },
                    cache: false,
                    success: function (val) {
                        val = JSON.parse(val);
                        console.log(val[0]);
                        $('#prodH1').html(val['name']);
                        $('#prodPrice').html('$'+val['price']);
                        $('#prodDesc').html(val['discription']);
                        $('#productId').attr('value', val['id']);
                        $('#prodImage').attr('src', 'admin/uploads/'+val['image']);
                        $('#myModal').modal('toggle');
                        

                    }
                });
            })

            $('#AddtoCart').on('click', function () {
                $("#AddtoCart").attr("disabled", "disabled");
                var productId = $('#productId').val();
                var product_size = $('#product_size').val();
                var product_qty = $('#product_qty').val();
                $.ajax({
                    url: "core/actions.php",
                    type: "POST",
                    data: {
                        product_size: product_size,
                        product_qty: product_qty,
                        productId: productId
                    },
                    cache: false,
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                            alert("Product Already Added!");
                            setTimeout(function () {
                                location.reload();
                            }, 500);

                        } else {
                            alert("Product Added!");
                            setTimeout(function () {
                                location.replace('cart.php');
                            }, 500);

                        }

                    }
                });
            });
        });
    </script>
    <!-- slider card end -->
    <?php include "includes/footer.php"?>