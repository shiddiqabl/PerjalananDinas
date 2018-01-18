<?php
	class uang_harian_model extends CI_Model
	{
		function tampil_data()
		{
			$this->db->select('t1.ID_UH, t1.ID_PROV, t2.NAMA_PROV, t1.ID_STATUS, t3.STATUS, t1.NOMINAL');
			$this->db->from('uang_harian t1');
			$this->db->join('provinsi t2', 't1.ID_PROV = t2.ID_PROV', 'left');
			$this->db->join('status_lokasi t3', 't1.ID_STATUS = t3.ID_STATUS', 'left');
			$query = $this->db->get();
			return $query;
		}
		function input_data($data, $table)
		{
			$this->db->insert($table, $data);
		}
		function edit_data($where, $table)
		{
			$this->db->select('t1.ID_UH, t1.ID_PROV, t2.NAMA_PROV, t1.ID_STATUS, t3.STATUS, t1.NOMINAL');
			$this->db->from('uang_harian t1');
			$this->db->join('provinsi t2', 't1.ID_PROV = t2.ID_PROV', 'left');
			$this->db->join('status_lokasi t3', 't1.ID_STATUS = t3.ID_STATUS', 'left');
			$this->db->where('t1.ID_UH', $where);
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