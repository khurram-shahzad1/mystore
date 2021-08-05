
    <?php
include 'assets/db.php';

?>
    <?php
    
    $userId=$_COOKIE['user_id'];
    $status = "pending";




$select_cart = "select * from cart where user_id='$userId'";

$run_cart = mysqli_query($GLOBALS['conn'],$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['product_id'];
    
    $pro_qty = $row_cart['qty'];
    
    $pro_size = $row_cart['size'];
    
    $get_products = "select * from products where id='$pro_id'";
    
    $run_products = mysqli_query($GLOBALS['conn'],$get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $sub_total = $row_products['price']*$pro_qty;
        
        $insert_customer_order = "insert into orders (user_id,amount,qty,size,order_date,order_status) values ('$userId','$sub_total','$pro_qty','$pro_size',NOW(),'$status')";
        
        $run_customer_order = mysqli_query($GLOBALS['conn'],$insert_customer_order);
        
        $delete_cart = "delete from cart where user_id='$userId'";
        
        $run_delete = mysqli_query($GLOBALS['conn'],$delete_cart);

    }
    
}
if ($run_customer_order || $run_delete) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($GLOBALS['conn']);
?>
