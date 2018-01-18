<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class uang_penginapan_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('tujuan_dinas_model');
		$this->load->model('pangkat_model');
		$this->load->model('uang_penginapan_model');
	}
	function index()
	{
		$data['daftar_uang_penginapan'] = $this->uang_penginapan_model->tampil_data()->result();
		$data['judul'] = 'Pengaturan Uang Penginapan';
		$this->load->view('templates/header', $data);
		$this->load->view('uang_penginapan_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['daftar_provinsi'] = $this->tujuan_dinas_model->tampil_data()->result();
		$data['daftar_pangkat'] = $this->pangkat_model->tampil_data()->result();
		$data['judul'] = 'Tambah Uang Penginapan';
		$this->load->view('templates/header', $data);
		$this->load->view('tambah_up_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$id_up = $this->input->post('ID_UP');
		$id_provinsi = $this->input->post('ID_PROV');
		$id_pangkat = $this->input->post('ID_PANGKAT');
		$nominal = $this->input->post('NOMINAL');	
	
		$data = array(
				'ID_UP' => $id_up,
				'ID_PROV' => $id_provinsi,
				'ID_PANGKAT' => $id_pangkat,
				'NOMINAL' => $nominal				
		);
		$this->uang_penginapan_model->input_data($data, 'uang_penginapan');
		redirect('uang_penginapan_controller/index');
	}
	function edit($id_up)
	{
		//$where = array('ID_UP' => $id_up);
		$data['daftar_provinsi'] = $this->tujuan_dinas_model->tampil_data()->result();
		$data['daftar_pangkat'] = $this->pangkat_model->tampil_data()->result();
		$data['uang_penginapan'] = $this->uang_penginapan_model->edit_data($id_up, 'uang_penginapan')->result();
		$data['judul'] = 'Edit Uang Penginapan';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_up_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$id_up = $this->input->post('ID_UP');
		$id_provinsi = $this->input->post('ID_PROV_EDIT');
		$id_pangkat = $this->input->post('ID_PANGKAT_EDIT');
		$nominal = $this->input->post('NOMINAL_EDIT');		
		$data = array(
				'ID_PROV' => $id_provinsi,
				'ID_PANGKAT' => $id_pangkat,
				'NOMINAL' => $nominal				
		);
		$where = array(
				'ID_UP' => $id_up
		);
		$this->uang_penginapan_model->update_data($where, $data, 'uang_penginapan');
		redirect('uang_penginapan_controller/index');
	}
	function hapus($id_up)
	{
		$where = array('ID_UP' => $id_up);
		$this->uang_penginapan_model->hapus_data($where, 'uang_penginapan');
		redirect('uang_penginapan_controller/index');
	}
}