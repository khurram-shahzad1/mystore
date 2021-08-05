<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    

    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="assets/css/signinstyle.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 pt-5">
        <div class="card mx-auto border-0">
          <div class="card-header border-bottom-0 bg-transparent">
            <ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active text-primary" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login"
                   aria-selected="true">Login</a>
              </li>
      
              <li class="nav-item">
                <a class="nav-link text-primary" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register"
                   aria-selected="false">Register</a>
              </li>
            </ul>
          </div>
      
          <div class="card-body pb-4">
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                <form id="signInForm" method="post">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                  </div>
      
                  <div class="form-group">
                    <input type="password" name="password" class="form-control"  id="password" placeholder="Password" required>
                  </div>
      
                  <div class="form-group">
                <label><input type="radio" name="user_type" checked value="user">Login As user</label>
            </div>
            <div class="form-group">
                <label><input type="radio" name="user_type" value="admin">Login As Admin</label>
            </div>
            <input type="hidden" name="signInForm" value="1">
      
                  <div class="text-center pt-4">
                    <button type="submit" id="submit" class="btn btn-primary">Login</button>
                  </div>
      
                  
                </form>
              </div>
      
              <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                <form id="signUpForm" method="post">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Username" >
                  </div>
      
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" >
                  </div>
      
                  <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Set a password" >
                  </div>

                  <div class="form-group">
                    <input type="number" name="age" class="form-control" placeholder="Your Age" >
                  </div>

                  <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Your address">
                  </div>
      
                  
                  <div class="form-group">
                    <label><input type="radio" checked name="user_type" value="user">SignUp As user</label>
                  </div>
                  <input type="hidden" name="signUpForm" value="1">
                  <div class="text-center pt-2 pb-1">
                    <button type="submit" id="submit" class="btn btn-primary">Register</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(function () {
            $('#signUpForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: $('#signUpForm').serialize(),
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                          alert("Error");
                        } else {
                            setTimeout(function () {
                                location.replace('index.php');
                            }, 500);
                        }
                    }
                });

            });
        })

        $(function () {
            $('#signInForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'core/actions.php',
                    data: $('#signInForm').serialize(),
                    success: function (val) {
                        console.log(val);
                        if (val == "0" || val == "") {
                            alert("Error");
                        } else {
                            if (val == "admin") {

                                setTimeout(function () {
                                    location.replace('admin/index.php');
                                }, 500);
                            } else {

                                setTimeout(function () {
                                    location.replace('shop.php);
                                }, 500);
                            }



                        }
                    }
                });

            });
        })
    </script>
</body>
</html>