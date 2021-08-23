<div class="page-content-wrapper sp-y">
    <h1 style="text-align: center">Tips & Tricks</h1>
        <div class="shop-page-action-bar mb-30">
            <div class="container container-wide">
                <div class="action-bar-inner">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="shop-layout-switcher mb-15 mb-sm-0">
                                <ul class="layout-switcher nav">
                                    <li data-layout="grid" class="active"><i class="fa fa-th"></i></li>
                                    <li data-layout="list"><i class="fa fa-th-list"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="sort-by-wrapper">
                                <label for="sort" class="sr-only">Sort By</label>
                                <select name="sort" id="sort">
                                    <option value="sbp">Sort By Popularity</option>
                                    <option value="sbn">Sort By Newest</option>
                                    <option value="sbt">Sort By Trending</option>
                                    <option value="sbr">Sort By Rating</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shop-page-product">
            <div class="container container-wide">
                <div class="product-wrapper product-layout layout-grid">
                    <div class="row mtn-30">
                        <!-- Start Product Item -->
                        <?php 
                        foreach ($tipntrick as $row){
                        ?>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="<?php echo base_url()?>My_controller/show_tip/<?php echo $row->id?>">
                                        <img class="thumb-primary" style="height: 300px; width: 300px" src="<?php echo base_url().$row->photo;?>" alt="Product" />
                                        <img class="thumb-secondary" style="height: 200px; width: 300px" src="<?php echo base_url().$row->photo;?>" alt="Product" />
                                    </a>

                                    <div class="ratting">
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star-half"></i></span>
                                    </div>
                                </div>

                                <div class="product-item__content">
                                    <div class="product-item__info">
                                        <h4 class="title"><a href="<?php echo base_url()?>My_controller/show_tip/<?php echo $row->id?>"><?php echo $row->title;?></a></h4>
                                        <span class="price"><strong>Likes:</strong> 100</span>
                                    </div>

                                    <div class="product-item__action">
                                        <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                        <button class="btn-add-to-cart"><i class="ion-ios-loop-strong"></i></button>
                                        <button class="btn-add-to-cart"><i class="ion-ios-heart-outline"></i></button>
                                        <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                    </div>

                                    
                                </div>

                                <div class="product-item__sale">
                                    <span class="sale-txt">25%</span>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <!-- End Product Item -->

                       
                    </div>
                </div>
            </div>
        </div>

        <div class="shop-page-action-bar mt-30">
            <div class="container container-wide">
                <div class="action-bar-inner">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <nav class="pagination-wrap mb-10 mb-sm-0">
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="ion-ios-arrow-thin-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="col-sm-6 text-center text-sm-right">
                            <p>Showing 1–12 of 26 results</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    