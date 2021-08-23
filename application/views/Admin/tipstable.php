<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Tips and Tricks<span style="float: right"><a href="<?php echo base_url()?>addtips" class="btn btn-sm btn-info"><i class="fa fa-plus"> Add</i></a></span></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        #
                      </th>
                      <th class="text-center">
                        user name
                      </th>
                      <th class="text-center">
                        Title
                      </th>
                      <th class="text-center">
                        Photo
                      </th>
                      <th class="text-center">
                        video
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
                        foreach ($tricks as $row){
                            $get_name=$this->db->get_where('users',array('id'=>$row->user_id))->row();
                        ?>
                      <tr>
                        <td class="text-center">
                         <?php echo $k;?>
                        </td>
                        <td class="text-center">
                          <?php echo $get_name->name;?>
                        </td>
                        <td class="text-center">
                            <?php echo $row->title;?>
                        </td>
                        <td class="text-center">
                            <img height="100" width="100" src="<?php echo base_url().$row->photo;?>"> 
                        </td>
                        
                        <td class="text-center">
                          <?php echo $row->video;?>
                        </td>
                        <td class="text-center">
                          <?php 
                            if($row->status == 1):  ?>
                                <span onclick="status_change('tipsntricks','<?php echo $row->id;?>','0')" class="btn  btn-success btn-sm">approved</span>

                             <?php else:?>
                                    <span onclick="status_change('tipsntricks','<?php echo $row->id;?>','1')" class="btn  btn-danger btn-sm">Pending</span>

                             <?php endif;?>
                        </td>
                        <td class="text-center">
                          <a href="<?php echo base_url()?>My_controller/delete_tip/<?php echo $row->id?>" class="btn btn-sm btn-danger">Delete</a>
                                    
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
      