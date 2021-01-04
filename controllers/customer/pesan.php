<?php

class Pesan extends CI_Controller
{
	public function tambah_pesanan($id)
	{
		$data['detail'] = $this->godean_model->ambil_id_produk($id);
		// $data['id_pesan'] = $this->godean_model->ambil_id_pemesanan();
		$this->load->view('templates_customer/header');
		$this->load->view('customer/tambah_pesanan', $data);
		$this->load->view('templates_customer/footer');	
		/*print_r($data['id_pesan']);die();*/
	}

	public function tambah_pesanan_aksi()
	{
		$data['detail_pemesanan'] = $this->db->query("SELECT * FROM detail_pemesanan dp, pemesanan psn, produk pd, pelanggan plg WHERE dp.id_produk=pd.id_produk AND dp.id_pemesanan=psn.id_pemesanan AND dp.id_pelanggan=plg.id_pelanggan")->result();
		
		$id_pelanggan			= $this->session->userdata('id_pelanggan');
		$id_pemesanan			= $this->input->post('id_pemesanan');
		$id_produk 				= $this->input->post('id_produk');
		$judul	 				= $this->input->post('judul');
		$jenis_layanan 			= $this->input->post('jenis_layanan');
		$jenis_pesanan 			= $this->input->post('jenis_pesanan');
		$panjang 				= $this->input->post('panjang');
		$lebar	 				= $this->input->post('lebar');
		$qty					= $this->input->post('qty');
		$file					= $this->input->post('file');
		$jenis_finishing		= $this->input->post('jenis_finishing');
		$harga 					= $this->input->post('harga');
		$tgl_pesan 				= $this->input->post('tgl_pesan');

		$datadet = array(
			'id_pelanggan'			=> $id_pelanggan,
			'id_produk'				=> $id_produk,
			'judul'					=> $judul,
			'jenis_layanan'			=> $jenis_layanan,
			'jenis_pesanan'			=> $jenis_pesanan,
			'panjang'				=> $panjang,
			'lebar'					=> $lebar,
			'harga'					=> $harga,
			'qty'					=> $qty,
			'file'					=> $file,
			'jenis_finishing'		=> $jenis_finishing,
			'harga'					=> $harga,
			'sub_total'				=> $panjang*$lebar*$qty*$harga/10000,
		);

		$datapesan = array(
			'id_pemesanan'			=> $id_pemesanan,
			'id_pelanggan'			=> $id_pelanggan,
			'tgl_pesan'				=> $tgl_pesan,
			'tgl_selesai'			=> '_',
			'status_pemesanan'		=> 'Tunggu Konfirmasi',
		);
		$this->godean_model->insert_data($datapesan,'pemesanan');
		$this->godean_model->insert_data($datadet,'detail_pemesanan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Pesanan berhasil di simpan, silahkan checkout!.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('customer/data_produk');
	}
}

?>