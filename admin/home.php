<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header('location: login.php');
}
include_once('../libraries/configs.php');
?>
<!DOCTYPE html>

<html>
    <head>
<meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width" />
        <title>Hệ thống quản trị bdschinhchu.vn</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <link href="css/Page_Head_Admin.css" rel="stylesheet" />
        <link href="css/Page_Footer_Admin.css" rel="stylesheet" />
        <link href="css/Page_Content_Admin.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link href="css/datepicker.css" rel="stylesheet" />
        <link href="css/Group_Div.css" rel="stylesheet" />
        <link href="../css/main.css" rel="stylesheet" type="text/css"/>
        <link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/scriptmenu.js"></script>
        <script type="text/javascript" src="js/datetimepicker-ui.js"></script>
        <script type="text/javascript" src="js/UI-datetimepicker.min.js"></script>
        <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="../ckfinder/ckfinder.js" type="text/javascript"></script>
        <script src="js/string_optimization.js"></script>

        <script>

            $(function () {
                $("#datepicker").datepicker();
            });
        </script>
        <script type="text/javascript">

            $(document).ready(function () {
                // Tạo các biến chứa các giá trị cần thiết
                var acc_head = $('.accordion_menu > li > a'),
                        acc_body = $('.accordion_menu li > .sub-menu');

                // Mở menu tab đầu tiên khi load trang web
                acc_head.first().addClass('active').next().slideDown('normal');

                // Tạo sự kiện click cho các thẻ a trong tab
                acc_head.on('click', function (event) {

                    // Không cho link đến thẻ a trong tab
                    event.preventDefault();

                    // Hiển thị và ẩn tab khi ta click
                    if ($(this).attr('class') != 'active') {
                        acc_body.slideUp('normal');
                        $(this).next().stop(true, true).slideToggle('normal');
                        acc_head.removeClass('active');
                        $(this).addClass('active');
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="Page_Head_Admin">
            <img src="../Admin/images/banner.png" alt="" width="100%"  height="100"/>
        </div>
        <div class="Page_Content_Admin">
            <div class="Content_Admin_Left">
                <ul class="accordion_menu">
                    <li>
                        <a href="#" class="active">Xin Chào :

                            <?php
                            $r = $pdo->query("SELECT * FROM admins WHERE ad_Username='" . $_SESSION['login_user'] . "'");
                            foreach ($r as $rr) {
                                echo $rr['ad_Name'];
                            }
                            ?>

                        </a>
                        <ul class="sub-menu" style="display: block; ">
                            <li><a href="quanly.php?page=my-informations"><em>01</em>Thông tin cá nhân</a></li>
                            <li><a href="quanly.php?page=edit-my-password"><em>02</em>Đổi mật khẩu</a></li>
                            <li><a href="<?php echo PATH ?>" target="_blank"><em>03</em>Trang chủ</a></li>
                            <li><a href="logout.php"><em>04</em>Thoát</a></li>
                        </ul>
                    </li>
                    <?php
                    if ($_SESSION['position'] == "2"): ?>
                       
							<li><a href="#" class="">I. Quản lý quản trị viên</a>
								<ul class="sub-menu" style="display: none; ">
									<li><a href="quanly.php?page=staff"><em>01</em>Danh sách quản trị viên</a></li>
									<li><a href="quanly.php?page=add_staff"><em>02</em>Thêm quản trị viên mới</a></li>
								</ul>
							</li>
                    
                    <?php endif; ?> 
                    <li><a href="#" class="">II. Tiêu đề và Dịch vụ</a>
                        <ul class="sub-menu" style="display: none; ">
                            <li><a href="quanly.php?page=categories"><em>01</em>Tiêu đề</a></li>
                            <li><a href="quanly.php?page=add_category"><em>02</em>Dịch vụ</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="">III. Blog</a>
                        <ul class="sub-menu" style="display: none; ">
                            <li><a href="quanly.php?page=blog_categories"><em>01</em>Danh mục</a></li>
                            <li><a href="quanly.php?page=blog"><em>02</em>Bài viết</a></li>
                            <li><a href="quanly.php?page=tags"><em>03</em>Tags</a></li>
                        </ul>
                    </li>
					<li><a href="#" class="">IV. Nhân vật quan trọng</a>
                        <ul class="sub-menu" style="display: none; ">
                            <li><a href="quanly.php?page=vip"><em>01</em>Danh sách</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="">V. Khác</a>
                        <ul class="sub-menu" style="display: none; ">
                            <li><a href="quanly.php?page=options"><em>01</em>Thông tin chung</a></li>
                            <li><a href="quanly.php?page=edit_slideshow"><em>02</em>Banner trang chủ</a></li>
                            <li><a href="quanly.php?page=about_us"><em>03</em>Về chúng tôi</a></li>
                            <li><a href="quanly.php?page=partners"><em>04</em>Các đối tác</a></li>
                            <li><a href="quanly.php?page=feedback"><em>05</em>Các nhận xét</a></li>
                            <li><a href="quanly.php?page=comments"><em>06</em>Liện hệ</a></li>
                        </ul>
                    </li>
                    
                </ul>

            </div>
            <div class="Content_Admin_Right">
                <?php
                foreach ($noidungtrang as $noidung) {
                    include("$noidung");
                }
                ?>
            </div>


        </div>
        <div class="Page_Footer">
            <center> <a>Copyright ® 2014 bdschinhchu.vn Software Company. All Rights Reserved. </a></center>
        </div>
    </body>
</html>