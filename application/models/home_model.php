<?php
	class home_model extends CI_Model
	{
		function tampil_data()
		{
			$this->db->select('t1.id_perjalanan, t1.NIP, t2.NAMA, t1.ID_STATUS, t3.STATUS, t1.id_tujuan,   
					t1.tgl_berangkat, t1.tgl_kembali, t1.lama_perjalanan, t1.id_angkut, t5.tipe_angkut_pd,
					t1.maksud_pd, t1.status_pd');
			$this->db->from('perjalanan_dinas t1');
			$this->db->join('data_pegawai t2','t1.NIP = t2.NIP', 'left');
			$this->db->join('status_lokasi t3', 't1.ID_STATUS = t3.ID_STATUS', 'left');			
			$this->db->join('alat_angkut t5', 't1.id_angkut = t5.id_angkut', 'left');
			$this->db->where('STATUS_PD', 'TERENCANA');
			$query = $this->db->get();
			return $query;
		}
		function tampil_data_selesai()
		{
			$this->db->select('t1.id_perjalanan, t1.NIP, t2.NAMA, t1.ID_STATUS, t3.STATUS, t1.id_tujuan,   
					t1.tgl_berangkat, t1.tgl_kembali, t1.lama_perjalanan, t1.id_angkut, t5.tipe_angkut_pd,
					t1.maksud_pd, t1.status_pd');
			$this->db->from('perjalanan_dinas t1');
			$this->db->join('data_pegawai t2','t1.NIP = t2.NIP', 'left');
			$this->db->join('status_lokasi t3', 't1.ID_STATUS = t3.ID_STATUS', 'left');			
			$this->db->join('alat_angkut t5', 't1.id_angkut = t5.id_angkut', 'left');
			$this->db->where('STATUS_PD !=', 'TERENCANA');
			$query = $this->db->get();
			return $query;
		}		
		function ambil_tanggal($nip)
		{
			$this->db->select('tgl_berangkat, tgl_kembali');
			$this->db->from('perjalanan_dinas');
			$this->db->where('NIP', $nip);
			$query = $this->db->get();
			return $query;
		}
		function ambil_tanggal_edit($nip, $tgl_berangkat, $tgl_kembali)
		{
			$this->db->select('tgl_berangkat, tgl_kembali');
			$this->db->from('perjalanan_dinas');
			$this->db->where('NIP', $nip);
			$this->db->where('TGL_BERANGKAT !=', $tgl_berangkat);
			$this->db->where('TGL_KEMBALI !=', $tgl_kembali);
			$query = $this->db->get();
			return $query;
		}
		function ambil_uh($id_prov, $id_status)
		{
			$this->db->select('nominal');
			$this->db->from('uang_harian');
			$this->db->where('ID_PROV', $id_prov);
			$this->db->where('ID_STATUS', $id_status);
			$query = $this->db->get();
			return $query;
		}
		function ambil_up($id_prov, $id_pangkat)
		{
			$this->db->select('nominal');
			$this->db->from('uang_penginapan');
			$this->db->where('ID_PROV', $id_prov);
			$this->db->where('ID_PANGKAT', $id_pangkat);
			$query = $this->db->get();
			return $query;
		}
		function input_data($data, $table)
		{
			$this->db->insert($table, $data);
		}
		function edit_data($where, $table)
		{
			$this->db->select('t1.id_perjalanan, t1.NIP, t2.NAMA, t1.ID_STATUS, t4.STATUS, t1.ID_TUJUAN, 
					t1.tgl_berangkat, t1.tgl_kembali, t1.lama_perjalanan, t1.ID_ANGKUT, t3.TIPE_ANGKUT_PD,
					t1.MAKSUD_PD, t1.status_pd');
			$this->db->from('perjalanan_dinas t1');
			$this->db->join('data_pegawai t2','t1.NIP = t2.NIP', 'left');
			$this->db->join('alat_angkut t3','t1.ID_ANGKUT = t3.ID_ANGKUT', 'left');
			$this->db->join('status_lokasi t4', 't1.ID_STATUS = t4.ID_STATUS', 'left');
			$this->db->where('t1.id_perjalanan', $where);
			$query = $this->db->get();
			return $query;
		}
		function edit_satu_data($where, $table)
		{
			$this->db->select('t1.id_perjalanan, t1.NIP, t2.NAMA, t1.ID_STATUS, t4.STATUS, t1.ID_TUJUAN,
					t1.tgl_berangkat, t1.tgl_kembali, t1.lama_perjalanan, t1.ID_ANGKUT, t3.TIPE_ANGKUT_PD,
					t1.MAKSUD_PD, t1.status_pd');
			$this->db->from('perjalanan_dinas t1');
			$this->db->join('data_pegawai t2','t1.NIP = t2.NIP', 'left');
			$this->db->join('alat_angkut t3','t1.ID_ANGKUT = t3.ID_ANGKUT', 'left');
			$this->db->join('status_lokasi t4', 't1.ID_STATUS = t4.ID_STATUS', 'left');
			$this->db->where('t1.id_perjalanan', $where);
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
		function ambil_data_surat($where, $table)
		{
			$this->db->select('t1.id_perjalanan, t1.NIP, t2.NAMA, t2.JABATAN, t2.ID_PANGKAT, t1.ID_STATUS, t4.STATUS, t1.ID_TUJUAN,
					t1.tgl_berangkat, t1.tgl_kembali, t1.lama_perjalanan, t1.ID_ANGKUT, t3.TIPE_ANGKUT_PD,
					t1.MAKSUD_PD, t1.status_pd');
			$this->db->from('perjalanan_dinas t1');
			$this->db->join('data_pegawai t2','t1.NIP = t2.NIP', 'left');
			$this->db->join('alat_angkut t3','t1.ID_ANGKUT = t3.ID_ANGKUT', 'left');
			$this->db->join('status_lokasi t4', 't1.ID_STATUS = t4.ID_STATUS', 'left');			
			$this->db->where('t1.id_perjalanan', $where);
			$query = $this->db->get();
			return $query;
		}
	}