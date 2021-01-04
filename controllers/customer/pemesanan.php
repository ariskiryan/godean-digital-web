<?php

class Pemesanan extends CI_Controller{
	public function index()
	{
		$pelanggan = $this->session->userdata('id_pelanggan');
		$data['detail_pemesanan'] = $this->db->query("SELECT * FROM detail_pemesanan dp, pemesanan psn, produk pd, pelanggan plg WHERE dp.id_produk=pd.id_produk AND dp.id_pemesanan=psn.id_pemesanan AND dp.id_pelanggan=plg.id_pelanggan AND plg.id_pelanggan='$pelanggan' ORDER BY dp.id_pemesanan DESC")->result();
		$this->load->view('templates_customer/header');
		$this->load->view('customer/pemesanan',$data);
		$this->load->view('templates_customer/footer');
	}

	public function pembayaran($id)
	{
		$data['detail_pemesanan'] = $this->db->query("SELECT * FROM detail_pemesanan dp, pemesanan psn, produk pd, pelanggan plg, pembayaran pb WHERE dp.id_produk=pd.id_produk AND dp.id_pemesanan=psn.id_pemesanan AND dp.id_pelanggan=plg.id_pelanggan AND psn.id_pemesanan=pb.id_pemesanan AND dp.id_pemesanan='$id' ORDER BY dp.id_pemesanan DESC")->result();
		$this->load->view('templates_customer/header');
		$this->load->view('customer/pembayaran',$data);
		$this->load->view('templates_customer/footer');
	}
	
	public function pembayaran_aksi()
	{
		$id 				= $this->input->post('id_pemesanan');
		$bukti_pembayaran	= $_FILES['bukti_pembayaran']['name'];
			if($bukti_pembayaran){
				$config ['upload_path']		= './assets/upload';
				$config ['allowed_types']	= 'pdf|jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('bukti_pembayaran')){
					$bukti_pembayaran=$this->upload->data('file_name');
					$this->db->set('bukti_pembayaran', $bukti_pembayaran);
				}else{
					echo $this->upload->display_errors();
				}			
			}

		$data = array(
			'bukti_pembayaran' => $bukti_pembayaran,
		);

		$where = array(
			'id_pemesanan' => $id
		);

		$this->godean_model->insert_data('detail_pemesanan', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Bukti Pembayaran Berhasil di Upload!.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('customer/pemesanan');
	}
}
?>