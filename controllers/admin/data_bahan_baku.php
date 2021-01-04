<?php

class Data_bahan_baku extends CI_Controller{
	public function index()
	{
		$data['bahan_baku'] = $this->godean_model->get_data('bahan_baku')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_bahan_baku',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_bahan_baku()
	{
		$data['bahan_baku'] = $this->godean_model->get_data('bahan_baku')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_bahan_baku');
		$this->load->view('templates_admin/footer');
	}

	public function tambah_bahan_baku_aksi()
	{
		$this->_rules();
		if($this->form_validation->run() == FALSE) {
			$this->tambah_bahan_baku();
		}else{
			$nama_bahan			= $this->input->post('nama_bahan');
			$stock				= $this->input->post('stock');
			$harga_satuan		= $this->input->post('harga_satuan');
			$satuan				= $this->input->post('satuan');
			$status				= $this->input->post('status');
			$ket				= $this->input->post('ket');

			$data = array(
			'nama_bahan'		=> $nama_bahan,
			'stock'				=> $stock,
			'harga_satuan'		=> $harga_satuan,
			'satuan'			=> $satuan,
			'status'			=> $status,
			'ket'				=> $ket

			);

			$this->godean_model->insert_data($data,'bahan_baku');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data berhasil di simpan!.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('admin/data_bahan_baku');
		}
	}

	public function update_bahan_baku($id)
	{
		$where = array('id_bahan' => $id);
		$data['bahan_baku'] = $this->db->query("SELECT * FROM bahan_baku WHERE id_bahan = '$id' ")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_bahan_baku',$data);
		$this->load->view('templates_admin/footer');
	}

	public function update_bahan_baku_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
		   $this->update_bahan_baku();
		}else{
			$id 				= $this->input->post('id_bahan');
			$nama_bahan			= $this->input->post('nama_bahan');
			$stock				= $this->input->post('stock');
			$harga_satuan		= $this->input->post('harga_satuan');
			$satuan				= $this->input->post('satuan');
			$status				= $this->input->post('status');
			$ket				= $this->input->post('ket');


			$data = array(
			'nama_bahan'		=> $nama_bahan,
			'stock'				=> $stock,
			'harga_satuan'		=> $harga_satuan,
			'satuan'			=> $satuan,
			'status'			=> $status,
			'ket'				=> $ket,

			);

			$where = array(
			'id_bahan' => $id
			);

			$this->godean_model->update_data('bahan_baku', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data berhasil di update!.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('admin/data_bahan_baku');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_bahan','Nama_bahan','required');
		$this->form_validation->set_rules('stock','Stock','required');
		$this->form_validation->set_rules('harga_satuan','Harga_satuan','required');
		$this->form_validation->set_rules('satuan','Satuan','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('ket','Ket','required');
	}

		public function delete_bahan_baku($id)
	{
		$where = array('id_bahan' => $id);
		$this->godean_model->delete_data($where, 'bahan_baku');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data berhasil di hapus!.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_bahan_baku');

	}
}
?>