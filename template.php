<?php
require_once("libraries/queries.php");
include_once 'libraries/DatabaseBusiness.php';

if (isset($_GET['flag']) && ($_GET['flag'] == 1 || $_GET['flag'] == 2)) {
    $meta_title = $options['op_MetaTitle'];
    $meta_description = $options['op_MetaDescription'];
    $meta_keywords = $options['op_MetaKeywords'];
} elseif (isset($_GET['flag']) && $_GET['flag'] == 3) {
    echo $_GET['idBlog'];
    $blog_details = $pdo->query("SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_Id='" . $_GET['idBlog'] . "' AND bl_IsShow=1");
    $blog_details = $blog_details->fetch();

    $meta_title = $blog_details['bl_MetaTitle'];
    $meta_description = $blog_details['bl_MetaDescription'];
    $meta_keywords = $blog_details['bl_MetaKeywords'];
}
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="en-gb">
    <!--[if IE 7]><html prefix="og: http://ogp.me/ns#" lang="en" class="ie7"><![endif]-->
    <!--[if IE 8]><html prefix="og: http://ogp.me/ns#" lang="en" class="ie8"><![endif]-->
    <!--[if IE 9]><html prefix="og: http://ogp.me/ns#" lang="en" class="ie9"><![endif]-->
    <!--[if (gt IE 9)|!(IE)]><html prefix="og: http://ogp.me/ns#" lang="en"><![endif]-->
    <!--[if !IE]><html prefix="og: http://ogp.me/ns#" lang="en"><![endif]-->
    <head>
        <meta charset="utf-8">

        <!-- Standard Favicon-->

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="<?php echo $options['op_Name']; ?>" />
        <meta name="keywords" content="<?php echo $meta_keywords; ?>" />
        <meta name="description" content="<?php echo $meta_description; ?>" />
        <title><?php echo $meta_title; ?></title>

        <link rel="stylesheet" href="<?php echo PATH ?>/public/libs/k2/k2.css" type="text/css" />
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

        <!-- Essential stylesheets -->
        <link rel="stylesheet" href="<?php echo PATH ?>/public/libs/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo PATH ?>/public/libs/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo PATH ?>/public/libs/bxslider/bxslider.css">
        <link rel="stylesheet" href="<?php echo PATH ?>/public/libs/owlcarousel/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo PATH ?>/public/libs/owlcarousel/owl.theme.css">
        <link rel="stylesheet" href="<?php echo PATH ?>/public/libs/base.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- The stylesheet -->
        <link rel="stylesheet" href="<?php echo PATH ?>/public/styles/style.css">
        <link rel="stylesheet" href="<?php echo PATH ?>/public/styles/default.css">
        <link rel="stylesheet" href="<?php echo PATH ?>/public/styles/custom.css">
        <link rel="stylesheet" href="<?php echo PATH ?>/public/styles/blog.css">

        <script src="<?php echo PATH ?>/public/libs/monotools/mootools-core.js" type="text/javascript"></script>
        <script src="<?php echo PATH ?>/public/libs/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo PATH ?>/public/libs/jquery/jquery-noconflict.js" type="text/javascript"></script>
        <script src="<?php echo PATH ?>/public/libs/jquery/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo PATH ?>/public/scripts/core.js" type="text/javascript"></script>
        <script src="<?php echo PATH ?>/public/libs/k2/k2.js" type="text/javascript"></script>
        <script src="<?php echo PATH ?>/public/libs/modernizr/modernizr.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <script src="<?php echo PATH ?>/public/libs/jquery/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo PATH ?>/public/libs/bxslider/jquery.bxslider.min.js"></script>
        <script src="<?php echo PATH ?>/public/libs/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?php echo PATH ?>/public/libs/jquery/jquery.fitvids.js"></script>
        <script src="<?php echo PATH ?>/public/libs/jquery/jquery.equal.js"></script>
    </head>


    <body>

        <header>
            <!-- Top of the page -->
            <div id="top"></div>
            <!-- Top bar -->
            <div class="top-bar tb-large<?php
            if (isset($_GET['flag']) && $_GET['flag'] == 1) {
                echo " tb-transp";
            }
            ?>">
                <div class="row">
                    <div class="twelve col">


                        <!-- Symbolic or typographic logo -->
                        <div class="tb-logo">
                            <a href="<?php echo PATH ?>" title="<?php echo $meta_title; ?>"><img src="<?php echo PATH ?>/public/images/<?php echo $options['op_Logo'] ?>" title="<?php echo $meta_title; ?>" alt="<?php echo $meta_title; ?>"></a><h1><a href="<?php echo PATH ?>" title="<?php echo $meta_title; ?>">myCouper</a></h1>				</div>


                        <!-- Menu toggle -->
                        <input type="checkbox" id="toggle" />
                        <label for="toggle" class="toggle"></label>

                        <?php
                        include_once 'libraries/Menu.php';
                        ?>
                        <nav class="menu ">
                            <?php
                            $menu = new Menu();
                            $menu->multiLevelMenu(0);
                            ?>
                        </nav>




                    </div>
                </div>
            </div>
        </header>

        <?php
        foreach ($noidungtrang as $noidung) {
            include("$noidung");
        }
        ?>

        <section  id="contact"  class="contact">
            <!-- Title -->
            <div class="row title "><h2><?php echo $category_title7; ?></h2><hr></div>
            <!-- Contact -->
            <div class="row">
                <!-- Contact form -->
                <div class="six col offset-by-one">
                    <!-- Succes message after sending the form, see also the php file around line 90 -->
                    <div id="message" class="c-message"></div>
                    <!-- Form -->
                    <form id="contactform" class="form c-form" method="post" action="contact_send_action.php" enctype="multipart/form-data" name="contactform">
                        <fieldset>
                            <input name="name" type="text" id="name" placeholder="Full name" value="<?php
                            if (isset($_POST["name"])) {
                                echo $_POST["name"];
                            }
                            ?>"/>
                            <input name="address" type="text" id="address" placeholder="Address" />
                            <input name="email" type="email" id="email" placeholder="E-mail" />
                            <input name="phone" type="tel" id="phone" placeholder="Phone">
                            <input name="title" type="text" id="title" placeholder="Title">
                            <textarea name="message" id="message" placeholder="Content"></textarea>
                            <div style="clear:both;"></div>
                            <div class="g-recaptcha" data-sitekey="6Le0jgYTAAAAAMRRsvZCLnnGjEZ2MoOIoxLAIhcZ"></div>
                            <!--<div id="dynamic_recaptcha_1"></div>
                               <div style="clear:both;margin-bottom: 10px;"></div>
                                                           <input type="hidden" name="option" value="com_cthcontact">
                                                           <input type="hidden" name="task" value="contact.sendemail">
                                                           <input type="hidden" name="tmpl" value="component">
                                                           index.php?option=com_cthcontact&amp;task=contact.sendemail&amp;tmpl=component
                                                           <input type="hidden" name="receiveEmail" value="<?php echo $options['op_Email'] ?>">
                               <input type="hidden" name="thanks" value="Thanks for contacting with us!">
                               <input type="hidden" name="subject" value="Get support">
                               <input type="hidden" name="960f7535ebc239e7e1f97eac42f80b6c" value="1" />	 -->

                            <input type="submit" class="submit btn outline" name="submit" id="submit" value="Send" />
                        </fieldset>
                    </form>
                </div>


                <!-- Contact details -->
                <div class="four col text-left">

                    <h5><?php echo $options['title_1']; ?></h5>
                    <p><?php echo $options['content_1']; ?></p>


                    <h5><?php echo $options['title_2']; ?></h5>
                    <address class="c-details">
                        <a href="<?php echo PATH ?>" title="<?php echo $options['op_Name'] ?>">
                            <i class="fa fa-home"></i>
                            <span><?php echo $options['op_Name'] ?></span>
                        </a>
                        <br />
                        <a title="<?php echo $options['op_Address'] ?>" href="<?php echo $options['op_Map'] ?>" target="new">
                            <i class="fa fa-map-marker"></i>
                            <span><?php echo $options['op_Address'] ?></span>
                        </a>
                        <br>
                        <a title="<?php echo $options['op_Email'] ?>" href="mailto:<?php echo $options['op_Email'] ?>">
                            <i class="fa fa-envelope-o"></i>
                            <span><?php echo $options['op_Email'] ?></span>
                        </a>
                        <br>
                        <a title="<?php echo $options['op_Phone'] ?>" href="tel:<?php echo str_replace(' ', '', $options['op_Phone']); ?>">
                            <i class="fa fa-phone"></i>
                            <span><?php echo $options['op_Phone']; ?></span>
                        </a>
                    </address>
                </div>


            </div>
        </section>




        <!-- Back to top -->
        <div class="back-top-wrap">
            <a href="#top" class="scrollto"><i class="back-top fa fa-chevron-up"></i></a>
        </div>

        <footer class="cth-footer social-footer"><div class="row " ><div class="twelve col sf-icons">
                    <a title="Twitter" href="<?php echo $options['op_LinkTwitter'] ?>"><i class="fa fa-twitter"></i></a>
                    <a title="Facebook" href="<?php echo $options['op_LinkFacebook'] ?>"><i class="fa fa-facebook"></i></a>
                    <a title="Google Plus" href="<?php echo $options['op_LinkGooglePlus'] ?>"><i class="fa fa-google-plus"></i></a>
                    <a title="Youtube" href="<?php echo $options['op_LinkYoutube'] ?>"><i class="fa fa-youtube"></i></a>
                    <a title="Linked In" href="<?php echo $options['op_LinkLinkedIn'] ?>"><i class="fa fa-linkedin"></i></a>
                    <p class="uber"><?php echo $category_title8; ?></p>
                </div></div>
        </footer>

        <footer class="cth-footer footer"><div class="row " ><div class="twelve col">

                    <p>Copyright @ 2015 - <a href="<?php echo PATH ?>" title="<?php echo $options['op_MetaTitle'] ?>">myCouper</a> - All rights reserved</p>

                </div></div>
        </footer>

        <!-- Javascript -->
        <script src="<?php echo PATH ?>/public/scripts/main.js"></script>
        <script src="<?php echo PATH ?>/public/scripts/retina.min.js"></script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-55726154-1', 'auto');
            ga('send', 'pageview');

        </script>
    </body>
</html>
