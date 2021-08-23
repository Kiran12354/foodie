<div class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="card" style="margin-right: 180px; margin-left: 180px">
              <div class="card-header">
                <h4 class="card-title">Complaint</h4>
              </div>
              <div class="card-body">
                  <form method="post" action="<?php echo base_url()?>comp" enctype="multipart/form-data">
                     <?php $get_user=$this->db->get_where('users',array('email'=>$this->session->userdata('email')))->row();?>
                      <input name="user_id" type="hidden" value="<?php echo $get_user->id;?>">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="sub" placeholder="Subject of the complent">
                      </div>
                    </div>
                  </div>
                      
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Issue</label>
                        <textarea id="summernote" name="iss" class="form-control">
                            
                        </textarea>
                      </div>
                    </div>
                  </div>
                      
                      <div class="row">
                    <div class="col-md-12">
                        <div  class="form-group">
                        <label>Suggestion</label>
                        <textarea id="summernote1" name="sug" class="form-control">
                            
                        </textarea>
                      </div>
                    </div>
                  </div>
                      
                      <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <button style="float: right" type="submit" class="btn btn-info">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          </div>
      </div>
