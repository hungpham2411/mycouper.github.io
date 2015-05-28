<section  id="home"  class="home">

    <div class="cth-bg header large bg-img fixed background-one"  style="background-image: url('<?php echo PATH ?>/public/images/<?php echo $slideshow['ss_Picture'] ?>')" >
        <div class="header-inner">
            <h2 class="bigtext logo-text text-white mb0"><?php echo $slideshow['ss_Title'] ?></h2>
            <h6 class="serif bigtext text-white"><?php echo $slideshow['ss_Description'] ?></h6>
            <a href="<?php echo $slideshow['ss_LinkAppleStore'] ?>" class="btn outline light grid-mt grid-ms"><?php echo $slideshow["button_1_name"]; ?></a>
            <a href="<?php echo $slideshow['ss_LinkPlayStore'] ?>" class="btn outline light grid-mt grid-ms"><?php echo $slideshow["button_2_name"]; ?></a>
            <!--<a href="#" class="btn white grid-mt grid-ms" title="Đăng ký">Đăng ký</a>-->
        </div>
    </div>
</section>

<?php
include_once 'libraries/PhotoSection.php';
$photoSection = new PhotoSection();
$photos = $photoSection->selectAll();
?>
<section  id="work"  class="work section-slider">
    <!-- Title -->
    <div class="row title ">
        <h2><?php echo $category_title2; ?></h2><hr>
    </div>
    <!-- Work slider -->
    <div class="row relative">
        <div id="owlcarouselID552c4dc534cc8" class="owlcarousel work-slider">
            <!-- Work item -->
            <?php foreach ($photos as $photo) { ?>
                <div class="grid-ms">
                    <div class="overlay-item">
                        <a title="<?php echo $photo["title"]; ?>" class="popup-gallery" href="<?php echo IMG_PATH . '/' . $photo["image"]; ?>">
                            <span class="o-hover">
                                <span>
                                    <i class="fa fa-image fa-2x"></i>
                                </span>
                            </span>
                            <img src="<?php echo IMG_PATH . '/' . $photo["image"]; ?>" title="<?php echo $photo["title"]; ?>" alt="<?php echo $photo["title"]; ?>" class="responsive-img">
                        </a>
                    </div>
                    <div class="e-info">
                        <h3><?php echo $photo["title"]; ?></h3>
                    </div>
                </div>
            <?php } ?>
        </div>


        <!-- Controls for the work slider -->
        <a title="Previous | Lùi" class="work-prev owlcarouselID552c4dc534cc8-prev oc-left"><i class="fa fa-angle-left"></i></a>
        <a title="Next | Tiến" class="work-next owlcarouselID552c4dc534cc8-next oc-right"><i class="fa fa-angle-right"></i></a>

    </div>

    <script>
        /* ==================== 10. Work slider ==================== */
        jQuery(function ($) {

            var owl = $("#owlcarouselID552c4dc534cc8");

            owl.owlCarousel({
                pagination: false,
                navigation: false,
                items: 3,
                itemsDesktop: [1000, 3],
                itemsTablet: [600, 2],
                itemsMobile: [321, 1]
            });

            // Custom navigation
            $(".owlcarouselID552c4dc534cc8-next").click(function () {
                owl.trigger('owl.next');
            });
            $(".owlcarouselID552c4dc534cc8-prev").click(function () {
                owl.trigger('owl.prev');
            });

        });
    </script>
</section>

<?php
include_once 'libraries/VideoSection.php';
$videoSection = new VideoSection();
$videos = $videoSection->selectAll();
?>
<section  id="work-1"  class="work section-slider">
    <!-- Title -->
    <div class="row title ">
        <h2><?php echo $category_title13; ?></h2><hr>
    </div>
    <!-- Work slider -->
    <div class="row relative">
        <div id="owlcarouselID552c4dc534cc9" class="owlcarousel work-slider">
            <!-- Work item -->
            <?php
            foreach ($videos as $video) {
                ?>
                <div class="grid-ms">
                    <div class="overlay-item">
                        <a class="<?php echo $videoSection->determineVideoHost($video["video_url"]); ?>" href="<?php echo $video["video_url"]; ?>">

                            <span class="o-hover">
                                <span>
                                    <i class="fa fa-film fa-2x"></i>
                                </span>
                            </span>
                            <img class="responsive-img" src="<?php echo IMG_PATH . "/" . $video["preview_image"]; ?>" alt="<?php echo $video["title"]; ?>">
                        </a>
                    </div>
                    <div class="e-info">
                        <h3><?php echo $video["title"]; ?></h3>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>


        <!-- Controls for the work slider -->
        <a title="Previous | Lùi" class="work-prev owlcarouselID552c4dc534cc9-prev oc-left"><i class="fa fa-angle-left"></i></a>
        <a title="Next | Tiến" class="work-next owlcarouselID552c4dc534cc9-next oc-right"><i class="fa fa-angle-right"></i></a>

    </div>

    <script>
        /* ==================== 10. Work slider ==================== */
        jQuery(function ($) {

            var owl = $("#owlcarouselID552c4dc534cc9");

            owl.owlCarousel({
                pagination: false,
                navigation: false,
                items: 3,
                itemsDesktop: [1000, 3],
                itemsTablet: [600, 2],
                itemsMobile: [321, 1]
            });

            // Custom navigation
            $(".owlcarouselID552c4dc534cc9-next").click(function () {
                owl.trigger('owl.next');
            });
            $(".owlcarouselID552c4dc534cc9-prev").click(function () {
                owl.trigger('owl.prev');
            });

        });
    </script>
</section>

<?php
include_once 'libraries/SupportSection.php';
$supportSection = new SupportSection();
$supports = $supportSection->selectAll();
?>
<section  id="support"  class="services section-slider">
    <!-- Title -->
    <div class="row title "><h2><?php echo $category_title14; ?></h2><hr></div>
    <!-- Services slider -->
    <div class="row relative">
        <div id="owlcarouselID552c4dc52846c" class="owlcarousel services-slider">
            <?php
            foreach ($supports as $support) {
                ?>
                <!-- Service item -->
                <div class="grid-ms">
                    <div class="service-item">
                        <i class="fa <?php echo $support["image"]; ?>"></i>
                        <h3 class="h6"><?php echo $support["title"]; ?></h3>
                        <p class="subline"><?php echo $support["subtitle"]; ?></p>
                        <hr>
                        <p class="description"><?php echo $support["description"]; ?></p>
                        <!--<a class="arrow-link scrollto" href="#contact">Liên hệ</a>-->
                    </div>
                </div>
                <?php
            }
            ?>
        </div>


        <!-- Controls for the services slider -->
        <a title="Previous | Lùi" class="serv-prev owlcarouselID552c4dc52846c-prev oc-left"><i class="arrow-control fa fa-angle-left"></i></a>
        <a title="Next | Tiến" class="serv-next owlcarouselID552c4dc52846c-next oc-right"><i class="arrow-control fa fa-angle-right"></i></a>

    </div>

    <script>
        /* ==================== 08. Services slider ==================== */
        jQuery(function ($) {

            var owl = $("#owlcarouselID552c4dc52846c");

            owl.owlCarousel({
                pagination: false,
                navigation: false,
                items: 4,
                itemsDesktop: [1000, 3],
                itemsTablet: [600, 2],
                itemsMobile: [321, 1]
            });

            // Custom navigation
            $(".owlcarouselID552c4dc52846c-next").click(function () {
                owl.trigger('owl.next');
            });
            $(".owlcarouselID552c4dc52846c-prev").click(function () {
                owl.trigger('owl.prev');
            });

        });
    </script>
</section>

<div class="cth-bg cta bg-img fixed background-four"  style="background-image: url('<?php echo PATH ?>/public/images/bg-4.jpg')" >

    <div class="row">
        <div class="twelve col text-center">

            <h2 class="text-white"><span class="serif"><?php echo $category_title3; ?></span></h2>
            <a title="Đăng ký" href="<?php echo $options['op_RegisterPartner'] ?>" class="btn outline light scrollto" ><?php echo $options['op_RegisterPartnerButtonName']; ?></a>
        </div>
    </div>

</div>

<?php
include_once 'libraries/ServiceSection.php';
$serviceSection = new ServiceSection();
$services = $serviceSection->selectAll();
?>
<section  id="services"  class="services section-slider">
    <!-- Title -->
    <div class="row title "><h2><?php echo $category_title4; ?></h2><hr></div>
    <!-- Services slider -->
    <div class="row relative">
        <div id="owlcarouselID552c4dc52846d" class="owlcarousel services-slider">
            <?php
            foreach ($services as $service) {
                ?>
                <!-- Service item -->
                <div class="grid-ms">
                    <div class="service-item">
                        <i class="fa <?php echo $service["image"]; ?>"></i>
                        <h3 class="h6"><?php echo $service["title"]; ?></h3>
                        <p class="subline"><?php echo $service["subtitle"]; ?></p>
                        <hr>
                        <p class="description"><?php echo $service["description"]; ?></p>
                        <!--<a class="arrow-link scrollto" href="#contact">Liên hệ</a>-->
                    </div>
                </div>
                <?php
            }
            ?>
        </div>


        <!-- Controls for the services slider -->
        <a title="Previous | Lùi" class="serv-prev owlcarouselID552c4dc52846d-prev oc-left"><i class="arrow-control fa fa-angle-left"></i></a>
        <a title="Next | Tiến" class="serv-next owlcarouselID552c4dc52846d-next oc-right"><i class="arrow-control fa fa-angle-right"></i></a>

    </div>

    <script>
        /* ==================== 08. Services slider ==================== */
        jQuery(function ($) {

            var owl = $("#owlcarouselID552c4dc52846d");

            owl.owlCarousel({
                pagination: false,
                navigation: false,
                items: 4,
                itemsDesktop: [1000, 3],
                itemsTablet: [600, 2],
                itemsMobile: [321, 1]
            });

            // Custom navigation
            $(".owlcarouselID552c4dc52846d-next").click(function () {
                owl.trigger('owl.next');
            });
            $(".owlcarouselID552c4dc52846d-prev").click(function () {
                owl.trigger('owl.prev');
            });

        });
    </script>
</section>

<section  id="process"  class="process">
    <!-- Title -->
    <div class="row title title-light"><h2><?php echo $category_title5; ?></h2><hr></div>
    <!-- Process items -->
    <div class="row relative" >
        <div id="owlcarouselID552c4dc52846e" class="owlcarousel">
            <!-- Process item --> <!-- Process item -->
            <?php foreach ($partners as $show_partners): ?>
                <div class="grid-ms">
                    <div class="icon-circle">
                        <img src="<?php echo PATH ?>/public/images/partner/<?php echo $show_partners['pa_Picture'] ?>" title="<?php echo $show_partners['pa_Name'] ?>" alt="<?php echo $show_partners['pa_Name'] ?>"/>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Controls for the services slider -->
        <a title="Previous | Lùi" class="serv-prev owlcarouselID552c4dc52846e-prev oc-left"><i class="arrow-control fa fa-angle-left"></i></a>
        <a title="Next | Tiến" class="serv-next owlcarouselID552c4dc52846e-next oc-right"><i class="arrow-control fa fa-angle-right"></i></a>
    </div>

    <script>
        /* ==================== 08. Services slider ==================== */
        jQuery(function ($) {

            var owl = $("#owlcarouselID552c4dc52846e");

            owl.owlCarousel({
                autoPlay: true,
                pagination: false,
                navigation: false,
                items: 8,
                itemsDesktop: [1000, 3],
                itemsTablet: [600, 2],
                itemsMobile: [321, 1]
            });

            // Custom navigation
            $(".owlcarouselID552c4dc52846e-next").click(function () {
                owl.trigger('owl.next');
            });
            $(".owlcarouselID552c4dc52846e-prev").click(function () {
                owl.trigger('owl.prev');
            });

        });
    </script>
</section>

<!-- About -->
<section id="about" class="about section-slider">
    <!-- Title -->
    <div class="row title">
        <h2><?php echo $category_title6; ?></h2>
        <hr>
    </div>
    <!-- Content -->
    <div class="row " ><div class="twelve col text-left">

            <!-- Header image -->
            <img src="<?php echo PATH ?>/public/images/<?php echo $about_us['au_Picture'] ?>" title="<?php echo $about_us['au_Title'] ?>" alt="<?php echo $about_us['au_Title'] ?>" class="responsive-img">

            <!-- Text -->
            <div class="bg-white bg-padding">
                <div class="row">
                    <div class="three col offset-by-two">
                        <h2><?php echo $about_us['au_Title'] ?></h2>
                    </div>
                    <div class="five col">
                        <?php echo $about_us['au_Content'] ?>
                    </div>
                </div>
            </div>

        </div></div>
    <!-- Quote slider -->
    <!-- Quote slider -->
    <div class="row">
        <div class="twelve col text-center qs-wrap">
            <div class="bg-white bg-padding">
                <div class="row">
                    <div class="eight col offset-by-two">
                        <ul id="quote-slider552c88e4cb418"  class="quote-slider">
                            <?php foreach ($feedback as $show_feedback): ?>
                                <!-- Quote -->
                                <li>
                                    <h6 class="h2"><?php echo $show_feedback['fb_Content'] ?></h6>
                                    <p><?php echo $show_feedback['fb_Name'] ?> - <em><?php echo $show_feedback['fb_Position'] ?></em></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /* ==================== 06. Quote slider ==================== */
        jQuery("#quote-slider552c88e4cb418").bxSlider({
            mode: 'horizontal',
            controls: false,
            adaptiveHeight: true
        });
    </script>


    <!-- Employee slider -->
    <div class="row relative">
        <div id="owlcarouselEmployee552c4dc51c064" class="owlcarousel employee-slider grid-mt">
            <?php foreach ($vip as $show_vip): ?>
                <!-- Employee -->
                <div class="grid-ms">
                    <div class="overlay-item">
                        <span class="o-hover">
                            <span>
                                <?php
                                $vip_link = $pdo->query("SELECT * FROM vip_link WHERE vl_Vip='" . $show_vip['vi_Id'] . "' AND vl_IsShow=1");
                                foreach ($vip_link as $show_vip_link):
                                    ?>
                                    <a title="<?php echo $show_vip['vi_Name'] ?>" href="<?php echo $show_vip_link['vl_Link'] ?>"><?php echo $show_vip_link['vl_Picture'] ?></a>
                                <?php endforeach; ?>
                            </span>
                        </span>
                        <img src="<?php echo PATH ?>/public/images/<?php echo $show_vip['vi_Picture'] ?>" title="<?php echo $show_vip['vi_Name'] ?>" alt="<?php echo $show_vip['vi_Name'] ?>" class="responsive-img">
                    </div>
                    <div class="e-info">
                        <h3><?php echo $show_vip['vi_Name'] ?></h3>
                        <p><?php echo $show_vip['vi_Position'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>


        <!-- Controls for the employee slider -->
        <a title="Previous | Lùi" class="emp-prev owlcarouselEmployee552c4dc51c064-prev oc-left"><i class="arrow-control fa fa-angle-left"></i></a>
        <a title="Next | Tiến" class="emp-next owlcarouselEmployee552c4dc51c064-next oc-right"><i class="arrow-control fa fa-angle-right"></i></a>

    </div>

    <script>
        /* ==================== 09. Employee slider ==================== */
        jQuery(function ($) {

            var owl = $("#owlcarouselEmployee552c4dc51c064");

            owl.owlCarousel({
                pagination: false,
                navigation: false,
                items: 4,
                itemsDesktop: [1000, 3],
                itemsTablet: [600, 2],
                itemsMobile: [321, 1]
            });

            // Custom navigation
            $(".owlcarouselEmployee552c4dc51c064-next").click(function () {
                owl.trigger('owl.next');
            });
            $(".owlcarouselEmployee552c4dc51c064-prev").click(function () {
                owl.trigger('owl.prev');
            });

        });
    </script>
</section>