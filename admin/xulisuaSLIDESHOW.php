<?php

include_once('../libraries/configs.php');

if(isset($_POST['rdo']))
{

if($_FILES['picture']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['picture']['type'] == "image/jpeg"
            || $_FILES['picture']['type'] == "image/png"
            || $_FILES['picture']['type'] == "image/gif"){
            // là file ảnh
            // Tiến hành code upload
            if($_FILES['picture']['size'] > 1048576){
                header('location: quanly.php?page=edit_slideshow&error=out_of_range');
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
            header('location: quanly.php?page=edit_slideshow&error=invalid_file_format');
        }
    }else{
        $name = $_POST['hpc'];
    }

   $id = $_POST['id'];
$title = $_POST['title'];
   $content = $_POST['description'];
   $show = $_POST['rdo'];
   $image = $name;
   $apple = $_POST['applestore'];
   $paly = $_POST['playstore'];
   $register = $_POST['register'];

$pdo->query("UPDATE slideshow SET ss_Title='$title',ss_Description='$content',ss_Picture='$image',ss_LinkAppleStore='$apple',ss_LinkPlayStore='$paly',ss_LinkRegister='$register',ss_IsShow='$show' WHERE ss_Id='$id'");

header('location: quanly.php?page=edit_slideshow&action=success');

}

?>