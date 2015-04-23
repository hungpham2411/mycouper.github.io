<section class="blog">

    <!-- Title -->
    <!-- Title -->
    <div class="row title">
        <h2>MyCouper Blog</h2>
        <hr>
    </div>



    <div class="row">

        <!-- Post area -->
        <div class="eight col">
            <div id="system-message-container">
            </div>


            <!-- Post -->
            <div class="post post-single grid-mb">

                <!-- Start K2 Item Layout -->
                <!-- Plugins: BeforeDisplay -->

                <!-- K2 Plugins: K2BeforeDisplay -->

                <div class="post-media">
                    <img alt="<?php echo $blog_details['bl_Title'] ?>" title="<?php echo $blog_details['bl_Title'] ?>" src="<?php echo PATH ?>/public/images/blog/<?php echo $blog_details['bl_Picture'] ?>">
                </div>

                <div class="post-bg">

                    <div class="post-title">
                        <!-- Item title -->

                        <h1 class="h3"><?php echo $blog_details['bl_Title'] ?></h1>



                        <div class="post-meta">

                            By
                            <!-- Item Author -->
                            <a rel="author" title="<?php echo $blog_details['bl_Poster'] ?>" href="#"><?php echo $blog_details['bl_Poster'] ?></a>

                            on

                            <?php echo $blog_details['bl_PostTime'] ?>
                            <!-- Item category name -->
                            in
                            <a title="<?php echo $blog_details['bl_Title'] ?>" href="#">Blog</a>

                        </div>
                    </div>

                    <div class="post-body">
						<?php echo $blog_details['bl_Content'] ?>
					</div>

                    <!-- Item tags -->
                    <div class="tags">
					<?php
						$stringText = $blog_details['bl_Tags']; 
						$splitArray = split(',',$stringText); 
						foreach($splitArray as $sss): 
					?>
                        <a title="<?php echo $sss; ?>" href="<?php echo PATH."/blog-".$sss.".html"; ?>"><?php echo $sss; ?></a>
					<?php endforeach; ?>
                    </div>

                </div>
            </div><!-- End post -->



            <!-- Comment section -->
            <div class="grid-mb" id="comments">
                <div class="commentsWrap">



                    <!-- Plugins: AfterDisplay -->

                    <!-- K2 Plugins: K2AfterDisplay -->





                </div><!-- End comments wrap -->
            </div><!-- End comments -->



            <!-- JoomlaWorks "K2" (v2.6.8) | Learn more about K2 at http://getk2.org -->



        </div>
        <!-- Right Sidebar -->
        <div class="four col">
            <div class="sidebar">
                <div class="widget widget_banner"><div class="bannerwidget"><a title="Blog Banner" href="<?php echo PATH."/blog.html"; ?>"><img title="Blog Banner" src="<?php echo PATH ?>/public/images/blog/blog-banner.jpg" alt="Blog Banner"></a></div>
                </div><div class="widget widget_search">
                    <form method="post" action="" autocomplete="off">
                        <input class="search" placeholder="Tìm kiếm..." name="searchword" type="text">
                    </form>
                </div>
			<!--	<div class="widget widget_text"><h3>Text Widget</h3><div class="textwidget">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula.
                    </div>
                </div> -->
				<div class="widget widget_categories"><h3>Danh mục</h3>	
					<ul>
					<?php 
						foreach($blog_categories as $show_blog_categories): 
						$totalBlogByCategory = $pdo->query("SELECT COUNT(bl_Id) AS totalBlog FROM blog WHERE bl_Category='".$show_blog_categories['bc_Id']."'");
						$totalBlogByCategory = $totalBlogByCategory->fetch();
					?>
						<li class="cat-item"><a href="<?php echo PATH."/blog-by-".$show_blog_categories['bc_Url'].$show_blog_categories['bc_Id'].".html"; ?>"><?php echo $show_blog_categories['bc_Name'] ?></a> (<?php echo $totalBlogByCategory['totalBlog'] ?>)</li>
					<?php endforeach; ?>
					</ul>
				</div>
				<div class="widget widget_tag_cloud"><h3>Tags</h3><div class="tagcloud">
					<?php foreach($blog_tags as $show_blog_tags): ?>
                        <a href="<?php echo PATH."/blog-".$show_blog_tags['ta_Url'].".html"; ?>" title="<?php echo $show_blog_tags['ta_Name'] ?>">
                            <?php echo $show_blog_tags['ta_Name'] ?>	
						</a>
					<?php endforeach; ?>
                    </div>
                    <!-- /.tagscloud -->

                </div><div class="widget widget_archive"><h3>Tài liệu lưu trữ</h3>  <ul class="category-list">
                        <li>
                        <!--    <a href="/momentum/index.php/blog/itemlist/date/2014/6?catid=1">
                                June 2014              </a> -->
							<?php $now = getdate(); echo $now["mday"]."/".$now["mon"]."/".$now["year"]; ?>
                        </li>
                    </ul>
                </div>
			<!--	<div class="widget widget_recent_comments"><h3>Recent Comments</h3></div> -->
				<div class="widget widget_recent_entries"><h3>Các bài gần đây</h3>


                    <ul>
					<?php foreach($recent_post as $show_recent_post): ?>
                        <li>
                            <a title="<?php echo $show_recent_post['bl_Title'] ?>" href="<?php echo PATH."/blog-".$show_recent_post['bl_Url']."-".$show_recent_post['bl_Id'].".html"; ?>"><?php echo $show_recent_post['bl_Title'] ?></a>
						</li>

					<?php endforeach; ?>
                    </ul>
                </div>

            <!--    <div class="widget widget_calendar">
                    <div id="calendar_wrap">
                        <table id="wp-calendar">
                            <caption>April 2015</caption>
                            <thead>
                                <tr>
                                    <th scope="col" title="M">M</th>
                                    <th scope="col" title="T">T</th>
                                    <th scope="col" title="W">W</th>
                                    <th scope="col" title="T">T</th>
                                    <th scope="col" title="F">F</th>
                                    <th scope="col" title="S">S</th>
                                    <th scope="col" title="S">S</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <td colspan="3" id="prev"> <a href="/momentum/index.php?option=com_cthcontact&amp;task=contact.calendar&amp;month=3&amp;year=2015&amp;catid=1&amp;Itemid=196" class="monthNavLink">« MAR</a></td>
                                    <td class="pad">&nbsp;</td>
                                    <td colspan="3" id="next"><a href="/momentum/index.php?option=com_cthcontact&amp;task=contact.calendar&amp;month=5&amp;year=2015&amp;catid=1&amp;Itemid=196" class="monthNavLink">MAY »</a></td>
                                </tr>
                            </tfoot>

                            <tbody><tr>
                                    <td class="calendarDateEmpty">&nbsp;</td>
                                    <td class="calendarDateEmpty">&nbsp;</td>
                                    <td class="calendarDate">1</td>
                                    <td class="calendarDate">2</td>
                                    <td class="calendarDate">3</td>
                                    <td class="calendarDate">4</td>
                                    <td class="calendarDate">5</td>
                                </tr>
                                <tr>
                                    <td class="calendarDate">6</td>
                                    <td class="calendarDate">7</td>
                                    <td class="calendarDate">8</td>
                                    <td class="calendarDate">9</td>
                                    <td class="calendarDate">10</td>
                                    <td class="calendarDate">11</td>
                                    <td class="calendarDate">12</td>
                                </tr>
                                <tr>
                                    <td class="calendarDate">13</td>
                                    <td class="calendarDate">14</td>
                                    <td class="calendarDate">15</td>
                                    <td class="calendarDate">16</td>
                                    <td class="calendarDate">17</td>
                                    <td class="calendarToday">18</td>
                                    <td class="calendarDate">19</td>
                                </tr>
                                <tr>
                                    <td class="calendarDate">20</td>
                                    <td class="calendarDate">21</td>
                                    <td class="calendarDate">22</td>
                                    <td class="calendarDate">23</td>
                                    <td class="calendarDate">24</td>
                                    <td class="calendarDate">25</td>
                                    <td class="calendarDate">26</td>
                                </tr>
                                <tr>
                                    <td class="calendarDate">27</td>
                                    <td class="calendarDate">28</td>
                                    <td class="calendarDate">29</td>
                                    <td class="calendarDate">30</td>
                                    <td class="calendarDateEmpty">&nbsp;</td>
                                    <td class="calendarDateEmpty">&nbsp;</td>
                                    <td class="calendarDateEmpty">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <script>
                        var $K2 = jQuery.noConflict();

                        $K2(document).ready(function () {
                            // Calendar
                            if (typeof ($K2().live) == "undefined") {
                                $K2('#calendar_wrap').on('click', '.monthNavLink', function (event) {
                                    event.preventDefault();
                                    var parentElement = $K2(this).parent().parent().parent().parent().parent();
                                    var url = $K2(this).attr('href');
                                    parentElement.empty().addClass('k2CalendarLoader');
                                    $K2.ajax({
                                        url: url,
                                        type: 'post',
                                        success: function (response) {
                                            parentElement.html(response);
                                            parentElement.removeClass('k2CalendarLoader');
                                        }
                                    });
                                });
                            }
                            else {
                                $K2('a.monthNavLink').live('click', function (event) {
                                    event.preventDefault();
                                    var parentElement = $K2(this).parent().parent().parent().parent().parent();
                                    var url = $K2(this).attr('href');
                                    parentElement.empty().addClass('k2CalendarLoader');
                                    $K2.ajax({
                                        url: url,
                                        type: 'post',
                                        success: function (response) {
                                            parentElement.html(response);
                                            parentElement.removeClass('k2CalendarLoader');
                                        }
                                    });
                                });
                            }
                        });
                    </script>

                </div> -->
            </div>
        </div>
    </div>
</section>