<?php
	class daftar_prov_model extends CI_Model
	{
		function tampil_data()
		{
			$this->db->select('ID_PROV, NAMA_PROV');
			$this->db->from('daftar_prov');
			$query = $this->db->get();
			return $query;
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
		function tampil_prov_arr()
		{
			$this->db->from('daftar_prov');
			$query = $this->db->get();
			$query = $query->result_array();
			foreach ($query as $key=>$n){
				$array[$n['ID_PROV']]=$n['NAMA_PROV'];
			}
			return $array;
		}
	}
?>