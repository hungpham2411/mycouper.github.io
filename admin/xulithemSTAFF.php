<?php

include_once('../libraries/configs.php');
$name = "";

if(isset($_POST['position']))
{

if($_FILES['picture']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['picture']['type'] == "image/jpeg"
            || $_FILES['picture']['type'] == "image/png"
            || $_FILES['picture']['type'] == "image/gif" 
			|| $_FILES['picture']['type'] == "image/JPG" 
			|| $_FILES['picture']['type'] == "image/GIF" 
			|| $_FILES['picture']['type'] == "image/PNG"){
            // là file ảnh
            // Tiến hành code upload
            if($_FILES['picture']['size'] > 2048576){
                header('location: quanly.php?page=add_staff&error=out_of_range');
            }else{
                // file hợp lệ, tiến hành upload
                $path = "images/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['picture']['tmp_name'];
                $name = $_FILES['picture']['name'];
                $type = $_FILES['picture']['type'];
                $size = $_FILES['picture']['size'];
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);
    
  


        }
        }else{
            // không phải file ảnh
                header('location: quanly.php?page=add_staff&error=invalid_file_format');
        }
    }else{
                $name="no-avatar.png";
    }
     $name_r = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $position = $_POST['position'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $image = $name;
   $address = $_POST['address'];
   
   $query = mysqli_query($connection,"SELECT ad_Username FROM admins WHERE ad_Username='$username'");
   $rows = mysqli_num_rows($query);
   if ($rows == 1) {
        header('location: quanly.php?page=add_staff&error=exist');
   } else {
        $pdo->query("INSERT INTO admins(ad_Name,ad_Picture,ad_Address,ad_Phone,ad_Email,ad_Username,ad_Password,ad_Permission) VALUES('$name_r','$image','$address','$phone','$email','$username','$password','$position')");
		header('location: quanly.php?page=staff&action=success');
   }
}

?>