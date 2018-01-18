<?php
	class daftar_kec_model extends CI_Model{
		function tampil_data(){
			$this->db->select('t1.ID_KEC, t1.ID_PROV, t2.NAMA_PROV, t1.ID_KOTA, t3.NAMA_KOTA, t1.NAMA_KEC');
			$this->db->from('daftar_kec t1');
			$this->db->join('daftar_prov t2','t1.ID_PROV = t2.ID_PROV', 'left');
			$this->db->join('daftar_kota t3','t1.ID_KOTA = t3.ID_KOTA', 'left');
			$query = $this->db->get();
			return $query;
		}
		function tambah_data($data, $table)
		{
			$this->db->insert($table, $data);
		}		
		function edit_data($where, $table)
		{
			$this->db->select('t1.ID_KEC, t1.ID_PROV, t2.NAMA_PROV, t1.ID_KOTA, t3.NAMA_KOTA, t1.NAMA_KEC');
			$this->db->from('daftar_kec t1');
			$this->db->join('daftar_prov t2','t1.ID_PROV = t2.ID_PROV', 'left');
			$this->db->join('daftar_kota t3','t1.ID_KOTA = t3.ID_KOTA', 'left');
			$this->db->where('t1.ID_KEC', $where);
			$query = $this->db->get();
			return $query;
		}
		function update_data($where, $data, $table)
		{
			$this->db->where($where);
			$this->db->update($table, $data);
		}
		function ambil_kec_arr($id_kota)
		{
			$this->db->select('ID_KEC, NAMA_KEC');
			$this->db->from('daftar_kec');
			$this->db->where('ID_KOTA', $id_kota);
			$query = $this->db->get();
			$query = $query->result_array();
			foreach ($query as $key=>$n){
				$array[$n['ID_KEC']]=$n['NAMA_KEC'];
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
		function hapus_data($where, $table)
		{
			$this->db->where($where);
			$this->db->delete($table);
		}
	}