<?php

class Data_pemesanan extends CI_Controller{
	public function index()
	{
		$this->load->model('godean_model');
		$data['detail_pemesanan'] = $this->db->query("SELECT * FROM detail_pemesanan dp, pemesanan psn, produk pd, pelanggan plg WHERE dp.id_produk=pd.id_produk AND dp.id_pemesanan=psn.id_pemesanan AND dp.id_pelanggan=plg.id_pelanggan")->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_pemesanan',$data);
		$this->load->view('templates_admin/footer');
	}
}
?>