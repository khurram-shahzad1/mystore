<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Playfair+Display&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Playfair+Display:ital@1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/cart.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        .cart_detail
        {
            margin-top: 0px;
            padding: 50px;
           background: white;
        }
        .cart_body
        {
            background: #ffffff;
            padding: 30px;
        }
    </style>
</head>
<body>

    <div class="main_header ">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

<!--  Show this only on mobile to medium screens  -->
<a class="navbar-brand d-lg-none" href="#"><img src="image/logo1.png" alt=""></a>

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
    <a class="navbar-brand d-none d-lg-block" href="#"><img src="assets/image/logo.png" class="" alt=""></a>

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

      
    </div>
    
    <!-- ============================== -->
    <!-- Detail Cart -->
    <?php
include 'assets/db.php';
if(isset($_GET['prodid'])){
    $prodid = $_GET['prodid'];
    $sql = "SELECT * FROM products WHERE id = '$prodid'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
 
    }
?>
  <!-- Modal -->
 <div class="cart_detail">
    <div class="row w-75 m-auto" class="cart_body"  style="background: #e7e8e8; padding: 50px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="cart_content">
              <div class="row">
                  <div class="col-lg-5">
                      <h1>Image</h1>
                      <img class="img-responsive" src="admin/uploads/<?php echo $data['image'] ?>" height="200px;" >
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                    <div class="cart_content_body">
                        <h1><?php echo $data['name']?></h1>
                        <p style="font-size:27px; font-weight: bold;"><?php echo $data['price'] ?>$</p>
                        <p><?php echo $data['discription'] ?></p>
                    </div>
                    <form id="fupForm" name="form1" method="post">
                    <div class="cart_content_view">
                        <div class="row">
                  <div class="select_size">
                    <div class="col-lg-6 mt-5">
                   
                        <select name="product_size" class="select" id="product_size" >
                            <option>select size</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                        </select>
                  </div>
          
                  </div>
                  <div class="col-lg-6 mt-5">
                    <select name="product_qty" class="select_quantity" id="product_qty">
                        <option>select quantity </option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                   </div>
                   <input type="hidden" class="form-control" id="productId" value="<?php echo $data['id']; ?>"  name="productId">
                            
                        </div>
                       
                    </div>
                    <div class="addtocart mt-5">
                        <button class="btn btn-dark" name="save"  id="AddtoCart">Add to cart</button>
                    </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
 </div>
<!-- Detal modal end -->

    <!-- ============================= -->
 <!-- =========================================
Footer section 
======================================= -->
    <footer id="aa-footer" data-aos="fade-right" data-aos-offset="500" data-aos-easing="ease-in-sine">
        <!-- footer bottom -->
        <div class="aa-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-top-area">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <h3>Main Menu</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Our Services</a></li>
                                            <li><a href="#">Our Products</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Knowledge Base</h3>
                                            <ul class="aa-footer-nav">
                                                <li><a href="#">Delivery</a></li>
                                                <li><a href="#">Returns</a></li>
                                                <li><a href="#">Services</a></li>
                                                <li><a href="#">Discount</a></li>
                                                <li><a href="#">Special Offer</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Useful Links</h3>
                                            <ul class="aa-footer-nav">
                                                <li><a href="#">Site Map</a></li>
                                                <li><a href="#">Search</a></li>
                                                <li><a href="#">Advanced Search</a></li>
                                                <li><a href="#">Suppliers</a></li>
                                                <li><a href="#">FAQ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Contact Us</h3>
                                            <address>
                                                <p> 25 Astor Pl, NY 10003, USA</p>
                                                <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                                                <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                                            </address>
                                            <div class="aa-footer-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-twitter"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                                <a href="#"><span class="fa fa-youtube"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom -->
        <div class="aa-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-bottom-area">
                            <p>Designed by <a href="http://www.markups.io/">Arzung@2020</a></p>
                            <div class="aa-footer-payment">
                                <span class="fa fa-cc-mastercard"></span>
                                <span class="fa fa-cc-visa"></span>
                                <span class="fa fa-paypal"></span>
                                <span class="fa fa-cc-discover"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->



    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        $(function () {

            $(".prev").on('click', function (event) {
                event.preventDefault();
                prevSlide();
            });

            $(".next").on('click', function (event) {
                event.preventDefault();
                nextSlide();
            });

            if ($(".item").length <= 1) {
                $(".next").addClass('hide-nav');
            }

            $(".prev").addClass('hide-nav');

            function nextSlide() {
                var atual = $(".cd-slider").find('.current'),
                    next = atual.next();

                next.addClass('current').removeClass('prev_slide').siblings().removeClass('current');
                next.prevAll().addClass('prev_slide');

                if (next.index() > 0) {
                    $(".prev").removeClass('hide-nav');
                }
                if (next.index() == $(".item").last().index()) {
                    $(".next").addClass('hide-nav');
                }
            }

            function prevSlide() {
                var atual = $(".cd-slider").find('.current'),
                    prev = atual.prev();

                prev.addClass('current').removeClass('prev_slide').siblings().removeClass('current');

                if (prev.index() !== $(".item").last().index()) {
                    $(".next").removeClass('hide-nav');
                }
                if (prev.index() == 0) {
                    $(".prev").addClass('hide-nav');
                }
            }

        });
        $(document).ready(function() {
	$('#AddtoCart').on('click', function() {
		$("#AddtoCart").attr("disabled", "disabled");
		var product_size = $('#product_size').val();
		var product_qty = $('#product_qty').val();
            var productId = $('#productId').val();
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
							alert("Error occured !");				
					}
					else{
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
</body>
</html>