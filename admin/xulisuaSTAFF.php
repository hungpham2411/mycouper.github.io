<?php

include_once('../libraries/configs.php');
session_start();
$error = "";

if(isset($_POST['security']) && $_POST['security'] == 2)
{

	if($_FILES['picture']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['picture']['type'] == "image/jpeg"
            || $_FILES['picture']['type'] == "image/png"
            || $_FILES['picture']['type'] == "image/gif" 
			|| $_FILES['picture']['type'] == "image/GIF" 
			|| $_FILES['picture']['type'] == "image/PNG" 
			|| $_FILES['picture']['type'] == "image/JPG" 
			|| $_FILES['picture']['type'] == "image/JPEG"){
            // là file ảnh
            // Tiến hành code upload
            if($_FILES['picture']['size'] > 2048576){
                header('location: quanly.php?page=edit_staff&error=out_of_range');
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
            $error = "Kiểu file không hợp lệ";
        }
    }else{
        $name = $_POST['hpc'];
    }
    
   $id = $_POST['id'];
   $name_r = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $position = $_POST['position'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $image = $name;
   $address = $_POST['address'];
   


$query = mysqli_query($connection,"SELECT ad_Username FROM admins WHERE ad_Username='$username' AND ad_Id !='$id'");
   $rows = mysqli_num_rows($query);
   if ($rows == 1) {
        header('location: quanly.php?page=edit_staff&error=exist&id='.$id.'');
   } else {
        $pdo->query("UPDATE admins SET ad_Name='$name_r',ad_Picture='$image',ad_Address='$address',ad_Phone='$phone',ad_Email='$email',ad_Username='$username',ad_Password='$password',ad_Permission='$position' WHERE ad_Id='$id'");
header('location: quanly.php?page=staff&action=success');
   }

}

?>