<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> My posts</h3>
              </div>
              <div class="card-body">
                  <div class="row">
          
              <?php 
              $k=1;
              foreach ($posts as $row){
              ?>
                      <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <h3><?php echo $k;?>)&nbsp;<?php echo $row->title;?>
                              <span style="float: right">
                              <?php 
                            if($row->status == 1):  ?>
                                <span class="btn  btn-success btn-sm">approved</span>

                             <?php else:?>
                                    <span class="btn  btn-danger btn-sm">pending</span>

                             <?php endif;?>
                              </span></h3>
                          <hr>
                      </div>
                      <div class="card-body">
                          <div class="card-img">
                              <img style="margin-left: 125px" height="300" width="700" src="<?php echo base_url().$row->image;?>" alt="image">
                          </div>
                          <hr>
                          <h4>Ingredients</h4>
                          <hr>
                          <h5>
                               <?php echo $row->ingredient;?>
                          </h5>
                          <hr>
                          <h4>Steps</h4>
                          <hr>
                          <h5>
                               <?php echo $row->steps;?>
                          </h5>
                          <hr>
                          <h4>Video</h4>
                          <hr>
                          
                               <?php echo $row->video;?>
                          
                      </div>
                  </div>
                      </div>
              <?php
              $k++;
              }
              ?>
              </div>
              </div>
            </div>
          </div>
          </div>
      </div>
      