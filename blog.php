<section class="blog">

    <!-- Title -->
    <!-- Title -->
    <div class="row title">
        <h2>MYCOUPER Blog</h2>
        <hr>
    </div>



    <div class="row">

        <!-- Post area -->
        <div class="eight col">
            <div id="system-message-container">
            </div>



            <!-- Leading items -->

				<?php
                    $record = 5;
                    if (isset($_GET['pages']) && (int) $_GET['pages']) {
                        $totalPages = $_GET['pages'];
                    } else {
						if(isset($_GET['flagg']) && $_GET['flagg'] == 1)
						{
							if(isset($_POST['searchword']))
							{
								$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Title LIKE '%".$_POST['searchword']."%'";
							}else{
								$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1";
							}
						}elseif(isset($_GET['flagg']) && $_GET['flagg'] == 2)
						{
							$tags = $pdo->query("SELECT ta_Name FROM tags WHERE ta_Url='".$_GET['tags']."'");
							$tags = $tags->fetch();
							
							if(isset($_POST['searchword']))
							{
								$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Tags LIKE '%".$tags['ta_Name']."%' AND bl_Title LIKE '%".$_POST['searchword']."%'";
							}else{
								$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Tags LIKE '%".$tags['ta_Name']."%'";
							}
						}elseif(isset($_GET['flagg']) && $_GET['flagg'] == 3)
						{
							if(isset($_POST['searchword']))
							{
								$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Title LIKE '%".$_POST['searchword']."%' AND bl_Category='".$_GET['id_filter']."'";
							}else{
								$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Category='".$_GET['id_filter']."'";
							}
						}
                        
                        $query = mysqli_query($connection, $sql) or die('can not count the number of records' . mysqli_error($connection));
                        $totalRecords = mysqli_num_rows($query);
                        $totalPages = ceil($totalRecords / $record);
                    }
                    if (isset($_GET['start']) && (int) $_GET['start']) {
                        $x = $_GET['start'];
                    } else {
                        $x = 0;
                    }
					
					if(isset($_GET['flagg']) && $_GET['flagg'] == 1)
					{
						if(isset($_POST['searchword']))
						{
							$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Title LIKE '%".$_POST['searchword']."%' ORDER BY bl_Id DESC LIMIT $x,$record";
						}else{
							$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 ORDER BY bl_Id DESC LIMIT $x,$record";
						}
					}elseif(isset($_GET['flagg']) && $_GET['flagg'] == 2)
					{
						$tags = $pdo->query("SELECT ta_Name FROM tags WHERE ta_Url='".$_GET['tags']."'");
						$tags = $tags->fetch();
							
						if(isset($_POST['searchword']))
						{
							$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Tags LIKE '%".$tags['ta_Name']."%' AND bl_Title LIKE '%".$_POST['searchword']."%' ORDER BY bl_Id DESC LIMIT $x,$record";
						}else{
							$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Tags LIKE '%".$tags['ta_Name']."%' ORDER BY bl_Id DESC LIMIT $x,$record";
						}
                    }elseif(isset($_GET['flagg']) && $_GET['flagg'] == 3)
					{
						if(isset($_POST['searchword']))
						{
							$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Title LIKE '%".$_POST['searchword']."%' AND bl_Category='".$_GET['id_filter']."' ORDER BY bl_Id DESC LIMIT $x,$record";
						}else{
							$sql = "SELECT * FROM blog INNER JOIN blog_categories ON blog.bl_Category=blog_categories.bc_Id WHERE bl_IsShow=1 AND bl_Category='".$_GET['id_filter']."' ORDER BY bl_Id DESC LIMIT $x,$record";
						}
					}
					
                    $query = mysqli_query($connection, $sql) or die('can not count the records' . mysqli_error($connection));
                    if (mysqli_num_rows($query) == 0) {
                        echo "<td colspan='8'>Blog Trống !</td>";
                    } else {
                        while ($show_blog = mysqli_fetch_assoc($query)) {
                ?>
            <!-- Post -->
            <div class="post post-single grid-mb">

                <div class="post-media">
                    <img alt="<?php echo $show_blog['bl_Title'] ?>" title="<?php echo $show_blog['bl_Title'] ?>" src="<?php echo PATH ?>/public/images/blog/<?php echo $show_blog['bl_Picture'] ?>">
                </div>

                <div class="post-bg">

                    <div class="post-title">
                        <!-- Item title -->

                        <h3>
                            <a title="<?php echo $show_blog['bl_Title'] ?>" href="<?php echo PATH."/blog-".$show_blog['bl_Url']."-".$show_blog['bl_Id'].".html"; ?>"><?php echo $show_blog['bl_Title'] ?></a>
                        </h3>



                        <div class="post-meta">

                            By
                            <!-- Item Author -->
                            <a title="<?php echo $show_blog['bl_Poster'] ?>" rel="author" href="#"><?php echo $show_blog['bl_Poster'] ?></a>

                            on

                            <?php echo $show_blog['bl_PostTime'] ?>
                            <!-- Item category name -->
                            in
                            <a title="Blog" href="<?php echo PATH."/blog.html"; ?>">Blog</a>
                        </div>
                    </div>

                    <div class="post-body">
                        <!-- Item introtext -->
                        <p><?php echo $show_blog['bl_Description'] ?></p>


                        <!-- Item "read more..." link -->
                        <div>
                            <a title="<?php echo $show_blog['bl_Title'] ?>" href="<?php echo PATH."/blog-".$show_blog['bl_Url']."-".$show_blog['bl_Id'].".html"; ?>" class="arrow-link">Continue reading</a>
                        </div>

                    </div>


                    <!-- Item tags -->
                    <div class="tags">
					<?php
						$stringText = $show_blog['bl_Tags']; 
						$splitArray = split(',',$stringText); 
						foreach($splitArray as $sss): 
					?>
                        <a title="<?php echo $sss; ?>" href="<?php echo PATH."/blog-".$sss.".html"; ?>"><?php echo $sss; ?></a>
					<?php endforeach; ?>
                    </div>

                </div>
            </div><!-- End post -->
        <?php
				}
            }
        ?>


            <!-- Pagination -->
			<nav>
                        <ul class="pagination">
                         <!--   <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="current" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li> -->
							
							<?php
                        if ($totalPages > 1) {
                            $currentPage = $x / $record + 1;
                            if ($currentPage != 1) {
                                $y = $x - $record;
                                echo "<li><a title='First | Đầu tiên' href='".PATH."/blog0$totalPages.html'>&laquo;&laquo;</a></li>";
                                echo "<li><a title='Previous | Lùi' href='".PATH."/blog$y$totalPages.html'>&laquo;</a><li>";
                            } else {
                                echo "<li><a title='First | Đầu tiên'>&laquo;&laquo;</a></li>";
                                echo "<li><a title='Previous | Lùi'>&laquo;</a></li>";
                            }

                            $begin = $currentPage - 2;
                            if ($begin < 1) {
                                $begin = 1;
                            }
                            $end = $currentPage + 2;
                            if ($end > $totalPages) {
                                $end = $totalPages;
                            }
                            for ($i = $begin; $i <= $end; $i++) {
                                if ($currentPage == $i) {
                                    echo "<li><a title='".$i."' class='current'>$i</a></li>";
                                } else {
                                    $y = ($i - 1) * $record;
                                    echo "<li><a title='".$i."' href='".PATH."/blog$y$totalPages.html'>$i</a></li>";
                                }
                            }
                            if ($currentPage != $totalPages) {
                                $y = $x + $record;
                                echo "<li><a title='Next| Tiến' href='".PATH."/blog$y$totalPages.html'>&raquo;</a></li>";
                                $y = ($totalPages - 1) * $record;
                                echo "<li><a title='Last | Cuối cùng' href='".PATH."/blog$y$totalPages.html'>&raquo;&raquo;</a></li>";
                            } else {
                                echo "<li><a title='Next| Tiến'>&raquo;</a></li>";
                                echo "<li><a title='Last | Cuối cùng'>&raquo;&raquo;</a></li>";
                            }
                        }
                        ?>
							
                        </ul>
            </nav>
			
            <!-- JoomlaWorks "K2" (v2.6.8) | Learn more about K2 at http://getk2.org -->



        </div>
        <!-- Right Sidebar -->
        <div class="four col">
            <div class="sidebar">
                <div class="widget widget_banner"><div class="bannerwidget"><a title="Blog Banner" href="<?php echo PATH."/blog.html"; ?>"><img title="Blog Banner" src="<?php echo PATH ?>/public/images/blog/<?php echo $blog_banner['ss_Picture'] ?>" alt="Blog Banner"></a></div>
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