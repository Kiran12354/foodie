<div class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="card" style="margin-right: 180px; margin-left: 180px">
              <div class="card-header">
                <h4 class="card-title">Tips and Tricks</h4>
              </div>
              <div class="card-body">
                  <form method="post" action="<?php echo base_url()?>save_tips" enctype="multipart/form-data">
                     <?php $get_user=$this->db->get_where('users',array('email'=>$this->session->userdata('email')))->row();?>
                      <input name="user_id" type="hidden" value="<?php echo $get_user->id;?>">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title of the post">
                      </div>
                    </div>
                  </div>
                      
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="file" class="form-control">
                      </div>
                    </div>
                  </div>
                      <br>
                      <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Videos</label>
                        <input type="text" class="form-control" name="vid" placeholder="Embaded code only height:300 width:450">
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-12">
                        <div  class="form-group">
                        <label>Steps</label>
                        <textarea id="summernote1" name="steps" class="form-control">
                            
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
