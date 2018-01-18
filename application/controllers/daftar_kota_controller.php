<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class daftar_kota_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('daftar_prov_model');
		$this->load->model('daftar_kota_model');
	}
	function index()
	{
		$data['daftar_kota'] = $this->daftar_kota_model->tampil_data()->result();
		$data['judul'] = 'Daftar Kota';
		$this->load->view('templates/header', $data);
		$this->load->view('daftar_kota_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['judul'] = 'Tambah Kota Baru';
		$data['daftar_provinsi'] = $this->daftar_prov_model->tampil_data()->result();
		
		$this->load->view('templates/header', $data);
		$this->load->view('tambah_kota_view');
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$id_kota = $this->input->post('id_kota');
		$id_prov = $this->input->post('ID_Prov');
		$nama_kota = $this->input->post('nama_kota');
	
		$data = array(
				'ID_KOTA' => $id_kota,
				'ID_PROV' => $id_prov,
				'NAMA_KOTA' => $nama_kota
		);
	
		$this->daftar_kota_model->tambah_data($data, 'daftar_kota');
		redirect('daftar_kota_controller/index');
	}
	function ambil_kota($id_provinsi)
	{								
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->daftar_kota_model->ambil_kota_arr($id_provinsi)));
	}
	function edit($id_kota)
	{		
		$data['daftar_provinsi'] = $this->daftar_prov_model->tampil_data()->result();
		$data['daftar_kota'] = $this->daftar_kota_model->edit_data($id_kota, 'daftar_kota')->result();
		$data['judul'] = 'Edit Data Kota';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_kota_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$id_kota = $this->input->post('ID_KOTA_EDIT');
		$id_prov_edit = $this->input->post('ID_PROV_EDIT');
		$nama_kota_edit = $this->input->post('NAMA_KOTA_EDIT');
	
		$data = array(
				'ID_PROV' => $id_prov_edit,
				'NAMA_KOTA' => $nama_kota_edit				
		);			
		$where = array(
				'ID_KOTA' => $id_kota				
		);
		$this->daftar_kota_model->update_data($where, $data, 'daftar_kota');
		redirect('daftar_kota_controller/index');
	}
	function hapus($id_kota)
	{
		$where = array('id_kota' => $id_kota);
		$this->daftar_kota_model->hapus_data($where, 'daftar_kota');
		redirect('daftar_kota_controller/index');
	}
}