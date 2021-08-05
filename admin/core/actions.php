<?php 
include '../../assets/db.php';
   

if (isset($_GET['signout'])) {
    setcookie ("admin_id", "", time() - 3600, '/');
    header("Location: ../../index.php");
}

if($_POST) {
    $valid = array('success' => false, 'messages' => array());

    $name = $_POST['name'];
    $discription = $_POST['discription'];
    $category = $_POST['category'];
	$price = $_POST['price'];
	$Orginal_price = $_POST['orginalprice'];

	$type = explode('.', $_FILES['userImage']['name']);
	$type = $type[count($type) - 1];
	$url = '../uploads/' . uniqid(rand()) . '.' . $type;

	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
		if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
			if(move_uploaded_file($_FILES['userImage']['tmp_name'], $url)) {

				// insert into database
				$sql = "INSERT INTO products (cat_id,name,discription,image,orginal_price,price) VALUES ('$category','$name','$discription','$url','$Orginal_price','$price')";

				if($GLOBALS['conn']->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Uploaded";
				} 
				else {
					$valid['success'] = false;
					$valid['messages'] = "Error while uploading";
				}

				$GLOBALS['conn']->close();

			}
			else {
				$valid['success'] = false;
				$valid['messages'] = "Error while uploading";
			}
		}
	}

	echo json_encode($valid);

	// upload the file 
}

?>