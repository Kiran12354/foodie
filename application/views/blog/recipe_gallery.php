<div class="page-content-wrapper sp-y">
        <div class="gallery-page-content">
            <div class="container container-wide">
                <div class="row mtn-30 image-gallery">
                    <?php 
                    foreach ($get_gal as $row){
                    ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="gallery-item" data-mfp-src="<?php echo base_url().$row->image;?>">
                            <img style="height: 300px;width: 300px" src="<?php echo base_url().$row->image;?>" alt="gallery" />
                            <div class="gallery-item__text">
                                <h3><?php echo $row->title;?></h3>
                            </div>
                        </div>
                    </div>
                 <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    