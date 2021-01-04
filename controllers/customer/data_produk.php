<?php
class Data_produk extends CI_controller{

	public function index()
	{
		$data['produk'] = $this->godean_model->get_data('produk')->result();
		$this->load->view('templates_customer/header');
		$this->load->view('customer/data_produk', $data);
		$this->load->view('templates_customer/footer');	
	}

		public function detail_produk($id)
	{
		$data['detail'] = $this->godean_model->ambil_id_produk($id);
		$this->load->view('templates_customer/header');
		$this->load->view('customer/detail_produk', $data);
		$this->load->view('templates_customer/footer');	
	}
}

?>