<?php

/**
 * Created by PhpStorm.
 * User: QUY
 * Date: 16/09/2014
 * Time: 10:56
 */
@$page = $_GET["page"];
switch ($page) {
    case "categories":
        $noidungtrang[] = "listcategories.php";
        break;
    case "add_category":
        $noidungtrang[] = "listservices.php";
        break;
    case "edit_category":
        $noidungtrang[] = "edit_category.php";
        break;
	case "add_service":
		$noidungtrang[] = "add_service.php";
		break;
	case "add_service1":
		$noidungtrang[] = "add_service1.php";
		break;
	case "edit_service":
		$noidungtrang[] = "edit_service.php";
		break;
	case "edit_service1":
		$noidungtrang[] = "edit_service1.php";
		break;
	case "edit_services":
		$noidungtrang[] = "edit_services.php";
		break;
    case "my-informations":
        $noidungtrang[] = "thongtincanhan.php";
        break;
    case "edit-my-password":
        $noidungtrang[] = "changepassword.php";
        break;
    case "staff":
        $noidungtrang[] = "liststaff.php";
        break;
    case "add_staff":
        $noidungtrang[] = "add_staff.php";
        break;
    case "edit_staff":
        $noidungtrang[] = "edit_staff.php";
        break;
	case "comments":
		$noidungtrang[] = "listcomments.php";
		break;
	case "edit_comment":
		$noidungtrang[] = "edit_comment.php";
		break;
	case "options":
		$noidungtrang[] = "edit_options.php";
		break;
	case "slideshow":
		$noidungtrang[] = "listslideshow.php";
		break;
	case "add_slideshow":
		$noidungtrang[] = "add_slideshow.php";
		break;
	case "edit_slideshow":
		$noidungtrang[] = "edit_slideshow.php";
		break;
	case "about_us":
		$noidungtrang[] = "edit_about_us.php";
		break;
	case "articles":
		$noidungtrang[] = "listarticles.php";
		break;	
	case "blog_categories":
		$noidungtrang[] = "blog_categories.php";
		break;	
	case "add_blog_category":
		$noidungtrang[] = "add_blog_category.php";
		break;
	case "edit_blog_category":
		$noidungtrang[] = "edit_blog_category.php";
		break;
	case "blog":
		$noidungtrang[] = "listblog.php";
		break;	
	case "add_blog":
		$noidungtrang[] = "add_blog.php";
		break;
	case "edit_blog":
		$noidungtrang[] = "edit_blog.php";
		break;
	case "tags":
		$noidungtrang[] = "listtags.php";
		break;	
	case "add_tag":
		$noidungtrang[] = "add_tag.php";
		break;
	case "edit_tag":
		$noidungtrang[] = "edit_tag.php";
		break;
	case "partners":
		$noidungtrang[] = "listpartners.php";
		break;	
	case "add_partner":
		$noidungtrang[] = "add_partner.php";
		break;
	case "edit_partner":
		$noidungtrang[] = "edit_partner.php";
		break;
	case "feedback":
		$noidungtrang[] = "listfeedback.php";
		break;
	case "add_feedback":
		$noidungtrang[] = "add_feedback.php";
		break;
	case "edit_feedback":
		$noidungtrang[] = "edit_feedback.php";
		break;
	case "vip":
		$noidungtrang[] = "listvip.php";
		break;
	case "add_vip":
		$noidungtrang[] = "add_vip.php";
		break;
	case "edit_vip":
		$noidungtrang[] = "edit_vip.php";
		break;
	case "vip_link":
		$noidungtrang[] = "vip_link.php";
		break;
	case "add_vip_link":
		$noidungtrang[] = "add_vip_link.php";
		break;
	case "edit_vip_link":
		$noidungtrang[] = "edit_vip_link.php";
		break;
    default:
        $noidungtrang[] = "thongtincanhan.php";
}
require("home.php");
?>