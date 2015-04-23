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
                header('location: quanly.php?page=edit_vip&id='.$_POST['id'].'&error=out_of_range');
            }else{
                // file hợp lệ, tiến hành upload
                $path = "../public/images/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['picture']['tmp_name'];
                $name = $_FILES['picture']['name'];
                $type = $_FILES['picture']['type'];
                $size = $_FILES['picture']['size'];
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);




            }
        }else{
            // không phải file ảnh
            header('location: quanly.php?edit_vip&id='.$_POST['id'].'&error=invalid_file_format');
        }
    }else{
        $name = $_POST['hpc'];
    }
$pdo->query("UPDATE vip SET vi_Name='".$_POST['name']."',vi_Position='".$_POST['address']."',vi_Picture='$name',vi_IsShow='".$_POST['rdo']."' WHERE vi_Id='".$_POST['id']."'");

header('location: quanly.php?page=vip&action=success');
}

?>