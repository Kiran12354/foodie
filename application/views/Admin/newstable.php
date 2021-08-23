<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h4 class="card-title">News Letter</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        #
                      </th>
                      <th class="text-center">
                        Email
                      </th>
                      <th class="text-center">
                        Created
                      </th>
                      <th class="text-center">
                        Actions
                      </th>
                    </thead>
                    <tbody>
                        <?php
                        $k=1;
                        foreach ($letters as $row){
                           
                        ?>
                      <tr>
                        <td class="text-center">
                         <?php echo $k;?>
                        </td>
                        <td class="text-center">
                            <?php echo $row->email;?>
                        </td>
                        <td class="text-center">
                          <?php echo $row->created;?>
                        </td>
                        <td class="text-center">
                          <a href="<?php echo base_url()?>My_controller/delete_nl/<?php echo $row->id?>" class="btn btn-sm btn-danger">Delete</a>
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
      