<?php

include_once('../libraries/configs.php');

if(isset($_POST['security']) && $_POST['security'] == 2)
{

if($_FILES['picture']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['picture']['type'] == "image/jpeg"
            || $_FILES['picture']['type'] == "image/png"
            || $_FILES['picture']['type'] == "image/gif"){
            // là file ảnh
            // Tiến hành code upload
            if($_FILES['picture']['size'] > 5048576){
                header('location: quanly.php?page=add_partner&error=out_of_range');
            }else{
                // file hợp lệ, tiến hành upload
                $path = "../public/images/partner/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['picture']['tmp_name'];
                $name = $_FILES['picture']['name'];
                $type = $_FILES['picture']['type'];
                $size = $_FILES['picture']['size'];
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);

            }
        }else{
            // không phải file ảnh
            header('location: quanly.php?add_partner&error=invalid_file_format');
        }
    }else{
        $name = $_POST['hpc'];
    }

	$id = $_POST['id'];
	   $name_r = $_POST['name'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $description = $_POST['description'];
   $show = $_POST['rdo'];
   $picture = $name;

$pdo->query("UPDATE partners SET pa_Name='$name_r',pa_Address='$address',pa_Phone='$phone',pa_Email='$email',pa_Picture='$picture',pa_Description='$description',pa_IsShow='$show' WHERE pa_Id='$id'");

header('location: quanly.php?page=partners&action=success');
}

?>