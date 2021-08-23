<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('My_model');
        $this->load->library('pagination');
        
      
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $data['title']= "Home";
                
                 $config = array();
                 $config["base_url"] = base_url()."My_controller/index" ;
                 $config["total_rows"] = $this->My_model->get_rows();
                 $config["per_page"] = 2;
                 $config["uri_segment"] = 3;
                 
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';     
                
                
                 $this->pagination->initialize($config);
                 $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
                 $data["links"] = $this->pagination->create_links();
                 $data['feeds'] = $this->My_model->get_feed($config["per_page"], $page);

                $data['recent']=$this->My_model->rec_post();
                $data['chicken']=$this->My_model->getchicken();
                $data['fish']=$this->My_model->getfish();
                $data['fastfood']=$this->My_model->getfastfood();
                $data['soup']=$this->My_model->getsoup();
                $data['Pizza']=$this->My_model->getPizza();
                $data['Desserts']=$this->My_model->getDesserts();
                $data['Salads']=$this->My_model->getSalads();
                $data['others']=$this->My_model->getothers();
		$this->load->view('blog/header',$data);
                $this->load->view('blog/index');
                $this->load->view('blog/footer');
	}
        
        public function login_page(){
            $data['title']= "Login";
            $this->load->helper('captcha');
            $vals = array(
//        'word'          => 'Kiran',
        'img_path'      => './captcha-images/',
        'img_url'       => base_url().'captcha-images/',
        'font_path'     => './path/to/fonts/texb.ttf',
        'img_width'     => '150',
        'img_height'    => 30,
        'expiration'    => 7200,
        'word_length'   => 4,
        'font_size'     => 16,
        'img_id'        => 'Imageid',
        'pool'          => 'abcdefghijklmnopqrstuvwxyz',

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
        )
        );

        $cap = create_captcha($vals);
        $data['image']=$cap['image'];
         $captchaword=$cap['word'];   
         $this->session->set_userdata('captchaword',$captchaword);
         $this->load->view('blog/blog_login',$data);
        }
        
        public function status_change(){
              $this->My_model->status_change(); 
              }
              
    public function change_Order(){
                  $this->My_model->change_Order(); 
            } 
        
        public function sign_up(){
            $data['title']= "Sign up";
            $this->load->view('blog/sign_up_blog',$data);
        }
        
        public function user_add(){
            $this->My_model->add_user();
        }
        
        
        public function dash_board(){
            $data['title']= "Admin Panel";
            $this->load->view('Admin/includes/header',$data);
                $this->load->view('Admin/includes/index');
                $this->load->view('Admin/includes/footer');
        }
        
        public function check_login(){
            $login=$this->My_model->check_login();
            
            if($login=="Admin"){
                echo '<script>window.location="'.base_url()."dashboard".'"</script>';
                $this->session->set_flashdata('login',"login successfull");
            }elseif ($login=="user") {
                echo '<script>window.location="'.base_url()."u_dashboard".'"</script>';
                $this->session->set_flashdata('login',"login successfull");
        }else {
            echo '<script>window.location="'.base_url()."log".'"</script>';
            $this->session->set_flashdata('logout',"login failed");
           }
        }
        
        public function user_dashboard(){
                $data['title']= "User Panel";
		$this->load->view('user/header',$data);
                $this->load->view('user/index');
                $this->load->view('user/footer');
        }
        
        public function admin_logout(){
            $this->session->sess_destroy();
            echo '<script>window.location="'. base_url().'"</script>';
        }
        
        public function user_logout(){
            $this->session->sess_destroy();
            echo '<script>window.location="'. base_url().'"</script>';
        }
        
        public function add_recipe(){
                $data['title']= "Add Recipe";
		$this->load->view('user/header',$data);
                $this->load->view('user/add_r');
                $this->load->view('user/footer');
        }
        
        public function save_recipe(){
            $this->My_model->addrecipe();
            $this->session->set_flashdata('success',"Recipe added successfully wait for admin approval");
        }
        
        public function posts(){
            $data['title']= "My Recipes";
            $data['posts']=$this->My_model->get_posts();
		$this->load->view('user/header',$data);
                $this->load->view('user/user_posts');
                $this->load->view('user/footer');
        }
        
        

                public function all_posts(){
                $data['title']= "All Posts";
                $data['al_posts']=$this->My_model->get_allposts();
		$this->load->view('Admin/includes/header',$data);
                $this->load->view('Admin/all_posts');
                $this->load->view('Admin/includes/footer');
        }
        
        public function delete_post(){
            $a=$this->uri->segment(3);
            $this->My_model->deletepost($a);
            $this->session->set_flashdata('delete',"Post Removed successfully");
        }
        
        public function view_post(){
                $data['title']= " Posts";
                $data['v_post']=$this->db->get_where('user_posts',array('id'=>$this->uri->segment(3)))->row();
                $data['comment']=$this->db->get_where('comments',array('post_id'=>$this->uri->segment(3)))->result();
                $this->load->view('blog/header',$data);
                $this->load->view('blog/view_post');
                $this->load->view('blog/footer');
        }
        
        public function comments(){
            $this->My_model->post_comment();
        }
        
        public function recipe_gal(){
               $data['title']= " Gallery";
                $data['get_gal']=$this->My_model->get_images();
                $this->load->view('blog/header',$data);
                $this->load->view('blog/recipe_gallery');
                $this->load->view('blog/footer');
        }
        
        public function user_complent(){
                $data['title']= "Complent Panel";
                $this->load->view('user/header',$data);
                $this->load->view('user/com_panel');
                $this->load->view('user/footer');
        }
       
        public function post_complent(){
            $this->My_model->complent();
            $this->session->set_flashdata('complent',"complent logged successfully");
        }
        
        public function get_comps(){
                $data['title']= "Complaint Panel";
                $data['complents']=$this->My_model->get_comps();
                $this->load->view('Admin/includes/header',$data);
                $this->load->view('Admin/complents');
                $this->load->view('Admin/includes/footer');
        }
        
        public function delete_comp(){
            $a=$this->uri->segment(3);
            $this->My_model->delete_comment($a);
        }
        
        public function tricks(){
                $data['title']= "Tips & Tricks";
                $data['tipntrick']=$this->My_model->get_tipntrick();
                $this->load->view('blog/header',$data);
                $this->load->view('blog/tips');
                $this->load->view('blog/footer');
        }
        
        public function trickpanel(){
                $data['title']= "Tips & Tricks";
                $data['tricks']=$this->My_model->get_tricks();
                $this->load->view('Admin/includes/header',$data);
                $this->load->view('Admin/tipstable');
                $this->load->view('Admin/includes/footer');
        }
        
        public function addtricks(){
                $data['title']= "Tips & Tricks";
                $this->load->view('Admin/includes/header',$data);
                $this->load->view('Admin/addtricks');
                $this->load->view('Admin/includes/footer');
        }
        
        public function savetricks(){
            $this->My_model->addtips();
            $this->session->set_flashdata('login',"Recipe added and you should approve");
        }
        
        public function addusertricks(){
                $data['title']= "Tips & Tricks";
                $this->load->view('user/header',$data);
                $this->load->view('user/addtips');
                $this->load->view('user/footer');
        }
        
        public function saveusertricks(){
            $this->My_model->addtricks();
            $this->session->set_flashdata('success',"Recipe added successfully wait for admin approval");
        }
        
        public function delete_tip(){
            $a=$this->uri->segment(3);
            $this->My_model->delete_tip($a);
        }
        
        public function show_tip(){
                $data['title']= " Tips and Tricks";
                $data['get_tip']=$this->db->get_where('tipsntricks',array('id'=>$this->uri->segment(3)))->row();
                $data['get_review']=$this->db->get_where('review',array('tip_id'=>$this->uri->segment(3)))->result();
                $this->load->view('blog/header',$data);
                $this->load->view('blog/single_tip');
                $this->load->view('blog/footer');
            }
            
            public function contacts(){
                $data['title']= "Contacts";
                $this->load->view('blog/header',$data);
                $this->load->view('blog/contact');
                $this->load->view('blog/footer');
            }
            
            public function savecontacts(){
               $this->My_model->contacts();
               $this->session->set_flashdata('success',"Message sent");
            }
            
            public function savereview(){
                $this->My_model->reviews();
                $this->session->set_flashdata('success',"Review posted");
            }
            
            public function list_contact(){
                $data['title']= "Contacts";
                 $data['get_contacts']=$this->My_model->contact_get();
                $this->load->view('Admin/includes/header',$data);
                $this->load->view('Admin/contact_tab');
                $this->load->view('Admin/includes/footer');
            }
            
            public function delete_contact(){
                $a=$this->uri->segment(3);
                $this->My_model->delete_contact($a);
            }
            
            public function chicken(){
                $data['title']= "Chicken Posts";
                $data['chicken']=$this->My_model->getchicken();
                $data['fish']=$this->My_model->getfish();
                $data['fastfood']=$this->My_model->getfastfood();
                $data['soup']=$this->My_model->getsoup();
                $data['Pizza']=$this->My_model->getPizza();
                $data['Desserts']=$this->My_model->getDesserts();
                $data['Salads']=$this->My_model->getSalads();
                $data['others']=$this->My_model->getothers();
		$data['chicken_feed']= $this->My_model->get_c_p();
                $this->load->view('blog/header',$data);
                $this->load->view('blog/chichen_index');
                $this->load->view('blog/footer');
            }
            
            public function fastfood(){
                $data['title']= "Fast Food Posts";
                $data['chicken']=$this->My_model->getchicken();
                $data['fish']=$this->My_model->getfish();
                $data['fastfood']=$this->My_model->getfastfood();
                $data['soup']=$this->My_model->getsoup();
                $data['Pizza']=$this->My_model->getPizza();
                $data['Desserts']=$this->My_model->getDesserts();
                $data['Salads']=$this->My_model->getSalads();
                $data['others']=$this->My_model->getothers();
		$data['ff_feed']= $this->My_model->get_f_p();
                $this->load->view('blog/header',$data);
                $this->load->view('blog/ff_index');
                $this->load->view('blog/footer');
            }
            
            public function nl(){
                $this->My_model->subscribe();
            }
            
            public function my_letters(){
                $data['title']= "News Letter";
                $data['letters']=$this->My_model->get_nl();
                $this->load->view('Admin/includes/header',$data);
                $this->load->view('Admin/newstable');
                $this->load->view('Admin/includes/footer');
            }
            
            public function delete_nl(){
                $a=$this->uri->segment(3);
                $this->My_model->deletelet($a);
            }
            
            public function ajax(){
                
                $this->load->view('ajax/form'); 
                
            }
            
            public function insert(){
                if($this->input->is_ajax_request()){
                    $this->form_validation->set_rules('name', 'Name', 'required');
                    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                    if ($this->form_validation->run() == FALSE){
                        $data= array('response'=>'error', 'message'=>  validation_errors());
                    }else{
                        $ajax_data=$this->input->post();
                        if($this->My_model->insert_entry($ajax_data)){
                            $data= array('response'=>'success', 'message'=>'Record Added Successfully');
                        }  else {
                            $data= array('response'=>'error', 'message'=> 'failed');
                        }
                    }
                       echo json_encode($data);
                    }  else {
                    echo 'No direct script access allowed';    
                }
            }
            
            public function fetch(){
            if($this->input->is_ajax_request()){
                if ($posts = $this->My_model->get_entries()){
                    $data=array('response'=>'success', 'posts'=>$posts);
                    }else{
                    $data=array('response'=>'error','message'=>'failed to fetch data');
                    }
                    echo json_encode($data);
                }else{
                    echo 'No direct script access allowed';
                }
            }
            
            public function delete(){
                if($this->input->is_ajax_request()){
                    $del_id=$this->input->post('del_id');
                    if($this->My_model->delete_entry($del_id)){
                      $data=array('response'=>'success'); 
                    }  else {
                      $data=array('response'=>'error');
                    }
                    
                    echo json_encode($data);
                }  else {
                   echo 'No direct script access allowed'; 
                }
            }
            
            public function edit(){
                if($this->input->is_ajax_request()){
                    $edit_id=$this->input->post('edit_id');
                    
                    if($post=$this->My_model->edit_entry($edit_id)){
                        $data=array('response'=>'success','post'=>$post);
                    }  else {
                        $data=array('response'=>'error','message'=>'failed to fetch record');
                    }
                    echo json_encode($data);
                }  else {
                    echo 'No direct script access allowed';
                }
                
            }
            
            public function update(){
                if($this->input->is_ajax_request()){
                  $this->form_validation->set_rules('edit_name', 'Username', 'required');
                  $this->form_validation->set_rules('edit_email', 'Email', 'required|valid_email');
                  
                if ($this->form_validation->run() == FALSE)
                {
                        $data=array('response'=>'error','message'=> validation_errors());
                }else{
                if($this->My_model->update_record()){
                        $data=array('response'=>'success','messaage'=>'Record Updated Successfully'); 
                    }else{
                        $data=array('response'=>'error','messaage'=>'Failed To Update');
                    }
                }
                echo json_encode($data);
               } else {
                     echo "No direct script access allowed";
                }
            }
}
