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
            if($_FILES['picture']['size'] > 1048576){
                header('location: quanly.php?page=options&error=out_of_range&id='.$_POST['id'].'');
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
            header('location: quanly.php?page=options&error=invalid_file_format&id='.$_POST['id'].'');
        }
    }else{
        $name = $_POST['hpc'];
    }

   $id = $_POST['id'];
   $company = $_POST['company'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $meta_title = $_POST['meta_title'];
   $meta_description = $_POST['meta_description'];
   $meta_keywords = $_POST['meta_keywords'];
   $image = $name;
   $google = $_POST['google'];
   $facebook = $_POST['facebook'];
   $twitter = $_POST['twitter'];
   $youtube = $_POST['youtube'];
   $linkedIn = $_POST['linkedin'];
   $register_partner = $_POST['register_partners'];

$pdo->query("UPDATE options SET op_Name='$company',op_Address='$address',op_Email='$email',op_Phone='$phone',op_LinkYoutube='$youtube',op_LinkTwitter='$twitter',op_LinkFacebook='$facebook',op_LinkLinkedIn='$linkedIn',op_LinkGooglePlus='$google',op_MetaTitle='$meta_title',op_MetaDescription='$meta_description',op_MetaKeywords='$meta_keywords',op_Logo='$image',op_RegisterPartner='$register_partner' WHERE op_Id='$id'");

header('location: quanly.php?page=options&action=success');

}

?>