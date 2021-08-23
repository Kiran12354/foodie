<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class My_model extends CI_Model{
    public function add_user(){
        $cred=array(
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'password'=>md5($this->input->post('confirm_password')),
        );
        
        $user=$this->user_pic('user');
        
        if(!empty($user)){
            $cred['photo']=$user;
            $this->db->insert('users',$cred);
            echo '<script>alert("account created successfully");window.location="'.base_url()."log".'"</script>';
        }
    }
    
    public function status_change(){
             extract($_POST);
             
             if($teg_table=="user_posts"){
             $this->db->where('id',$id)->set('status',$st)->update($teg_table);
             }elseif ($teg_table=="complents") {
            $this->db->where('id',$id)->set('comp_status',$st)->update($teg_table);
        }elseif ($teg_table=="tipsntricks") {
            $this->db->where('id',$id)->set('status',$st)->update($teg_table);
        }elseif ($teg_table=="contact") {
            $this->db->where('id',$id)->set('status',$st)->update($teg_table);
        }
             echo json_encode($st);
    }
        
    
    function change_Order(){
        extract($_POST);
    if($teg_table=="banners"){
    $this->db->where('id',$id)->set('banner_order',$va)->update($teg_table);
    }
        else{
    $this->db->where('id',$id)->set('order',$va)->update($teg_table);
    }
       echo json_encode('P_taptechnology');
    }
    
    public function user_pic($file_name){
        
        $config['upload_path'] = './uploads/users/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_name)) {
            $data = array('upload_data' => $this->upload->data());
            if (isset($data['upload_data']['full_path'])) {
                return 'uploads/users/' . $data['upload_data']['file_name'];
            }
            return null;
        } else {
            return null;
        }
        
    }
    
    public function check_login(){
        $get_user=$this->db->get_where('users',array('email'=>$this->input->post('email'),'password'=>md5($this->input->post('password'))))->row();
        
        if($get_user->role=="Admin"&&($this->session->userdata('captchaword')==$this->input->post('captcha'))){
            $set_session=array(
              'email'=> $get_user->email,
                'name'=> $get_user->name,
              'admin'=>true,
            );
            $this->session->set_userdata($set_session);
            return "Admin";
        }elseif($get_user->role=="user"&&($this->session->userdata('captchaword')==$this->input->post('captcha'))) {
            $set_session=array(
              'email'=> $get_user->email,
                'name'=> $get_user->name,
              'admin'=>true,
            );
            $this->session->set_userdata($set_session);
            return "user";
        }else{
        echo '<script>window.location="'.base_url().'log'.'"</script>';
        }
    }
    
    public function addrecipe(){
        $var=array(
           'user_name'=> $this->input->post('user'),
            'title'=>$this->input->post('title'),
            'category'=>$this->input->post('cat'),
            'video'=>$this->input->post('vid'),
            'ingredient'=>$this->input->post('ing'),
            'steps'=>$this->input->post('steps'),
            );
        
            $image=$this->post_pic('file');
        
        if(!empty($image)){
            $var['image']=$image;
            $this->db->insert('user_posts',$var);
            echo '<script>window.location="'.base_url()."recipe_a".'"</script>';
        }elseif(empty ($image)){
            $this->db->insert('user_posts',$var);
            echo '<script>window.location="'.base_url()."recipe_a".'"</script>';
        }
    }
    
    public function post_pic($file_name){
        
        $config['upload_path'] = './uploads/posts/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_name)) {
            $data = array('upload_data' => $this->upload->data());
            if (isset($data['upload_data']['full_path'])) {
                return 'uploads/posts/' . $data['upload_data']['file_name'];
            }
            return null;
        } else {
            return null;
        }
        
    }
    
    public function get_posts(){
        $this->db->select();
        $a=$this->db->get_where('user_posts',array('user_name'=>$this->session->userdata('email')));
        return $a->result();
        
    }
    
    public function get_allposts(){
        $this->db->select();
        $a=$this->db->get('user_posts');
        return $a->result();
    }
    
    public function deletepost($a){
        $get_img=$this->db->get_where('user_posts',array('id'=>$a))->row();
        $this->delete_temp_image($get_img->image);
        $this->db->where('id',$a);
        $this->db->delete('user_posts');
        echo '<script>window.location="'.base_url().'ap_posts'.'"</script>';
    }
   public function delete_temp_image($path)
    {
        $full_path = FCPATH . $path;
        if (file_exists($full_path)) {
            @unlink($full_path);
        }
    }
    public function get_feed($limit, $start){
        $this->db->limit($limit, $start);
        $this->db->select();
        $a=$this->db->order_by('created')->get_where('user_posts',array('status'=>1));
        return $a->result();
    }
    
    public function post_comment(){
        $var=array(
            'post_id'=>$this->input->post('post_id'),
            'comments'=>$this->input->post('comments'),
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
        );
        
        $this->db->insert('comments',$var);
        echo '<script>window.location="'.base_url().'"</script>';
    }
    
    public function get_images(){
        $this->db->select();
        $a=$this->db->get_where('user_posts',array('status'=>1));
        return $a->result();
    }
    
    public function complent(){
        $var=array(
            'user_id'=>$this->input->post('user_id'),
            'subject'=>$this->input->post('sub'),
            'issue'=>$this->input->post('iss'),
            'suggestion'=>$this->input->post('sug'),
        );
        $this->db->insert('complents',$var);
        echo '<script>window.location="'.base_url().'u_dashboard'.'"</script>';
    }
    
    public function get_comps(){
        $this->db->select();
        $a=$this->db->get('complents');
        return $a->result();
    }
    public function delete_comment($a){
        $this->db->where('id',$a);
        $this->db->delete('complents');
        echo '<script>window.location="'.base_url().'dashboard'.'"</script>';
    }
    
    public function addtips(){
        $var=array(
            'user_id'=>$this->input->post('user_id'),
            'title'=>$this->input->post('title'),
            'video'=>$this->input->post('vid'),
            'steps'=>$this->input->post('steps'),
            
        );
        $image=$this->post_pic('file');
        
        if(!empty($image)){
           $var['photo']=$image; 
            $this->db->insert('tipsntricks',$var);
            echo '<script>window.location="'.base_url()."tiptrick".'"</script>';
        }else{
            $this->db->insert('tipsntricks',$var);
            echo '<script>window.location="'.base_url()."tiptrick".'"</script>';
        }
    }
    public function addtricks(){
        $var=array(
            'user_id'=>$this->input->post('user_id'),
            'title'=>$this->input->post('title'),
            'video'=>$this->input->post('vid'),
            'steps'=>$this->input->post('steps'),
            
        );
        $image=$this->post_pic('file');
        
        if(!empty($image)){
           $var['photo']=$image; 
            $this->db->insert('tipsntricks',$var);
            echo '<script>window.location="'.base_url()."usertrick".'"</script>';
        }else{
            $this->db->insert('tipsntricks',$var);
            echo '<script>window.location="'.base_url()."usertrick".'"</script>';
        }
    }
    
    public function get_tricks(){
        $this->db->select();
        $a=$this->db->get('tipsntricks');
        return $a->result();
    }
    
    public function delete_tip($a){
        $get_img=$this->db->get_where('tipsntricks',array('id'=>$a))->row();
        if(!empty($get_img->photo)){
            $this->delete_temp_image($get_img->photo);
            $this->db->where('id',$a);
            $this->db->delete('tipsntricks');
            echo '<script>window.location="'.base_url().'tiptrick'.'"</script>';
        }else{
            $this->db->where('id',$a);
        $this->db->delete('tipsntricks');
        echo '<script>window.location="'.base_url().'tiptrick'.'"</script>';
        }
        
    }
    
    public function get_tipntrick(){
        $this->db->select();
        $a=$this->db->order_by('created')->get_where('tipsntricks',array('status'=>1));
        return $a->result();
    }
    
    public function contacts(){
        $var=array(
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'subject'=>$this->input->post('subject'),
            'message'=>$this->input->post('message'),
            
        );
        $this->db->insert('contact',$var);
        echo '<script>window.location="'.base_url().'contact'.'"</script>';
    }
    
    public function reviews(){
        $var=array(
            'tip_id'=>$this->input->post('id'),
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'review'=>$this->input->post('review'),
            
        );
        $this->db->insert('review',$var);
        echo '<script>window.location="'.base_url().'tips'.'"</script>';
    }
    
    public function contact_get(){
        $this->db->select();
        $a=$this->db->get('contact');
        return $a->result();
    }
    
    public function delete_contact($a){
        $this->db->where('id',$a);
        $this->db->delete('contact');
        echo '<script>window.location="'.base_url().'contact_list'.'"</script>';
    }
    
    public function getchicken(){
        $chick=$this->db->get_where('user_posts',array('category'=>'Chicken','status'=>1))->num_rows();
        if(!empty($chick)){
         return $chick;   
        }
        return 0;
          
    }
    
    public function getfish(){
        $fish=$this->db->get_where('user_posts',array('category'=>'Fish','status'=>1))->num_rows();
         return $fish;
    }
    public function getfastfood(){
        $food=$this->db->get_where('user_posts',array('category'=>'FastFood','status'=>1))->num_rows();
         return $food;
    }
    public function getsoup(){
        $soup=$this->db->get_where('user_posts',array('category'=>'Soups','status'=>1))->num_rows();
         return $soup;
    }
    public function getPizza(){
        $pizza=$this->db->get_where('user_posts',array('category'=>'Pizza','status'=>1))->num_rows();
         return $pizza;
    }
    public function getDesserts(){
        $dessert=$this->db->get_where('user_posts',array('category'=>'Desserts','status'=>1))->num_rows();
         return $dessert;
    }
    public function getSalads(){
        $salad=$this->db->get_where('user_posts',array('category'=>'Salads','status'=>1))->num_rows();
         return $salad;
    }
    public function getothers(){
        $other=$this->db->get_where('user_posts',array('category'=>'Others','status'=>1))->num_rows();
         return $other;
    }
    
    public function get_c_p(){
        $this->db->select();
        $a=$this->db->get_where('user_posts',array('category'=>'Chicken','status'=>1));
        return $a->result();
    }
    
    public function get_f_p(){
        $this->db->select();
        $a=$this->db->get_where('user_posts',array('category'=>'FastFood','status'=>1));
        return $a->result();
    }
    
    public function subscribe(){
        $get_sub=$this->db->get_where('newsletter',array('email'=>$this->input->post('sub')))->result();
        if(empty($get_sub)){
             $var=array(
            'email'=>$this->input->post('sub'),
             );
             $this->db->insert('newsletter',$var);
             $this->session->set_flashdata('login',"Subscribed");
             echo '<script>window.location="'.base_url().'"</script>';
        }  elseif(!empty ($get_sub)) {
            $this->session->set_flashdata('danger',"Email Already Subscribed");
            echo '<script>window.location="'.base_url().'"</script>';
        }
       
    }
    
    public function get_nl(){
        $this->db->select();
        $a=$this->db->get('newsletter');
        return $a->result();
    }
    
    public function deletelet($a){
        $this->db->where('id',$a);
        $this->db->delete('newsletter');
        echo '<script>window.location="'.base_url().'letter'.'"</script>';
    }
    
    public function rec_post(){
        
    $this->db->select_max('id');
    $max  = $this->db->get('user_posts')->row()->id;
    $b=$this->db->get_where('user_posts',array('id'=>$max));
    return $b->result();
    }
    
    public function get_rows(){
        $a=$this->db->get_where('user_posts',array('status'=>1))->num_rows();
        return $a;
    }
    
    public function insert_entry($data){
        return $this->db->insert('crud',$data);
    }
    
    public function get_entries(){
        $query=$this->db->get('crud');
        if (count($query->result())>0){
            return $query->result();
        }
    }
    
    public function delete_entry($id){
        return $this->db->delete('crud',array('id'=>$id));
    }
    
    public function edit_entry($id){
        $this->db->select("*");
        $this->db->from("crud");
        $this->db->where("id",$id);
        $query=$this->db->get();
        if(count($query->result())>0){
            return $query->row();
        }
    }
    
    public function update_record(){
        $data['id']=$this->input->post('edit_record_id');
        $data['name']=$this->input->post('edit_name');
        $data['email']=$this->input->post('edit_email');
        return $this->db->update('crud',$data,array('id'=>$data['id']));
    }
}