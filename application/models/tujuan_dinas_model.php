<?php
	class tujuan_dinas_model extends CI_Model
	{
		function tampil_data_kota(){
			$this->db->select('ID_KOTA, NAMA_KOTA');
			$this->db->from('daftar_kota');
			$query = $this->db->get();
			return $query;
		}
		function tampil_data_kec(){
			$this->db->select('ID_KEC, NAMA_KEC');
			$this->db->from('daftar_kec');
			$query = $this->db->get();
			return $query;
		}
		function tampil_kota_arr()
		{
			$this->db->from('daftar_kota');
			$query = $this->db->get();
			$query = $query->result_array();
			foreach ($query as $key=>$n){
				$array[$n['ID_KOTA']]=$n['NAMA_KOTA'];
			}
			return $array;
		}
		function tampil_kec_arr()
		{
			$this->db->from('daftar_kec');
			$query = $this->db->get();
			$query = $query->result_array();
			foreach ($query as $key=>$n){
				$array[$n['ID_KEC']]=$n['NAMA_KEC'];
			}
			return $array;
		}
		function tambah_data($data, $table)
		{
			$this->db->insert($table, $data);
		}
		function edit_data($where, $table)
		{
			return $this->db->get_where($table, $where);
		}
		function update_data($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}
		function hapus_data($where, $table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
	}
?>