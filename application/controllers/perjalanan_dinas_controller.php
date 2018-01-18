<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class perjalanan_dinas_controller extends CI_Controller{
		function __construct()
		{
			parent::__construct();
			$this->load->model('perjalanan_dinas_model');
			$this->load->model('data_pegawai_model');
			$this->load->model('tujuan_dinas_model');
		}
		function index()
		{
			$data['perjalanan_dinas'] = $this->perjalanan_dinas_model->tampil_data()->result();
			$this->load->view('perjalanan_dinas_view', $data);
		}
		function tambah_perjalanan()
		{
			$data['daftar_pegawai'] = $this->data_pegawai_model->tampil_data()->result();
			$data['daftar_provinsi'] = $this->tujuan_dinas_model->tampil_data()->result();
			$this->load->view('tambah_perjalanan_view', $data);
		}
		function tambah_action()
		{
			
			$id_perjalanan = $this->input->post('id_perjalanan');
			$nip = $this->input->post('NIP_perjalanan');
			$nama_pegawai = $this->input->post('NAMA_perjalanan');
			$id_prov = $this->input->post('id_prov_perjalanan');
			$nama_prov = $this->input->post('nama_provinsi');
			//$tgl_berangkat = strtotime($this->input->post('tgl_berangkat'));
			//$tgl_kembali = strtotime($this->input->post('tgl_kembali'));
			$lama_perjalanan = $this->input->post('lama_perjalanan');
			$tgl_berangkat = '2000-11-11';
			$tgl_kembali = date('2000-12-12');
			
			$data = array(
					'id_perjalanan' => $id_perjalanan,
					'NIP' => $nip,
					'NAMA' => $nama_pegawai,
					'id_prov' => $id_prov,
					'nama_prov' => $nama_prov,
					'tgl_berangkat' => $tgl_berangkat,
					'tgl_kembali' => $tgl_kembali,
					'lama_perjalanan' => $lama_perjalanan
			);
			$this->perjalanan_dinas_model->input_data($data, 'perjalanan_dinas');
			redirect('perjalanan_dinas_controller/index');
		}
		function edit($id_perjalanan)
		{
			$where = array('id_perjalanan' => $id_perjalanan);
			$data['daftar_pegawai'] = $this->data_pegawai_model->tampil_data()->result();
			$data['daftar_provinsi'] = $this->tujuan_dinas_model->tampil_data()->result();
			$data['dinas_edit'] = $this->perjalanan_dinas_model->edit_data($where, 'perjalanan_dinas')->result();
			$this->load->view('edit_perjalanan_view', $data);
		}
		function update()
		{
			$id_perjalanan_edit = $this->input->post('id_perjalanan');
			$nip_edit = $this->input->post('NIP_perjalanan_edit');
			$nama_pegawai_edit = $this->input->post('NAMA_perjalanan_edit');
			$id_prov_edit = $this->input->post('id_prov_perjalanan_edit');
			$nama_prov_edit = $this->input->post('nama_prov_perjalanan_edit');
			$tgl_berangkat_edit = $this->input->post('tgl_berangkat_edit');
			$tgl_kembali_edit = $this->input->post('tgl_kembali_edit');
			$lama_perjalanan_edit = $this->input->post('lama_perjalanan_edit');
			
			$data = array(
					'NIP' => $nip_edit,
					'NAMA' => $nama_pegawai_edit,
					'id_prov' => $id_prov_edit,
					'nama_prov' => $nama_prov_edit,
					'tgl_berangkat' => $tgl_berangkat_edit,
					'tgl_kembali' => $tgl_kembali_edit,
					'lama_perjalanan' => $lama_perjalanan_edit
			);
			$where = array(
					'id_perjalanan' => $id_perjalanan_edit
			);
			$this->perjalanan_dinas_model->update_data($where, $data, 'perjalanan_dinas');
			redirect('perjalanan_dinas_controller/index');
		}
		function hapus($id_perjalanan)
		{
			$where = array('id_perjalanan' => $id_perjalanan);
			$this->perjalanan_dinas_model->hapus_data($where, 'perjalanan_dinas');
			redirect('perjalanan_dinas_controller/index');
		}
	}