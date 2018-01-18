<?php
	class perjalanan_dinas_model extends CI_Model
	{
		function tampil_data()
		{
			$this->db->select('id_perjalanan, NIP, NAMA, id_prov, nama_prov, tgl_berangkat, tgl_kembali, lama_perjalanan');
			$this->db->from('perjalanan_dinas');
			$query = $this->db->get();
			return $query;
		}
		function input_data($data, $table)
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