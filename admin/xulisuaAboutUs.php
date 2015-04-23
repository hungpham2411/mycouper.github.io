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
            if($_FILES['picture']['size'] > 1048576){
                header('location: quanly.php?page=about_us&error=out_of_range');
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
            header('location: quanly.php?page=about_us&error=invalid_file_format');
        }
    }else{
        $name = $_POST['hpc'];
    }

   $id = $_POST['id'];
$title = $_POST['title'];
   $content = $_POST['content'];
   $image = $name;

$pdo->query("UPDATE about_us SET au_Title='$title',au_Content='$content',au_Picture='$image' WHERE au_Id='$id'");

header('location: quanly.php?page=about_us&action=success');

}

?>