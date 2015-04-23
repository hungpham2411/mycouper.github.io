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
                header('location: quanly.php?page=edit_service&error=out_of_range&id='.$_POST['id'].'');
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
            header('location: quanly.php?edit_service&error=invalid_file_format&id='.$_POST['id'].'');
        }
    }else{
        $name = $_POST['hpc'];
    }


	$id = $_POST['id'];
	$title = $_POST['title'];
	$category = 1;
	$description = $_POST['description'];
	$image = $name;
	$show = $_POST['rdo'];

$pdo->query("UPDATE articles SET ar_Name='$title',ar_Picture='$image',ar_Description='$description',ar_Category='$category',ar_IsShow='$show' WHERE ar_Id='$id'");

header('location: quanly.php?page=articles&id=9&action=success');

}

if(isset($_POST['security']) && $_POST['security'] == 4)
{

	$id = $_POST['id'];
	$title = $_POST['title'];
	$category = 2;
	$description = $_POST['description'];
	$image = $_POST['picture'];
	$show = $_POST['rdo'];
	$content = $_POST['content'];

$pdo->query("UPDATE articles SET ar_Name='$title',ar_Picture='$image',ar_Description='$description',ar_Content='$content',ar_Category='$category',ar_IsShow='$show' WHERE ar_Id='$id'");

header('location: quanly.php?page=articles&id=10&action=success');

}

?>