<div class="page-content-wrapper sp-y">
        <div class="blog-details-page-wrapper">
            <div class="container container-wide">
                <div class="row">
                    <div class="col-12">
                        <article class="blog-post-details">
                            
                            <div class="blog-post-txt-wrap">
                                <div class="row">
                                    <div class="col-md-3 col-lg-2 order-1 order-md-0">
                                        <?php
                                        $get_user=$this->db->get_where('users',array('email'=>$v_post->user_name))->row();
                                        ?>
                                        <div class="author-info mt-sm-40">
                                            <div class="author-thumb">
                                                <img src="<?php echo base_url().$get_user->photo;?>" alt="Author" />
                                            </div>
                                            <div class="author-txt">
                                                <h5><?php echo $get_user->name;?> <span class="designation">Recipe Poster</span></h5>

                                                <div class="member-social-icons">
                                                    <a href="#"><i class="ion-social-facebook"></i></a>
                                                    <a href="#"><i class="ion-social-linkedin"></i></a>
                                                    <a href="#"><i class="ion-social-twitter"></i></a>
                                                    <a href="#"><i class="ion-social-pinterest"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9 col-lg-8 m-auto order-0">
                                        
                                        <div class="blog-post-txt">
                                            <h2><?php echo $v_post->title;?></h2>


                                            
                                            <figure class="blog-post-img">
                                                <img style="height: 380px; width: 800px" src="<?php echo base_url().$v_post->image;?>" alt="Blog" />
                                            </figure>
                                            <h4>Ingredient's</h4>
                                            <blockquote class="blockquote">
                                                
                                                <p>
                                                    <?php echo $v_post->ingredient?>
                                                </p>
                                            </blockquote>

                                            <h4>Steps</h4>
                                            <blockquote class="blockquote">
                                            <p><?php echo $v_post->steps;?></p>
                                            </blockquote>
                                            
                                            <h4>Video</h4>
                                            <?php echo $v_post->video?>
                                        </div>
                                       

                                        <div class="share-article text-center">
                                            <h6>Share this article</h6>
                                            <div class="share-icons nav justify-content-center">
                                                <a class="facebook" href="#"><i class="ion-social-facebook"></i></a>
                                                <a class="twitter" href="#"><i class="ion-social-twitter"></i></a>
                                                <a class="reddit" href="#"><i class="ion-social-reddit"></i></a>
                                                <a class="pinterest" href="#"><i class="ion-social-pinterest"></i></a>
                                            </div>
                                        </div>

                                        <!-- Start Comment Area Wrapper -->
                                        <div class="comment-area-wrapper">
                                            <div class="comments-view-area">
                                                <h3>Comments (5)</h3>
                                                <?php
                                                                                        foreach ($comment as $row){
                                                ?>
                                                <div class="single-comment-wrap d-flex">
                                                    <div class="comments-info">
                                                        <p class="m-0"><?php echo $row->comments?></p>
                                                        <div class="comment-footer mt-8 d-flex justify-content-between">
                                                            <a href="#" class="author"><strong><?php echo $row->name;?></strong> - <?php $a=explode(" ", $row->date)?><?php echo $a[0]?></a>
                                                            <a href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                 <?php 
                                                                                        }
                                                  ?>
                                                
                                            </div>

                                            <div class="comment-box-form mt-50 mt-sm-35">
                                                <h3>Leave your thought</h3>
                                                <form method="post" action="<?php echo base_url()?>comment">
                                                    <input type="hidden" name="post_id" value="<?php echo $v_post->id;?>">
                                                    <div class="row mtn-30">
                                                        <div class="col-12">
                                                            <div class="input-item">
                                                                <label for="comments" class="sr-only">comments</label>
                                                                <textarea name="comments" id="comments" cols="30" rows="5" placeholder="Write your Comment*" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item">
                                                                <label for="name" class="sr-only">name</label>
                                                                <input type="text" name="name" placeholder="Name*" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item">
                                                                <label for="email" class="sr-only">Email</label>
                                                                <input type="email" name="email" placeholder="Email*" required />
                                                            </div>
                                                        </div>

                                                        

                                                        <div class="col-12 mt-40">
                                                            <button class="btn btn-brand w-100">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    