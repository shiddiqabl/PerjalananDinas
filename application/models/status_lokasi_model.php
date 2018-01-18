<?php 
	class status_lokasi_model extends CI_Model
	{
		function tampil_data()
		{
			$this->db->select('ID_STATUS, STATUS');
			$this->db->from('status_lokasi');
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
	}
?>