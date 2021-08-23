<div class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="card" style="margin-right: 180px; margin-left: 180px">
              <div class="card-header">
                <h4 class="card-title"> Add Recipe</h4>
              </div>
              <div class="card-body">
                  <form method="post" action="<?php echo base_url()?>add_rec" enctype="multipart/form-data">
                      <input name="user" type="hidden" value="<?php echo $this->session->userdata('email')?>">
                      <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title">
                      </div>
                    </div>
                  </div>
                      <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="cat">
                            <option>Chicken</option>
                            <option>FastFood</option>
                            <option>Fish</option>
                            <option>Pizza</option>
                            <option>Desserts</option>
                            <option>Salads</option>
                            <option>Soups</option>
                            <option>Others</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>image</label>
                        <input type="file" placeholder="choose files" name="file" class="form-control">
                      </div>
                    </div>
                  </div>
                    
                      <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Videos</label>
                        <input type="text" class="form-control" name="vid" placeholder="Embaded code only height:150 width:300">
                      </div>
                    </div>
                  </div>
                      
                      <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Ingredient's</label>
                        <textarea id="summernote" name="ing" class="form-control">
                            
                        </textarea>
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
      