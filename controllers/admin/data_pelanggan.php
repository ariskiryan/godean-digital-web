<?php

class Data_pelanggan extends CI_Controller{
	public function index()
	{
		$data['pelanggan'] = $this->godean_model->get_data('pelanggan')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_pelanggan',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_pelanggan()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_pelanggan');
		$this->load->view('templates_admin/footer');
	}

	public function tambah_pelanggan_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_pelanggan();
		}else{
			$nama_pelanggan		= $this->input->post('nama_pelanggan');
			$username			= $this->input->post('username');
			$password			= md5($this->input->post('password'));
			$alamat				= $this->input->post('alamat');
			$no_telp			= $this->input->post('no_telp');
			$email				= $this->input->post('email');

			$data = array(
			'nama_pelanggan'	=> $nama_pelanggan,
			'username'			=> $username,
			'password'			=> $password,
			'alamat'			=> $alamat,
			'no_telp'			=> $no_telp,
			'email'				=> $email

			);

			$this->godean_model->insert_data($data,'pelanggan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data berhasil di simpan!.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('admin/data_pelanggan');
		}
	}

	public function update_pelanggan($id)
	{
		$where = array('id_pelanggan' => $id);
		$data['pelanggan'] = $this->db->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id' ")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_pelanggan',$data);
		$this->load->view('templates_admin/footer');
	}

	public function update_pelanggan_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
		   $this->update_pelanggan();
		}else{
			$id 				= $this->input->post('id_pelanggan');
			$nama_pelanggan		= $this->input->post('nama_pelanggan');
			$username			= $this->input->post('username');
			$password			= md5($this->input->post('password'));
			$alamat				= $this->input->post('alamat');
			$no_telp			= $this->input->post('no_telp');
			$email				= $this->input->post('email');

			$data = array(
			'nama_pelanggan'	=> $nama_pelanggan,
			'username'			=> $username,
			'password'			=> $password,
			'alamat'			=> $alamat,
			'no_telp'			=> $no_telp,
			'email'				=> $email

			);

			$where = array(
			'id_pelanggan' => $id
			);

			$this->godean_model->update_data('pelanggan', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data berhasil di update!.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('admin/data_pelanggan');
		}
	}

	public function delete_pelanggan($id)
	{
		$where = array('id_pelanggan' => $id);
		$this->godean_model->delete_data($where, 'pelanggan');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data berhasil di hapus!.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_pelanggan');

	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_pelanggan','Nama_pelanggan','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('no_telp','No_telp','required');
		$this->form_validation->set_rules('email','Email','required');
	}
}
?>