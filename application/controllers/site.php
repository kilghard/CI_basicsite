<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$this->home();		
	}
	
	public function admin()
	{	
		$this->load->model("db_get");
		$this->load->view("site_header");
		$this->load->view("site_nav");
		$data["results"] = $this->db_get->getData("home");
		$this->load->view("content_updateform", $data);
		$data["results"] = $this->db_get->getData("about");
		$this->load->view("content_updateform", $data);
		$this->load->view("site_footer");
	}
	
	public function home()
	{	
		$this->load->model("db_get");
		$data["results"] = $this->db_get->getData("home");
		$this->load->view("site_header");
		$this->load->view("site_nav");
		$this->load->view("content_home", $data);
		$this->load->view("site_footer");
	}
	
	public function about()
	{
		$this->load->model("db_get");
		$data["results"] = $this->db_get->getData("about");
		$this->load->view("site_header");
		$this->load->view("site_nav");
		$this->load->view("content_about", $data);
		$this->load->view("site_footer");
	}
	
	public function contact()
	{
		$this->load->model("db_get");
		$data["results"] = $this->db_get->getData("contact");
		$data["message"] = "";
		$this->load->view("site_header");
		$this->load->view("site_nav");
		$this->load->view("content_contact", $data);
		$this->load->view("site_footer");
	}
	
	public function send_email()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("fullName","Full Name","required|alpha|xss_clean");
		$this->form_validation->set_rules("email","email Name","required|valid_email|xss_clean");
		$this->form_validation->set_rules("message","message Name","required|xss_clean");
		
		if ($this->form_validation->run() == FALSE){
			$data["message"] = "";
			$this->load->view("site_header");
			$this->load->view("site_nav");
			$this->load->view("content_contact",$data);
			$this->load->view("site_footer");
		
		} else {
			$data["message"] = "The email had been sent";
			
			$this->load->library("email");
			$this->email->from(set_value("email"),set_value("fullName"));
			$this->email->to("janssenjonas2@gmail.com");
			$this->email->subject("codeigniter");
			$this->email->message(set_value("message"));
			
			$this->load->view("site_header");
			$this->load->view("site_nav");
			$this->load->view("content_contact", $data);
			$this->load->view("site_footer");
		
			$this->email->send();
			$this->email->print_debugger();
		}
	}
	
	public function updateData(){
		$this->load->model("db_update");
		$id = $this->input->post('id');
		$data = array(		
        'id' => $this->input->post('id'),
        'title' => $this->input->post('title'),
        'text1' => $this->input->post('text1'),
        'text2' => $this->input->post('text2')
        );
		$this->db_update->updateData($data, $id);
		$this->load->view("update_succes");
		$this->admin();
	
	}
}