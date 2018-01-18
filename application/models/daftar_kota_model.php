<?php
	class daftar_kota_model extends CI_Model{
		function tampil_data(){
			$this->db->select('t1.ID_KOTA, t1.ID_PROV, t2.NAMA_PROV, t1.NAMA_KOTA');
			$this->db->from('daftar_kota t1');
			$this->db->join('daftar_prov t2','t1.ID_PROV = t2.ID_PROV', 'left');
			$query = $this->db->get();
			return $query;
		}
		function tambah_data($data, $table)
		{
			$this->db->insert($table, $data);
		}		
		function edit_data($where, $table)
		{
			$this->db->select('t1.ID_KOTA, t1.ID_PROV, t2.NAMA_PROV, t1.NAMA_KOTA');
			$this->db->from('daftar_kota t1');
			$this->db->join('daftar_prov t2','t1.ID_PROV = t2.ID_PROV', 'left');
			$this->db->where('t1.ID_KOTA', $where);
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
		
		function ambil_kota_arr($id_provinsi)
		{
			$this->db->select('ID_KOTA, NAMA_KOTA');
			$this->db->from('daftar_kota');
			$this->db->where('ID_PROV', $id_provinsi);
			$query = $this->db->get();
			$query = $query->result_array();
			foreach ($query as $key=>$n){
				$array[$n['ID_KOTA']]=$n['NAMA_KOTA'];
			}
			return $array;
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
	}