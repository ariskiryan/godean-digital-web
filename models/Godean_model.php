<?php

class Godean_model extends CI_model{
	public function get_data($table){
		return $this->db->get($table);
	}

	public function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

		public function update_data($table,$data,$where){
		$this->db->update($table,$data,$where);
	}
		public function delete_data($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ambil_id_produk($id)
	{
		$hasil = $this->db->where('id_produk', $id)->get('produk');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function ambil_id_pemesanan()
	{
		$hasil=$this->db->query("SELECT id_pemesanan FROM pemesanan ORDER BY id_pemesanan DESC LIMIT 1")->result();
		return $hasil;
	}


	public function cek_login()
	{
		$username = set_value('username');
		$password = set_value('password');

		$result = $this->db
						->where('username',$username)
						->where('password',md5($password))
						->limit(1)
						->get('pelanggan');
		if($result->num_rows() > 0) {
			return $result->row();
		}else{
			return FALSE;
		}
	}

	public function update_password($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function join()
	{
		/*$this->db->select('*');
		$this->db->from('detail_pemesanan');
		$this->db->join('pemesanan','detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan');*/$this->db->query("");
		return $this->db->get('');
	}
}

?>