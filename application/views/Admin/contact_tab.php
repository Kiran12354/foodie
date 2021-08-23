<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Contacts</h4>
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
                        Email
                      </th>
                      <th class="text-center">
                        Subject
                      </th>
                      <th class="text-center">
                        Message
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
                        foreach ($get_contacts as $row){
                        ?>
                      <tr>
                        <td class="text-center">
                         <?php echo $k;?>
                        </td>
                        <td class="text-center">
                          <?php echo $row->name;?>
                        </td>
                        <td class="text-center">
                            <?php echo $row->email;?>
                        </td>
                        <td class="text-center">
                          <?php echo $row->subject;?>
                        </td>
                        <td class="text-center">
                          <?php echo $row->message;?>
                        </td>
                        <td class="text-center">
                          <?php 
                            if($row->status == 1):  ?>
                            <span onclick="status_change('contact','<?php echo $row->id;?>','0')" class="btn  btn-success btn-sm"><i class="fa fa-eye"></i></span>

                             <?php else:?>
                            <span onclick="status_change('contact','<?php echo $row->id;?>','1')" class="btn  btn-danger btn-sm"><i class="fa fa-eye-slash"></i></span>

                             <?php endif;?>
                        </td>
                        <td class="text-center">
                          <a href="<?php echo base_url()?>My_controller/delete_contact/<?php echo $row->id?>" class="btn btn-sm btn-danger">Delete</a>
                                    
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
      