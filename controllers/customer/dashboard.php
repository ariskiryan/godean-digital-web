<?php
class Dashboard extends CI_controller{

	public function index()
	{
		$data['produk'] = $this->godean_model->get_data('produk')->result();
		$this->load->view('templates_customer/header');
		$this->load->view('customer/dashboard', $data);
		$this->load->view('templates_customer/footer');	
	}

}

?>