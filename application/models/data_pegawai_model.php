<?php
	class data_pegawai_model extends CI_Model
	{
		function tampil_data()
		{
			$this->db->select('t1.NIP, t1.NAMA, t1.JABATAN, t1.ID_PANGKAT, t2.PANGKAT');
			$this->db->from('data_pegawai t1');
			$this->db->join('pangkat t2', 't1.ID_PANGKAT = t2.ID_PANGKAT', 'left');
			$query = $this->db->get();
			return $query;
		}
		function input_data($data)
		{
			$this->db->insert('data_pegawai', $data);
		}
		/*function edit_data($where, $table)
		{
			return $this->db->get_where($table, $where);
		}*/
		function edit_data($where, $table)
		 {
		 	$this->db->select('t1.NIP, t1.NAMA, t1.JABATAN, t1.ID_PANGKAT, t2.PANGKAT');
			$this->db->from('data_pegawai t1');
			$this->db->join('pangkat t2', 't1.ID_PANGKAT = t2.ID_PANGKAT', 'left');
			$this->db->where('t1.NIP', $where);
			$query = $this->db->get();
			return $query;
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