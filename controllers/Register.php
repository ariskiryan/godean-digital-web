<?php 
class Register extends CI_Controller{
	public function index()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->load->view('templates_admin/header');
			$this->load->view('register_form');
			$this->load->view('templates_admin/footer');
		}else{
			$nama_pelanggan		= $this->input->post('nama_pelanggan');
			$username			= $this->input->post('username');
			$alamat				= $this->input->post('alamat');
			$no_telp			= $this->input->post('no_telp');
			$email				= $this->input->post('email');
			$password			= md5($this->input->post('password'));
			$role_id			= '2';

			$data = array(
			'nama_pelanggan'	=> $nama_pelanggan,
			'username'			=> $username,
			'alamat'			=> $alamat,
			'no_telp'			=> $no_telp,
			'email'				=> $email,
			'password'			=> $password,
			'role_id'			=> $role_id

			);

			$this->godean_model->insert_data($data,'pelanggan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Register Berhasil, Silahkan Login!.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('auth/login');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_pelanggan','Nama_pelanggan','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('no_telp','No_telp','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
	}
}
?>