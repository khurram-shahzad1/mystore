<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cart</title>
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
  <section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table">
              <form action="">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Remove</th>
                        <th>Product Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                             include 'assets/db.php';
                             $userId = $_COOKIE['user_id'];
                             $sql = "SELECT * FROM cart WHERE user_id = '$userId' ";
                             $run_cart = mysqli_query($GLOBALS['conn'], $sql);
                             $count = mysqli_num_rows($run_cart);
                             ?>

                      <?php 
                              $total = 0;
                              while($row_cart = mysqli_fetch_array($run_cart)){
                               $pro_id = $row_cart['product_id'];
                                  
                               $pro_size = $row_cart['size'];
                                 
                               $pro_qty = $row_cart['qty'];
                              
                               $run_products =mysqli_query($GLOBALS['conn'], "SELECT * FROM products WHERE id='$pro_id'");
                               while($row_products = mysqli_fetch_array($run_products)){
                               $product_title = $row_products['name'];
                                      
                                      $product_img1 = $row_products['image'];
                                      
                                      $only_price = $row_products['price'];
                                     
                                      $sub_total = $only_price*$pro_qty;

                                      $total += $sub_total;

                                       ?>
                      <tr>
                        <td><a class="removefromcart"  removeId="<?php echo $row_cart['id']; ?>" >
                            <fa class="fa fa-close"></fa>
                          </a></td>
                        <td><a href="#"><img src="admin/uploads/<?php echo $product_img1; ?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#"><?php echo $product_title; ?></a></td>
                        <td>$<?php echo $only_price; ?></td>
                        <td><?php echo $pro_qty; ?></td>
                        <td><?php echo $pro_size; ?></td>
                        <td>$<?php echo $sub_total; ?></td>
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </form>
              <!-- Cart Total view -->
              <div class="cart-view-total">
                <h4>Cart Totals</h4>
                <table class="aa-totals-table">
                  <tbody>
                    <tr>
                      <th>Total</th>
                      <td>$<?php echo $total; ?></td>
                    </tr>
                  </tbody>
                </table><br><br>
                <button class="btn btn-dark" name="save"  id="Order">Proced to Checkout</button>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Cart view section -->



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

    $(function () {
            $('.removefromcart').on('click', function (e) {
              if(confirm("Do you really want to remove this product?")){
                e.preventDefault();
                var ele = $(this);
                var removeId = $(this).attr('removeId');
                console.log(removeId);
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: {
                        removefromcart: 1,
                        removeId: removeId
                    },
                    success: function (val) {
                        if (val == 1) {
                            location.reload();
                        }
                    }
                });
              }
            });
        })
        $(document).ready(function() {
	$('#Order').on('click', function() {
    if(confirm("Confirm your order please!")){
		$("#Order").attr("disabled", "disabled");
		
		
			$.ajax({
				url: "orders.php",
				type: "POST",
				data: {

				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						alert("Your orders has been submitted, Thanks!");
            location.replace("myorders.php");						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
				}
			});
    }
	});
});

  </script>
</body>

</html>