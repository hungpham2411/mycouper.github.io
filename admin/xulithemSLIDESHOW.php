<?php

include_once('../libraries/configs.php');
session_start();

if(isset($_POST['rdo']))
{

if($_FILES['picture']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['picture']['type'] == "image/jpeg"
            || $_FILES['picture']['type'] == "image/png"
            || $_FILES['picture']['type'] == "image/gif"){
            // là file ảnh
            // Tiến hành code upload
            if($_FILES['picture']['size'] > 5048576){
                header('location: quanly.php?page=add_slideshow&error=out_of_range');
            }else{
                // file hợp lệ, tiến hành upload
                $path = "../public/images/slider/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['picture']['tmp_name'];
                $name = $_FILES['picture']['name'];
                $type = $_FILES['picture']['type'];
                $size = $_FILES['picture']['size'];
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);

   $title = $_POST['title'];
   $content = $_POST['description'];
   $show = $_POST['rdo'];
   $image = $name;
   $apple = $_POST['applestore'];
   $paly = $_POST['playstore'];
   $register = $_POST['register'];

$pdo->query("INSERT INTO slideshow(ss_Title,ss_Description,ss_Picture,ss_LinkAppleStore,ss_LinkPlayStore,ss_LinkRegister,ss_IsShow) VALUES('$title','$content','$image','$apple','$paly','$register','$show')");

header('location: quanly.php?page=slideshow&action=success');


            }
        }else{
            // không phải file ảnh
            header('location: quanly.php?add_slideshow&error=invalid_file_format');
        }
    }else{
        header('location: quanly.php?page=add_slideshow&error=no_image');
    }

}

?>