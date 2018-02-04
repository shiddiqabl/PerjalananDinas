<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class alat_angkut_controller extends CI_Controller{
    //tes
	function __construct()
	{
		parent::__construct();
		$this->load->model('alat_angkut_model');
	}
	function index()
	{
		$data['daftar_angkut'] = $this->alat_angkut_model->tampil_data()->result();
		$data['judul'] = 'Daftar Alat Angkut';
		$this->load->view('templates/header', $data);
		$this->load->view('alat_angkut_view', $data);
		$this->load->view('templates/footer');
	}
	function tambah()
	{
		$data['judul'] = 'Tambah Alat Angkut Baru';
		$this->load->view('templates/header', $data);
		$this->load->view('tambah_angkut_view');
		$this->load->view('templates/footer');
	}
	function tambah_action()
	{
		$id_angkut = $this->input->post('id_angkut');
		$nama_angkut = $this->input->post('nama_angkut');
	
		$data = array(
				'ID_ANGKUT' => $id_angkut,
				'TIPE_ANGKUT_PD' => $nama_angkut
		);
	
		$this->alat_angkut_model->tambah_data($data, 'alat_angkut');
		redirect('alat_angkut_controller/index');
	}
	function edit($id_angkut)
	{
		$where = array('ID_ANGKUT' => $id_angkut);
		$data['daftar_alat'] = $this->alat_angkut_model->edit_data($where, 'alat_angkut')->result();
		$data['judul'] = 'Edit Data Alat Angkut';
		$this->load->view('templates/header', $data);
		$this->load->view('edit_angkut_view', $data);
		$this->load->view('templates/footer');
	}
	function update()
	{
		$id_angkut = $this->input->post('ID_ANGKUT');
		$nama_angkut_edit = $this->input->post('NAMA_ANGKUT_EDIT');
	
		$data = array('TIPE_ANGKUT_PD' => $nama_angkut_edit);
	
		$where = array('ID_ANGKUT' => $id_angkut);
		$this->alat_angkut_model->update_data($where, $data, 'alat_angkut');
		redirect('alat_angkut_controller/index');
	}
	function hapus($id_angkut)
	{
		$where = array('ID_ANGKUT' => $id_angkut);
		$this->alat_angkut_model->hapus_data($where, 'alat_angkut');
		redirect('alat_angkut_controller/index');
	}
}