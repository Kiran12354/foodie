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
                        user name
                      </th>
                      <th class="text-center">
                        subject
                      </th>
                      <th class="text-center">
                        issue
                      </th>
                       
                      <th class="text-center">
                        suggestion
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
                        foreach ($complents as $row){
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
                            <?php echo $row->subject;?>
                        </td>
                        <td class="text-center">
                          <?php echo $row->issue;?>
                        </td>
                        
                        <td class="text-center">
                          <?php echo $row->suggestion;?>
                        </td>
                        <td class="text-center">
                          <?php 
                            if($row->comp_status == 1):  ?>
                                <span onclick="status_change('complents','<?php echo $row->id;?>','0')" class="btn  btn-success btn-sm">Replied</span>

                             <?php else:?>
                                    <span onclick="status_change('complents','<?php echo $row->id;?>','1')" class="btn  btn-danger btn-sm">Pending</span>

                             <?php endif;?>
                        </td>
                        <td class="text-center">
                          <a href="<?php echo base_url()?>My_controller/delete_comp/<?php echo $row->id?>" class="btn btn-sm btn-danger">Delete</a>
                                    
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
      