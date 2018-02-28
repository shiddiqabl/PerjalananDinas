<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class daftar_prov_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('daftar_prov_model');
	}
	function index()
	{
		$data['daftar_prov'] = $this->daftar_prov_model->tampil_data()->result();
		$data['judul'] = 'Daftar Provinsi';
		$this->load->view('templates/header', $data);
		$this->load->view('daftar_prov_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['judul'] = 'Tambah Provinsi Baru';
		$this->load->view('templates/header', $data);
		$this->load->view('tambah_prov_view');
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$id_prov = $this->input->post('id_prov');
		$nama_prov = $this->input->post('nama_prov');
	
		$data = array(
				'ID_PROV' => $id_prov,
				'NAMA_PROV' => $nama_prov
		);
	
		$this->daftar_prov_model->tambah_data($data, 'daftar_prov');
		redirect('daftar_prov_controller/index');
	}
	function edit($id_prov)
	{
		$where = array('ID_PROV' => $id_prov);
		$data['daftar_provinsi'] = $this->daftar_prov_model->edit_data($where, 'daftar_prov')->result();
		$data['judul'] = 'Edit Data Provinsi';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_prov_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$id_prov = $this->input->post('ID_PROV');
		$nama_prov = $this->input->post('NAMA_PROV_EDIT');
	
		$data = array('nama_prov' => $nama_prov);
	
		$where = array('id_prov' => $id_prov);
		$this->daftar_prov_model->update_data($where, $data, 'daftar_prov');
		redirect('daftar_prov_controller/index');
	}
	function hapus($id_provinsi)
	{
		$where = array('id_prov' => $id_provinsi);
		$this->daftar_prov_model->hapus_data($where, 'daftar_prov');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data provinsi dengan kode '.$id_provinsi.' telah dihapus</div>');
		redirect('daftar_prov_controller/index');
	}
}