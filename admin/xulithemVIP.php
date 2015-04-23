<?php

require_once('../libraries/configs.php');

if(isset($_POST['security']) && $_POST['security'] == 1)
{
	if($_FILES['picture']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['picture']['type'] == "image/jpeg"
            || $_FILES['picture']['type'] == "image/png"
            || $_FILES['picture']['type'] == "image/gif"){
            // là file ảnh
            // Tiến hành code upload
            if($_FILES['picture']['size'] > 5048576){
                header('location: quanly.php?page=add_vip&error=out_of_range');
            }else{
                // file hợp lệ, tiến hành upload
                $path = "../public/images/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['picture']['tmp_name'];
                $name = $_FILES['picture']['name'];
                $type = $_FILES['picture']['type'];
                $size = $_FILES['picture']['size'];
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);

$pdo->query("INSERT INTO vip(vi_Name,vi_Position,vi_Picture,vi_IsShow) VALUES('".$_POST['name']."','".$_POST['address']."','$name','".$_POST['rdo']."')");

header('location: quanly.php?page=vip&action=success');


            }
        }else{
            // không phải file ảnh
            header('location: quanly.php?add_vip&error=invalid_file_format');
        }
    }else{
        header('location: quanly.php?page=add_vip&error=no_image');
    }

}

?>