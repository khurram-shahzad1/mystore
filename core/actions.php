<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('Etc/UTC');

// require '/var/www/etorotradeforex.com/trade/assets/api/PHPMailer/vendor/';
include 'connection.php';
require 'PHPMailer/vendor/autoload.php';
// require 'twilio/twilioActions.php';
 require '../assets/db.php';


if (isset($_POST['signUpForm'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $user=$_POST['user_type'];

    if ($name==""|| $email==""|| $password==""|| $user==""|| $age==""|| $address=="") {
        echo 0;
    }

    else {
        $sql="INSERT into `users` (name,email,password,age,address,user_type) VALUES ('$name','$email' , '$password', '$age' , '$address','$user')";

        $query=mysqli_query($GLOBALS['conn'], $sql);

        if ($query) {
            $mail = new PHPMailer(true);
                try {
                    //Server settings
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'ks5745463@gmail.com';                     // SMTP username
                    $mail->Password   = 'Khurram5565';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('ks5745463@gmail.com', 'SignUp');
                    $mail->addAddress($email, $name);     // Add a recipient
                    $mail->addReplyTo('ks5745463@gmail.com', 'SignUp');

                    // Attachments
                    $mail->addAttachment('PHPMailer/vendor/post1.jpg');         // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = "SignUp Confirmed";
                    $mail->Body    = " $name Your SignUp confirmed. Thank you for SignUp To our Site.";
                    $mail->send();

                    // twilioSMS($phone, "Your booking confirmed for $service. Thank you for choosing us.");
                    // return 1;
                    echo "1";
                } catch (Exception $e) {
                    return 0;
                }
        }

        else {
            echo 0;
        }
    }
}

if (isset($_POST['signInForm'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $user=$_POST['user_type'];

    if ($email==""|| $password==""|| $user=="") {
        echo "0";
    }

    else {
        if ($user=="user") {
            $sql="SELECT * FROM `users` WHERE email = '$email' AND `password` = '$password' AND user_type = '$user'";

            $query=mysqli_query($GLOBALS['conn'], $sql);

            if (mysqli_num_rows($query) > 0) {

                $data=mysqli_fetch_array($query);

                setcookie("user_id", $data['id'], time() + (86400 * 3), '/');

                echo $data['id'];

            }

            else {
                echo "0";
            }
        }

        else {
            $sql="SELECT * FROM `users` WHERE email = '$email' AND `password` = '$password' AND user_type = '$user'";

            $query=mysqli_query($GLOBALS['conn'], $sql);

            if (mysqli_num_rows($query) > 0) {

                $data=mysqli_fetch_array($query);

                setcookie("admin_id", $data['id'], time() + (86400 * 3), '/');

                echo "admin";

            }

            else {
                echo "0";
            }

        }
    }
}

if (isset($_GET['signout'])) {

    setcookie("user_id", "", time() - 3600, '/');

    header("Location: ../index.php");
}

if (isset($_POST['removefromcart'])) {
    $removeId=$_POST['removeId'];
    $del=mysqli_query($GLOBALS['conn'], "DELETE FROM cart WHERE id = '$removeId'");

    if ($del=='1') {
        echo '1';
    }

    else {
        echo mysqli_error($GLOBALS['conn']);
    }
}

if (isset($_POST['signUp'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $user=$_POST['user_type'];

    if ($name==""|| $email==""|| $password==""|| $user==""|| $age==""|| $address=="") {
        echo 0;
    }

    else {
        $sql="INSERT into `users` (name,email,password,age,address,user_type) VALUES ('$name','$email' , '$password', '$age' , '$address','$user')";

        $query=mysqli_query($GLOBALS['conn'], $sql);

        if ($query) {
            echo 1;
        }

        else {
            echo 0;
        }
    }
}

if(isset($_POST['delUser'])) {
    $uid=$_POST['delUser'];
    echo mysqli_query($conn, "DELETE FROM users WHERE id = '$uid'");
}

if(isset($_POST['delProd'])) {
    $pid=$_POST['delProd'];
    echo mysqli_query($conn, "DELETE FROM products WHERE id = '$pid'");
}

if(isset($_POST['delCat'])) {
    $cid=$_POST['delCat'];
    echo mysqli_query($conn, "DELETE FROM categories WHERE id = '$cid'");
}

if(isset($_POST['addCategory'])) {
    $category=$_POST['category'];


    if($category=="") {
        echo 0;
    }

    else {
        $sql="INSERT into `categories` (`name`) VALUES ('$category')";

        $query=mysqli_query($GLOBALS['conn'], $sql);

        if($query) {
            echo 1;
        }

        else {
            echo 0;
        }
    }
}

if (isset($_POST['showModalData'])) {
    $prodId=$_POST['showModalData'];
    $query=mysqli_query($GLOBALS['conn'], "SELECT * FROM products WHERE id = '$prodId'");
    $fetch=mysqli_fetch_array($query);
    echo json_encode($fetch);
}

if(isset($_POST['productId'])) {
    $prodId=$_POST['productId'];
    $userId=$_COOKIE['user_id'];
    $product_qty=$_POST['product_qty'];
    $product_size=$_POST['product_size'];

    if(isset($_COOKIE['user_id'])) {
        $sql="SELECT * FROM cart WHERE product_id = '$prodId' AND user_id = '$userId' AND size = '$product_size'";
        $run_query=mysqli_query($GLOBALS['conn'], $sql);
        $count=mysqli_num_rows($run_query);
        echo $count;
        if($count > 0) {
            $data = mysqli_fetch_array($run_query)['qty'];
            $product_qty2 = $product_qty + $data;
            $sqlUp = "UPDATE cart SET qty = '$product_qty2' WHERE product_id = '$prodId' AND user_id = '$userId' AND size = '$product_size'";
            $queryUp = mysqli_query($GLOBALS['conn'], $sqlUp);
            if ($queryUp) {
                echo 1; 
            }else{
                echo mysqli_error($GLOBALS['conn']);
            }
        }
        else {
            $sql="INSERT INTO cart (product_id, user_id, qty,size) VALUES ('$prodId','$userId','$product_qty','$product_size')";

            if(mysqli_query($GLOBALS['conn'], $sql)) {
                echo "1";
            }
        }
    }

    
}

if(isset($_POST['editmail'])){
    $uid = $_POST["editmail"];
    $newVal = $_POST['newval'];
    
    if($newVal == ""){
        echo 0;
    }
    else {
        $sql = "UPDATE `users` SET  email = '$newVal' WHERE id  = '$uid' ";
        
        $query = mysqli_query($conn , $sql);

        if($query){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}

if(isset($_POST['editpass'])){
    $uid = $_POST["editpass"];
    $newVal = $_POST['newval'];
    
    if($newVal == ""){
        echo 0;
    }
    else {
        $sql = "UPDATE `users` SET  `password` = '$newVal' WHERE id  = '$uid' ";
        
        $query = mysqli_query($conn , $sql);

        if($query){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
if(isset($_POST['editage'])){
    $uid = $_POST["editage"];
    $newVal = $_POST['newval'];
    
    if($newVal == ""){
        echo 0;
    }
    else {
        $sql = "UPDATE `users` SET  age = '$newVal' WHERE id  = '$uid' ";
        
        $query = mysqli_query($conn , $sql);

        if($query){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
if(isset($_POST['editaddress'])){
    $uid = $_POST["editaddress"];
    $newVal = $_POST['newval'];
    
    if($newVal == ""){
        echo 0;
    }
    else {
        $sql = "UPDATE `users` SET  `address` = '$newVal' WHERE id  = '$uid' ";
        
        $query = mysqli_query($conn , $sql);

        if($query){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
if(isset($_POST['editname'])){
    $uid = $_POST["editname"];
    $newVal = $_POST['newval'];
    
    if($newVal == ""){
        echo 0;
    }
    else {
        $sql = "UPDATE `users` SET  `name` = '$newVal' WHERE id  = '$uid' ";
        
        $query = mysqli_query($conn , $sql);

        if($query){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
if(isset($_POST['edittype'])){
    $uid = $_POST["edittype"];
    $newVal = $_POST['newval'];
    
    if($newVal == ""){
        echo 0;
    }
    else {
        $sql = "UPDATE `users` SET  `user_type` = '$newVal' WHERE id  = '$uid' ";
        
        $query = mysqli_query($conn , $sql);

        if($query){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
if(isset($_POST['editcat'])){
    $uid = $_POST["editcat"];
    $newVal = $_POST['newval'];
    
    if($newVal == ""){
        echo 0;
    }
    else {
        $sql = "UPDATE `categories` SET  `name` = '$newVal' WHERE id  = '$uid' ";
        
        $query = mysqli_query($conn , $sql);

        if($query){
            echo 1;
        }
        else{
            echo 0;
        }
    }
}
if(isset($_POST['order'])){
    $uid = $_POST['order'];
    $status = $_POST['status'];
    $sql ="UPDATE orders SET  `order_status` = '$status' WHERE id = '$uid'";
    $query = mysqli_query($GLOBALS['conn'], $sql);

    if ($query) {
        echo 1;
    }else{
        echo 0;
    }

}