<div class="page-content-wrapper sp-y">
        <div class="product-details-page-content">
            <div class="container container-wide">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- Start Product Thumbnail Area -->
                            <div class="col-md-5">
                                <div class="product-thumb-area">
                                    <div class="product-details-thumbnail">
                                        <div class="product-thumbnail-slider" id="thumb-gallery">
                                            <figure class="pro-thumb-item" data-mfp-src="<?php echo base_url().$get_tip->photo;?>">
                                                <img style="height: 400px; width: 600px;" src="<?php echo base_url().$get_tip->photo;?>" />
                                            </figure>
                                            </div>

                                        
                                    </div>

                                   
                                </div>
                            </div>
                            <!-- End Product Thumbnail Area -->

                            <!-- Start Product Info Area -->
                            <div class="col-md-7">
                                <div class="product-details-info-content-wrap">
                                    <div class="prod-details-info-content">
                                        <h2><?php echo $get_tip->title;?></h2>
                                        <br>
                                        <?php echo $get_tip->video;?>
                                        <br>
                                        <br>
                                        <h5 class="price"><strong>Views:</strong> <span class="price-amount">325</span>
                                        </h5>
                                       </div>
                                </div>
                            </div>
                            <!-- End Product Info Area -->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="product-description-review">
                                    <!-- Product Description Tab Menu -->
                                    <ul class="nav nav-tabs desc-review-tab-menu" id="desc-review-tab" role="tablist">
                                        <li>
                                            <a class="active" id="desc-tab" data-toggle="tab" href="#descriptionContent" role="tab">Description</a>
                                        </li>
                                        <li>
                                            <a id="profile-tab" data-toggle="tab" href="#reviewContent">Review</a>
                                        </li>
                                    </ul>

                                    <!-- Product Description Tab Content -->
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="descriptionContent">
                                            <div class="description-content">
                                                <p><?php echo $get_tip->steps;?></p>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="reviewContent">
                                            <div class="product-rating-wrap">
                                                <div class="display-ratings">
                                                    <?php 
                                                    foreach ($get_review as $row){
                                                    ?>
                                                    <div class="rating-item">
                                                        <div class="rating-author-txt">
                                                            
                                                            <div class="rating-meta">
                                                                <h3><?php echo $row->name;?></h3>
                                                                <span class="time"><?php $a=explode(" ","$row->created")?>
                                                                <?php echo $a[0];?>
                                                                </span>
                                                            </div>

                                                            <p><?php echo $row->review;?></p>
                                                        </div>
                                                    </div>
                                                     <?php
                                                       }
                                                     ?>
                                                    
                                                </div>

                                                <div class="rating-form-wrapper">
                                                    <h3>Add your Reviews</h3><?php if($this->session->flashdata('success')) :?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $this->session->flashdata('success')?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php endif;?>
                                                    <form action="<?php echo base_url()?>review" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $get_tip->id;?>">
                                                        <div class="rating-form row">
                                                            <div class="col-12">
                                                                <h5>Your Rating:</h5>
                                                                <div class="rating-star fix mb-20">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-input-item mt-30 mt-md-0">
                                                                    <label for="name" class="sr-only">Name</label>
                                                                    <input type="text" name="name" id="name" placeholder="Name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-input-item mt-30 mt-md-0">
                                                                    <label for="email" class="sr-only">Email</label>
                                                                    <input type="email" name="email" id="email" placeholder="Email" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-input-item mt-30 mb-40">
                                                                    <label for="your-review" class="sr-only">review</label>
                                                                    <textarea rows="4" name="review" id="your-review" placeholder="Write a review"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-22">
                                                                <button class="btn btn-brand">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    