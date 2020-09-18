<?php
class Admin extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->helper('url_helper');
		$this->load->helper('form');


$this->load->library('form_validation');

$this->load->library('session');
}
    
 
    public function index() {
$this->load->view('login_form');
}


public function user_login_process() {


$session_set_value = $this->session->all_userdata();

if (isset($session_set_value['remember_me']) && $session_set_value['remember_me'] == "1") {
$this->load->view('admin_page');
} else {


$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

if ($this->form_validation->run() == FALSE) {
$this->load->view('login_form');
} else {
$username = $this->input->post('username');
$password = $this->input->post('password');
if ($username == "admin" && $password == "password") {
$remember = $this->input->post('remember_me');
if ($remember) {


$this->session->set_userdata('remember_me', TRUE);
}
$sess_data = array(
'username' => $username,
'password' => $password
);
$this->session->set_userdata('logged_in', $sess_data);
$this->load->view('admin');
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login_form', $data);
}
}
}
}


public function logout() {


$this->session->sess_destroy();
$data['message_display'] = 'Successfully Logout';
$this->load->view('login_form', $data);
}

   public function add(){
$this->load->view('add', array('error' => ' ' ));

} 
    public function do_upload(){
		 $this->adminmodel->up();
   $config = array(
'upload_path' => "./images/",
'allowed_types' => "gif|jpg|png|jpeg|pdf",
'overwrite' => TRUE,
'max_size' => "2048000", 
'max_height' => "768",
'max_width' => "1024"
);
$this->load->library('upload', $config);
if($this->upload->do_upload())
{
$data = array('upload_data' => $this->upload->data());
$this->load->view('upload_success',$data);
}
else
{
$error = array('error' => $this->upload->display_errors());
$this->load->view('file_view', $error);
}

    }
	public function delete()
    {
        $serial = $this->uri->segment(3);
        
        if (empty($serial))
        {
            show_404();
        }
                
        $news_item = $this->adminmodel->delete($serial);
        
        $this->adminmodel->delete($serial);        
        redirect( base_url() . 'index.php/shopping');        
    }
	 
	 public function update_student_view() { 
         $this->load->helper('form'); 
         $serial = $this->uri->segment('3'); 
         $query = $this->db->get_where("products",array("serial"=>$serial));
         $data['records'] = $query->result(); 
        
         $this->load->view('edit',$data); 
      } 
  
      public function update_student(){ 
         $this->load->model('adminmodel');
			
         $data = array( 
            'serial' => $this->input->post('serial'), 
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
			'price' => $this->input->post('price'),
			
			'picture' => $this->input->post('picture')			
         ); 
			
      
         $a=$this->adminmodel->update($data,$serial); 
			if($a){
         $query = $this->db->get("products"); 
         $data['records'] = $query->result(); 
         $this->load->view('edit',$data); 
			}
      } 
  
}?>
 
   