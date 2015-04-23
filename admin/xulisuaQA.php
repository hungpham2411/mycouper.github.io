<?php

include_once('../libraries/configs.php');
session_start();
$now = getdate();
$error = "";

function vn2latin($cs, $tolower = false)
{
    $marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
        "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề",
        "ế","ệ","ể","ễ",
        "ì","í","ị","ỉ","ĩ",
        "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ",
        "ờ","ớ","ợ","ở","ỡ",
        "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
        "ỳ","ý","ỵ","ỷ","ỹ",
        "đ",
        "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă",
        "Ằ","Ắ","Ặ","Ẳ","Ẵ",
        "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
        "Ì","Í","Ị","Ỉ","Ĩ",
        "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
        "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
        "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
        "Đ"," ",",","|","(",")",".","?","/","\\","<",">",";",":","+","=","_","*","&","^","%","$","#","@","!","`","~","{","}","[","]","'","\"");

    $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a",
        "a","a","a","a","a","a",
        "e","e","e","e","e","e","e","e","e","e","e",
        "i","i","i","i","i",
        "o","o","o","o","o","o","o","o","o","o","o","o",
        "o","o","o","o","o",
        "u","u","u","u","u","u","u","u","u","u","u",
        "y","y","y","y","y",
        "d",
        "A","A","A","A","A","A","A","A","A","A","A","A",
        "A","A","A","A","A",
        "E","E","E","E","E","E","E","E","E","E","E",
        "I","I","I","I","I",
        "O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
        "U","U","U","U","U","U","U","U","U","U","U",
        "Y","Y","Y","Y","Y",
        "D","-","and","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");

    if ($tolower) {
        return strtolower(str_replace($marTViet,$marKoDau,$cs));
    }

    return str_replace($marTViet,$marKoDau,$cs);

}

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
                header('location: quanly.php?page=edit_qa&id='.$_POST['id'].'&error=out_of_range');
            }else{
                // file hợp lệ, tiến hành upload
                $path = "../public/images/blog/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['picture']['tmp_name'];
                $name = $_FILES['picture']['name'];
                $type = $_FILES['picture']['type'];
                $size = $_FILES['picture']['size'];
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);
            }
        }else{
            // không phải file ảnh
            header('location: quanly.php?page=edit_qa&id='.$_POST['id'].'&error=invalid_file_format');
        }
    }else{
        $name = $_POST['hpc'];
    }
    
   $id = $_POST['id'];
   $time = $now["mday"] . "/" . $now["mon"] . "/" . $now["year"]."";
   $title = $_POST['title'];
   $meta_title = $_POST['meta_title'];
   $description = $_POST['description'];
   $meta_description = $_POST['meta_description'];
   $content = $_POST['content'];
   $show = $_POST['rdo'];
   $url = vn2latin($_POST['title'],true);
   $image = $name;
   $keyword = $_POST['meta_keywords'];

$pdo->query("UPDATE q_a SET qa_Title='$title',qa_MetaTitle='$meta_title',qa_Description='$description',qa_MetaDescription='$meta_description',qa_MetaKeywords='$keyword',qa_Url='$url',qa_Content='$content',qa_Picture='$image',qa_PostTime='$time',qa_IsShow='$show' WHERE qa_Id='$id'");

header('location: quanly.php?page=q_a&action=success');
}

?>