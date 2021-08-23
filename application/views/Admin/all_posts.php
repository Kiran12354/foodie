<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Posts</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        #
                      </th>
                      <th class="text-center">
                        user email
                      </th>
                      <th class="text-center">
                        	title 
                      </th>
                      <th class="text-center">
                        image
                      </th>
                      <th class="text-center">
                        category
                      </th>
                       
                      <th class="text-center">
                        video
                      </th>
                       <th class="text-center">
                        Posted at
                      </th>
                       <th class="text-center">
                        status
                      </th>
                       <th class="text-center">
                        Actions
                      </th>
                    </thead>
                    <tbody>
                        <?php
                        $k=1;
                        foreach ($al_posts as $row){
                        ?>
                      <tr>
                        <td>
                         <?php echo $k;?>
                        </td>
                        <td>
                          <?php echo $row->user_name;?>
                        </td>
                        <td>
                          <?php echo $row->title;?>
                        </td>
                        <td>
                            <img height="100" width="100" src="<?php echo base_url().$row->image?>">
                        </td>
                        <td class="text-center">
                          <?php echo $row->category;?>
                        </td>
                        
                        <td>
                          <?php echo $row->video;?>
                        </td>
                        <td>
                          <?php echo $row->created;?>
                        </td>
                        <td class="text-center">
                          <?php 
                            if($row->status == 1):  ?>
                                <span onclick="status_change('user_posts','<?php echo $row->id;?>','0')" class="btn  btn-success btn-sm"><i class="fa fa-eye"></i></span>

                             <?php else:?>
                                    <span onclick="status_change('user_posts','<?php echo $row->id;?>','1')" class="btn  btn-danger btn-sm"><i class="fa fa-eye-slash"></i></span>

                             <?php endif;?>
                        </td>
                        <td class="text-center">
                          <a href="<?php echo base_url()?>My_controller/delete_post/<?php echo $row->id?>" class="btn btn-sm btn-danger">Delete</a>
                                    
                        </td>
                      </tr>
                     <?php
                      $k++; 
                     }
                    
                     ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
      