

    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper sp-y">
        <div class="blog-page-content-wrap">
            <div class="container container-wide">
                <div class="row">
                    <div class="col-lg-9 order-lg-1">
                        <div class="blog-content-wrapper">
                            <div class="row mtn-50 mtn-sm-30">
                                
                                <?php
                                foreach ($feeds as $row){
                                    $getname=$this->db->get_where('users',array('email'=>$row->user_name))->row();
                                ?>
                                <div class="col-md-6">
                                    <div class="blog-item">
                                        <figure class="blog-item__thumb">
                                            <a href="<?php echo base_url()?>My_controller/view_post/<?php echo $row->id?>"><img style="height: 230px; width: 360px; border-radius: 10px;" src="<?php echo base_url().$row->image;?>" alt="Blog" /></a>
                                        </figure>

                                        <div class="blog-item__info">
                                           <div class="post-date">
                                                <span><?php $a=explode(" ", $row->created)?>
                                                    <?php $a=  explode("-", $a[0])?>
                                                    <?php echo $a[2];?>
                                                    <?php
                                                    if($a[1]==01){
                                                        echo 'JAN';
                                                    }elseif ($a[1]==02) {
                                                            echo 'FEB';
                                                        }elseif ($a[1]==03) {
                                                            echo 'MAR';
                                                        }elseif ($a[1]==04) {
                                                            echo 'APR';
                                                        }elseif ($a[1]==05) {
                                                            echo 'MAY';
                                                        }elseif ($a[1]==06) {
                                                            echo 'JUN';
                                                        }elseif ($a[1]==07) {
                                                            echo 'JUL';
                                                        }elseif ($a[1]==08) {
                                                            echo 'AUG';
                                                        }elseif ($a[1]==09) {
                                                            echo 'SEP';
                                                        }elseif ($a[1]==10) {
                                                            echo 'OCT';
                                                        }elseif ($a[1]==11) {
                                                            echo 'NOV';
                                                        }else{
                                                            echo 'DEC';
                                                        }
                                                    ?>
                                                    
                                                </span>
                                            </div>
                                            <div class="post-meta">
                                                <span class="author">Post By: <a href="blog-details.html" rel="author"><?php echo $getname->name;?></a></span>
                                                <span class="comment">Comments: <a href="blog-details.html" rel="author">3</a></span>
                                            </div>
                                            <h2 class="post-title"><a href="<?php echo base_url()?>My_controller/view_post/<?php echo $row->id?>"><?php echo $row->title;?></a></h2>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                
                            </div>
                        </div>

                        <nav class="pagination-wrap sm-top-lh">
                            <ul class="pagination justify-content-center">
                                <li class="pagination btn btn-default">
                                    <?php echo $links;?></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-lg-3 order-lg-0">
                        <div class="sidebar-area">
                            <div class="sidebar-item">
                                <h4 class="sidebar-title">Search</h4>
                                <div class="sidebar-body">
                                    <div class="sidebar-search">
                                        <form action="" method="post">
                                            <input type="text" placeholder="search Here" />
                                            <button class="btn-src"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-item">
                                <h4 class="sidebar-title">Categories</h4>
                                <div class="sidebar-body">
                                    <ul class="sidebar-list">
                                        <li><a href="<?php echo base_url()?>chicken_posts">Chicken <span>(<?php echo $chicken?>)</span></a></li>
                                        <li><a href="<?php echo base_url()?>fastfood_posts">Fast Food<span>(<?php echo $fastfood?>)</span></a></li>
                                        <li><a href="<?php echo base_url()?>fish_posts">Fish <span>(<?php echo $fish?>)</span></a></li>
                                        <li><a href="<?php echo base_url()?>pizza_posts">Pizza <span>(<?php echo $Pizza?>)</span></a></li>
                                        <li><a href="<?php echo base_url()?>desserts_posts">Desserts <span>(<?php echo $Desserts?>)</span></a></li>
                                        <li><a href="<?php echo base_url()?>salad_posts">Salads<span>(<?php echo $Salads?>)</span></a></li>
                                        <li><a href="<?php echo base_url()?>soup_posts">Soups<span>(<?php echo $soup?>)</span></a></li>
                                        <li><a href="<?php echo base_url()?>other_posts">Others<span>(<?php echo $others?>)</span></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-item">
                                <h4 class="sidebar-title">Recent Post</h4>
                                <div class="sidebar-body">
                                    <?php
                                                                    foreach ($recent as $row){
                                    ?>
                                    <div class="sidebar-product">
                                        <a href="<?php echo base_url()?>My_controller/view_post/<?php echo $row->id?>" class="image"><img src="<?php echo base_url().$row->image;?>" alt="blog" /></a>
                                        <div class="content">
                                            <a href="<?php echo base_url()?>My_controller/view_post/<?php echo $row->id?>" class="title"><?php echo $row->title;?></a>
                                            <p>Click here to get the Latest recipe</p>
                                        </div>
                                    </div>
<?php
                                                                    }
?>
                                    
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->