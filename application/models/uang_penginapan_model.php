<?php
	class uang_penginapan_model extends CI_Model{
		function tampil_data()
		{
			$this->db->select('t1.ID_UP, t1.ID_PROV, t2.NAMA_PROV, t1.ID_PANGKAT, t3.PANGKAT, t1.NOMINAL');
			$this->db->from('uang_penginapan t1');
			$this->db->join('provinsi t2', 't1.ID_PROV = t2.ID_PROV', 'left');
			$this->db->join('pangkat t3', 't1.ID_PANGKAT = t3.ID_PANGKAT', 'left');
			$query = $this->db->get();
			return $query;
		}
		function input_data($data, $table)
		{
			$this->db->insert($table, $data);
		}
		function edit_data($where, $table)
		{
			$this->db->select('t1.ID_UP, t1.ID_PROV, t2.NAMA_PROV, t1.ID_PANGKAT, t3.PANGKAT, t1.NOMINAL');
			$this->db->from('uang_penginapan t1');
			$this->db->join('provinsi t2', 't1.ID_PROV = t2.ID_PROV', 'left');
			$this->db->join('pangkat t3', 't1.ID_PANGKAT = t3.ID_PANGKAT', 'left');
			$this->db->where('t1.ID_UP', $where);
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