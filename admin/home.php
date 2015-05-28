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
        <title>Hệ thống quản trị</title>
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
        <script src="js/script.js"></script>

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
            <img src="images/banner.png" alt="" width="100%"  height="100"/>
        </div>
        <div class="Page_Content_Admin">
            <aside class="Content_Admin_Left">
                <ul class="accordion_menu">
                    <li class="menu-item">
                        <a class="menu-item-link" href="#">Xin Chào :

                            <?php
                            $r = $pdo->query("SELECT * FROM admins WHERE ad_Username='" . $_SESSION['login_user'] . "'");
                            foreach ($r as $rr) {
                                echo $rr['ad_Name'];
                            }
                            ?>

                        </a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=my-informations"><em>01</em>Thông tin cá nhân</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=edit-my-password"><em>02</em>Đổi mật khẩu</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="<?php echo PATH ?>" target="_blank"><em>03</em>Trang chủ</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="logout.php"><em>04</em>Thoát</a></li>
                        </ul>
                    </li>
                    <?php if ($_SESSION['position'] == "2"): ?>

                        <li class="menu-item"><a class="menu-item-link" href="#">Quản lý quản trị viên</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=staff"><em>01</em>Danh sách quản trị viên</a></li>
                                <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=add_staff"><em>02</em>Thêm quản trị viên mới</a></li>
                            </ul>
                        </li>

                    <?php endif; ?>

                    <li class="menu-item">
                        <a class="menu-item-link" href="#">Menu</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=menu"><em>01</em>Menu list</a></li>
                        </ul>
                    </li>

                    <li class="menu-item"><a class="menu-item-link" href="#">Tiêu đề</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=categories"><em>01</em>Tiêu đề</a></li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a class="menu-item-link" href="#">Content section</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=edit_slideshow">Home</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=photo_section">Photo</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=video_section">Video</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=support_section">People</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=service_section">Merchants</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=partners">Partner</a></li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a class="menu-item-link" href="#">About and contact section</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=about_us">About intro</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=feedback">About quote</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=vip">About employee</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=options">Contact</a></li>
                        </ul>
                    </li>

                    <li class="menu-item"><a class="menu-item-link" href="#">Blog</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=blog_categories">Danh mục</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=blog">Bài viết</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=tags">Tags</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="quanly.php?page=edit_banner_blog">Banner</a></li>
                        </ul>
                    </li>
                </ul>

            </aside>
            <div class="Content_Admin_Right">
                <?php
                foreach ($noidungtrang as $noidung) {
                    include("$noidung");
                }
                ?>
            </div>


        </div>

        <footer class="Page_Footer">
            <p>Copyright ® 2015 TCN24H Software Company. All Rights Reserved.</p>
        </footer>
    </body>
</html>