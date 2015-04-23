<?php

include_once('../libraries/configs.php');

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
                header('location: quanly.php?page=add_product&error=out_of_range&id='.$_POST['id'].'');
            }else{
                // file hợp lệ, tiến hành upload
                $path = "../public/images/icons/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['picture']['tmp_name'];
                $name = $_FILES['picture']['name'];
                $type = $_FILES['picture']['type'];
                $size = $_FILES['picture']['size'];
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);

	$title = $_POST['title'];
	
	$category = $_POST['id'];
	$description = $_POST['description'];
	$image = $name;
	$show = $_POST['rdo'];

$pdo->query("INSERT INTO articles(ar_Name,ar_Picture,ar_Description,ar_Category,ar_IsShow) 
VALUES('$title','$image','$description','$category','$show')");

header('location: quanly.php?page=products&id='.$_POST['id'].'&action=success');


            }
        }else{
            // không phải file ảnh
            header('location: quanly.php?add_product&error=invalid_file_format&id='.$_POST['id'].'');
        }
    }else{
        header('location: quanly.php?page=add_product&error=no_image&id='.$_POST['id'].'');
    }

}

?>