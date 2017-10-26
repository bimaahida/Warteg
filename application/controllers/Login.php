<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	
	public function __construct()
	{
		parent::__construct();
		
        $this->load->library('form_validation'); 
	}
	
	public function index()
	{
		$data['error_message'] = $this->session->flashdata('error_message');

		$this->load->view("login", $data);
	}

	public function process_login()
	{

		$this->load->model('User_model');

		// form validation
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == TRUE)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);

			$result = $this->User_model->login($data);

			if($result != FALSE)
			{
				$id_level = $this->User_model->get_by_id($result[0]->id);

				$session_data = array(
					'id_user' => $result[0]->id,
					'username' => $result[0]->username,
					'nama' => $result[0]->nama
				);

				$this->session->set_userdata('logged_in', $session_data);

				redirect('/jenis_menu','refresh');
			}
			else
			{
				$message['invalid_user'] = 'invalid username or password';
				$this->session->set_flashdata('error_message', $message);
				redirect('/login','refresh');
			}
		}
		else
		{
			$message = array();

			if(form_error('username') != "")
			{
				$message['username'] = form_error('username');
			}
			if(form_error('password') != "")
			{
				$message['password'] = form_error('password');
			}

			$this->session->set_flashdata('error_message', $message);
			redirect('/login','refresh');
		}
	}

	public function process_logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('/login','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */
?>
