<section  id="home"  class="home">

            <div class="cth-bg header large bg-img fixed background-one"  style="background-image: url('<?php echo PATH ?>/public/images/<?php echo $slideshow['ss_Picture'] ?>')" >
                <div class="header-inner">
                    <h2 class="bigtext logo-text text-white mb0"><?php echo $slideshow['ss_Title'] ?></h2>
                    <h6 class="serif bigtext text-white"><?php echo $slideshow['ss_Description'] ?></h6>
                    <a href="<?php echo $slideshow['ss_LinkAppleStore'] ?>" title="Tải từ Apple store" class="btn outline light grid-mt grid-ms">Tải từ Apple store</a>
                    <a href="<?php echo $slideshow['ss_LinkPlayStore'] ?>" class="btn outline light grid-mt grid-ms" title="Tải từ Play store">Tải từ Play store</a>
                    <a href="<?php echo $slideshow['ss_LinkRegister'] ?>" class="btn white grid-mt grid-ms" title="Đăng ký">Đăng ký</a>
                </div>
            </div>
        </section>

        <section  id="intro"  class="intro"><div class="row " ><div class="eight col center text-center">
                    <h2><span class="serif"><?php echo $category_title1; ?></span></h2>
                </div></div>

            <!-- Icon navigation -->
            <div class="row equal" >
			<?php foreach($categories2 as $show_categories2): ?>
				<div class="three col medium-three col small-six col">
                    <div class="icon-nav">
                        <a href="<?php if($show_categories2['cate_Id'] == 9){echo "#work";}elseif($show_categories2['cate_Id'] == 10){echo "#services";}elseif($show_categories2['cate_Id'] == 11){echo "#about";}elseif($show_categories2['cate_Id'] == 12){echo "#contact";} ?>" class="scrollto" title="<?php echo $show_categories2['cate_Name'] ?>">
                            <?php echo $show_categories2['cate_Logo'] ?>
                            <b><?php echo $show_categories2['cate_Name'] ?></b>
                            <em><?php echo $show_categories2['cate_Description'] ?></em>			
						</a>
                    </div>
                </div>
			<?php endforeach; ?>
			</div>

        </section>

        <section  id="work"  class="work section-slider"><!-- Title --><div class="row title "><h2><?php echo $category_title2; ?></h2><hr></div>
            <!-- Work slider -->
            <div class="row relative">
                <div id="owlcarouselID552c4dc534cc8" class="owlcarousel work-slider">
                    <!-- Work item -->
				<?php foreach($articles as $show_articles): ?>
                    <div class="grid-ms">
                        <div class="overlay-item">
                            <a title="<?php echo $show_articles['ar_Name'] ?>" class="popup-gallery" href="<?php echo PATH ?>/public/images/<?php echo $show_articles['ar_Picture'] ?>">

                                <span class="o-hover">
                                    <span>
                                        <i class="fa fa-image fa-2x"></i>
                                    </span>
                                </span>
                                <img src="<?php echo PATH ?>/public/images/<?php echo $show_articles['ar_Picture'] ?>" title="<?php echo $show_articles['ar_Name'] ?>" alt="<?php echo $show_articles['ar_Name'] ?>" class="responsive-img">
                            </a>
                        </div>
                        <div class="e-info">
                            <h3><?php echo $show_articles['ar_Name'] ?></h3>
                            <p><?php echo $show_articles['ar_Description'] ?></p>			</div>
                    </div>
				<?php endforeach; ?>

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
                    })
                    $(".owlcarouselID552c4dc534cc8-prev").click(function () {
                        owl.trigger('owl.prev');
                    })

                });
            </script></section>



        <div class="cth-bg cta bg-img fixed background-four"  style="background-image: url('<?php echo PATH ?>/public/images/bg-4.jpg')" >

            <div class="row">
                <div class="twelve col text-center">

                    <h2 class="text-white"><span class="serif"><?php echo $category_title3; ?></span></h2>
                    <a title="Đăng ký" href="<?php echo $options['op_RegisterPartner'] ?>" class="btn outline light scrollto" >Đăng ký</a>
                </div>
            </div>

        </div>


        <section  id="services"  class="services section-slider">
            <!-- Title -->
            <div class="row title "><h2><?php echo $category_title4; ?></h2><hr></div>
            <!-- Services slider -->
            <div class="row relative">
                <div id="owlcarouselID552c4dc52846d" class="owlcarousel services-slider">
				<?php foreach($articles1 as $show_articles1): ?>
                    <!-- Service item -->
                    <div class="grid-ms">
                        <div class="service-item">
                            <?php echo $show_articles1['ar_Picture'] ?>
                            <h3 class="h6"><?php echo $show_articles1['ar_Name'] ?></h3>
                            <p class="subline"><?php echo $show_articles1['ar_Description'] ?></p>
                            <hr>
                            <p class="description"><?php echo $show_articles1['ar_Content'] ?></p>
                            <a title="<?php echo $show_articles1['ar_Name'] ?>" class="arrow-link scrollto" href="#contact">Liên hệ</a>      </div>
                    </div>
				<?php endforeach; ?>

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
                    })
                    $(".owlcarouselID552c4dc52846d-prev").click(function () {
                        owl.trigger('owl.prev');
                    })

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
				<?php foreach($partners as $show_partners): ?>
                    <div class="grid-ms">
                        <div class="icon-circle">
                            <img src="<?php echo PATH ?>/public/images/partner/<?php echo $show_partners['pa_Picture'] ?>" title="<?php echo $show_partners['pa_Name'] ?>" alt="<?php echo $show_partners['pa_Name'] ?>"/>
                            <h3 class="h5 text-white"><?php echo $show_partners['pa_Name'] ?></h3>

                            <p><?php echo $show_partners['pa_Description'] ?></p>

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
                        items: 4,
                        itemsDesktop: [1000, 3],
                        itemsTablet: [600, 2],
                        itemsMobile: [321, 1]
                    });

                    // Custom navigation
                    $(".owlcarouselID552c4dc52846e-next").click(function () {
                        owl.trigger('owl.next');
                    })
                    $(".owlcarouselID552c4dc52846e-prev").click(function () {
                        owl.trigger('owl.prev');
                    })

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
								<?php foreach($feedback as $show_feedback): ?>
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
				<?php foreach($vip as $show_vip): ?>
                    <!-- Employee -->
                    <div class="grid-ms">
                        <div class="overlay-item">
                            <span class="o-hover">
                                <span>
								<?php $vip_link = $pdo->query("SELECT * FROM vip_link WHERE vl_Vip='".$show_vip['vi_Id']."' AND vl_IsShow=1"); foreach($vip_link as $show_vip_link): ?>
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
                    })
                    $(".owlcarouselEmployee552c4dc51c064-prev").click(function () {
                        owl.trigger('owl.prev');
                    })

                });
            </script>
        </section>