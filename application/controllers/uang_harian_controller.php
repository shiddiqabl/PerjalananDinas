<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class uang_harian_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('tujuan_dinas_model');
		$this->load->model('status_lokasi_model');
		$this->load->model('uang_harian_model');
	}
	function index()
	{
		$data['daftar_uang_harian'] = $this->uang_harian_model->tampil_data()->result();
		$data['judul'] = 'Pengaturan Uang Harian';
		$this->load->view('templates/header', $data);
		$this->load->view('uang_harian_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['daftar_provinsi'] = $this->tujuan_dinas_model->tampil_data()->result();
		$data['daftar_status'] = $this->status_lokasi_model->tampil_data()->result();
		$data['judul'] = 'Tambah Data Uang Harian';
		$this->load->view('templates/header', $data);		
		$this->load->view('tambah_uh_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$id_uh = $this->input->post('ID_UH');
		$id_prov = $this->input->post('ID_PROV');
		$id_status = $this->input->post('ID_STATUS');
		$nominal = $this->input->post('NOMINAL');
				
		$data = array(
				'ID_UH' => $id_uh,
				'ID_PROV' => $id_prov,
				'ID_STATUS' => $id_status,
				'NOMINAL' => $nominal				
		);
		$this->uang_harian_model->input_data($data, 'uang_harian');
		redirect('uang_harian_controller/index');
	}
	function edit($id_uh)
	{
		//$where = array('ID_UH' => $id_uh);
		$data['daftar_provinsi'] = $this->tujuan_dinas_model->tampil_data()->result();
		$data['daftar_status'] = $this->status_lokasi_model->tampil_data()->result();
		$data['uang_harian'] = $this->uang_harian_model->edit_data($id_uh, 'uang_harian')->result();
		$data['judul'] = 'Pengaturan Uang Harian';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_uh_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$id_uh = $this->input->post('ID_UH');
		$id_prov = $this->input->post('ID_PROV_EDIT');
		$id_status = $this->input->post('ID_STATUS_EDIT');
		$nominal = $this->input->post('NOMINAL_EDIT');		
		$data = array(
				'ID_PROV' => $id_prov,
				'ID_STATUS' => $id_status,
				'NOMINAL' => $nominal,				
		);
		$where = array(
				'ID_UH' => $id_uh
		);
		$this->uang_harian_model->update_data($where, $data, 'uang_harian');
		redirect('uang_harian_controller/index');
	}
	function hapus($id_uh)
	{
		$where = array('ID_UH' => $id_uh);
		$this->uang_harian_model->hapus_data($where, 'uang_harian');
		redirect('uang_harian_controller/index');
	}
}