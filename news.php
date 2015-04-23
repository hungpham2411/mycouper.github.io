<div class="main-container">
    <div class="container-fluid pdt2">
        <div class="row row-same-height mgb3">
            <div class="col-md-2">
                <div class="flex-rwcfs fh">
                    <a title="<?php echo $options['op_MetaTitle'] ?>" href="<?php echo PATH ?>"><img src="<?php echo PATH ?>/public/images/<?php echo $options['op_Logo'] ?>" title="<?php echo $options['op_MetaTitle'] ?>" alt="<?php echo $options['op_MetaTitle'] ?>"/></a>
                </div>
            </div>

            <div class="col-md-7">
                <div class="flex-rwcfs fh">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a title="Tin tức" class="text-bold" href="blog.html">Tin tức</a></li>
                        <li role="presentation"><a title="Báo chí" class="text-bold" href="bao-chi.html">Báo chí</a></li>
                        <li role="presentation"><a class="text-bold" title="Hỏi đáp" href="hoi-dap.html">Hỏi Đáp</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="flex-rwcfs fh">
                    <form class="fw" action="" method="post">
                        <input id="search-keyword" class="form-control" name="searchKeyword" placeholder="Tìm kiếm"/>
                    </form>
                </div>
            </div>
        </div>

        <section class="pdb5">
            <div class="row row-same-height">
                <div class="col-md-2">
                    <ul>
                        <?php
                        $listNews = $pdo->query("SELECT * FROM news WHERE ne_IsShow=1 ORDER BY ne_Id DESC");
                        foreach ($listNews as $show_listNews):
                            ?>
                            <li><a title="<?php echo $show_listNews['ne_Title'] ?>" class="text-bold" href="<?php echo PATH . "/" . $show_listNews['ne_Url'] . "-" . $show_listNews['ne_Id'] . ".html" ?>"><?php echo $show_listNews['ne_Title'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="col-md-7">
                    <article class="blog-article">
                        <div class="blog-article-heading">
                            <div class="flex-rwcsb">
                                <h4 class="text-bold"><?php echo $newsDetails['ne_Title'] ?></h4>
                                <span class="text-muted">Ngày đăng: <?php echo $newsDetails['ne_PostTime'] ?></span>
                            </div>
                        </div>

                        <div class="blog-article-body mgb3">
                            <img class="img-w" src="<?php echo PATH ?>/public/images/blog/<?php echo $newsDetails['ne_Picture'] ?>" title="<?php echo $newsDetails['ne_Title'] ?>" alt="<?php echo $newsDetails['ne_Title'] ?>"/>
                            <?php echo $newsDetails['ne_Content'] ?>
                        </div>

                        <div class="blog-article-comments">
                            <textarea id="text-comment" class="form-control" name="textComment" placeholder="Comment"></textarea>
                        </div>
                    </article>
                </div>

                <div class="col-md-3">
                    <div class="facebook">Plug-in Facebook</div>
                    <div class="facebook">Plug-in Twitter</div>
                    <div class="facebook">Plug-in Youtube</div>
                    <div class="facebook">Plug-in Google+</div>
                    <div class="facebook">Plug-in Linkedin</div>
                </div>
            </div>
        </section>
    </div>
</div>