<?php

class Data_produk extends CI_Controller{
	public function index()
	{
		$data['produk'] = $this->godean_model->get_data('produk')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_produk',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_produk()
	{
		$data['produk'] = $this->godean_model->get_data('produk')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_produk',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_produk_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
		   $this->tambah_produk();
		}else{
			$nama_produk		= $this->input->post('nama_produk');
			$harga				= $this->input->post('harga');
			$gambar				= $_FILES['gambar']['name'];
			if($gambar=''){}else{
				$config ['upload_path']		= './assets/upload';
				$config ['allowed_types']	= 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar Gagal di Upload!";
				}else{
					$gambar=$this->upload->data('file_name');
				}
			$status				= $this->input->post('status');
			}

			$data = array(
			'nama_produk'		=> $nama_produk,
			'harga'				=> $harga,
			'gambar'			=> $gambar,
			'status'			=> $status
			);

			$this->godean_model->insert_data($data,'produk');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data berhasil di simpan!.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('admin/data_produk');
		}
	}

	public function update_produk($id)
	{
		$where = array('id_produk' => $id);
		$data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk = '$id' ")->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_produk',$data);
		$this->load->view('templates_admin/footer');
	}

	public function update_produk_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
		   $this->update_produk();
		}else{
			$id 				= $this->input->post('id_produk');
			$nama_produk		= $this->input->post('nama_produk');
			$harga				= $this->input->post('harga');
			$gambar				= $_FILES['gambar']['name'];
			if($gambar){
				$config ['upload_path']		= './assets/upload';
				$config ['allowed_types']	= 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')){
					$gambar=$this->upload->data('file_name');
					$this->db->set('gambar', $gambar);
				}else{
					echo $this->upload->display_errors();
				}			
			}
			$status				= $this->input->post('status');

			$data = array(
			'nama_produk'		=> $nama_produk,
			'harga'				=> $harga,
			'status'			=> $status,
			);

			$where = array(
			'id_produk' => $id
			);

			$this->godean_model->update_data('produk', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data berhasil di update!.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('admin/data_produk');
		}
	}

	public function delete_produk($id)
	{
		$where = array('id_produk' => $id);
		$this->godean_model->delete_data($where, 'produk');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data berhasil di hapus!.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('admin/data_produk');

	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_produk','Nama Produk','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('status','Status','required');
	}

	public function detail_produk($id)
	{
		$data['detail'] = $this->godean_model->ambil_id_produk($id);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_produk',$data);
		$this->load->view('templates_admin/footer');
	}
}

?>